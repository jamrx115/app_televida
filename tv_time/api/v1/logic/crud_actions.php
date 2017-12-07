<?php

class CRUD_Actions {
	
	private $data, $action, $response, $auth, $user, $method;

	public function __construct($data, $action, $auth, $method) {
		$this->data = $data;
		$this->action = $action;
		$this->auth = $auth;
		$this->method = $method;
	}

	public function log($message) {
		$fp = fopen('mylog.log', 'a') or exit("Can't open Log file");
		fwrite($fp, 
			@date('[d/M/Y:H:i:s]') . 
			"(" . pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME) . ")" . 
			$message . PHP_EOL);
		fclose($fp);
	}

	protected function errorMessage($message = '', $code = 400) {
		$this->response = array(
					'code' => $code,
					'message' => $message
					);
	}

	protected function successMessage($parameters) {
		$this->response = array(
					'code' => 200,
					'data' => $parameters
					);
	}

	public function replyMessage() {
		return json_encode($this->response);
	}

	public function login() {
		$headers = apache_request_headers();
		$authHeader = explode(':',base64_decode(substr($headers['Authorization'], 6)));
		if ($this->auth->doLogin($authHeader[0], $authHeader[1], $this->data)) {
			$this->user = new ttUser(null, $this->auth->getUserId());
			global $user;
			$user = $this->user;
		}
		else {
			$this->errorMessage('User or Password incorrect', 403);
			$this->replyMessage();
		}
	}

	public function execAction() {
		if (!is_object($this->user)) {
			return false;
		}
		if ($this->method == 'POST') {
			if($this->action == 'project') {
				$this->createProject();
			} else if($this->action == 'client') {
				$this->createClient();
			} else if($this->action == 'user') {
				$this->createUser();
			} else if($this->action == 'task') {
				$this->createTask();
			}
		}
		elseif ($this->method == 'PUT') {
			if($this->action == 'project') {
				$this->updateProject();
			} else if($this->action == 'client') {
				$this->updateClient();
			} else if($this->action == 'user') {
				$this->updateUser();
			} else if($this->action == 'task') {
				$this->updateTask();
			}
		}	
		elseif ($this->method == 'DELETE') {
			if($this->action == 'project') {
				$this->deleteProject();
			} else if($this->action == 'client') {
				$this->deleteClient();
			} else if($this->action == 'task') {
				$this->deleteTask();
			}
		}		

	}

	protected function createProject() {
		$project = ttProjectHelper::insert(array(
			'team_id' => $this->user->team_id,
			'name' => $this->data['project_name'],
			'description' => $this->data['project_desc'],
			'users' => (array) $this->data['project_users'],
			'tasks' => null,
			'status' => ACTIVE));

		if($project) {

			$current_client = ttClientHelper::getClient($this->data['project_client'], true);
			$assigned_projects = ttClientHelper::getAssignedProjects($this->data['project_client']);
			$projects = array();
		
			foreach($assigned_projects as $project_item) {
				$projects[] = $project_item['id'];
			}
			$projects[] = $project;

			$client = ttClientHelper::update(array(
				  'id' => $this->data['project_client'],
				  'name' => $current_client['name'],
				  'address' => $current_client['address'],
				  'tax' => null,
				  'status' => ACTIVE,
				  'projects' => $projects));

			$this->successMessage(array('ID' => $project));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function updateProject() {
		$project = ttProjectHelper::update(array(
			   'id' => $this->data['project_id'],
			   'name' => $this->data['project_name'],
			   'description' => $this->data['project_desc'],
			   'status' => ACTIVE,
			   'users' => (array) $this->data['project_users'],
			   'tasks' => null));
		if($project) {
			$this->successMessage(array('ID' => $this->data['project_id']));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function deleteProject() {
		$project = ttProjectHelper::delete($this->data['project_id']);
		if($project) {
			$this->successMessage(array('ID' => $project));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function createClient() {
		$client = ttClientHelper::insert(array(
				'team_id' => $this->user->team_id,
				'name' => $this->data['client_name'],
				'address' => $this->data['cient_desc'],
				'tax' => null,
				'projects' => null,
				'status' => ACTIVE));
		if($client) {
			$this->successMessage(array('ID' => $client));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function updateClient() {
		$client = ttClientHelper::update(array(
				  'id' => $this->data['client_id'],
				  'name' => $this->data['client_name'],
				  'address' => $this->data['cient_desc'],
				  'tax' => null,
				  'status' => ACTIVE,
				  'projects' => null));
		if($client) {
			$this->successMessage(array('ID' => $this->data['client_id']));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function deleteClient() {
		$client = ttClientHelper::delete($this->data['client_id'], false);
		if($client) {
			$this->successMessage(array('ID' => $client));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function createUser() {
		$user = ttUserHelper::insert(array(
			'name' => $this->data['user_name'],
			'login' => $this->data['user_username'],
			'password' => $this->data['user_password'],
			'rate' => null,
			'team_id' => $this->user->team_id,
			'role' => 4,
			'client_id' => null,
			'projects' => null,
			'email' => $this->data['client_name']));
		if($user) {
			$this->successMessage(array('ID' => $user));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function updateUser() {
		$fields = array(
				'name' => $this->data['user_name'],
				'login' => $this->data['user_username'],
				'rate' => null,
				'role' => 4,
				'client_id' => null,
				'projects' => null,
				'email' => $this->data['user_email']);

		if(!empty($this->data['user_password'])) {
			$fields['password'] = $this->data['user_password'];
		} 

		$user = ttUserHelper::update($this->data['user_id'], $fields);
		if($user) {
			$this->successMessage(array('ID' => $this->data['user_id']));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function createTask() {
		$task = ttActivityHelper::insert(array(
				'team_id' => $this->user->team_id,
				'name' => $this->data['task_name'],
				'description' => $this->data['task_desc'],
				'status' => ACTIVE,
				'project_id' => $this->data['task_project_id'],
				'users' => $this->data['task_users_ids']));

		if($task) {
			$this->successMessage(array('ID' => $task));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function updateTask() {
		$task = ttActivityHelper::update(array(
		  			'activity_id' => $this->data['task_id'],
					'name' => $this->data['task_name'],
					'description' => $this->data['task_desc'],
					'status' => ACTIVE,
					'project_id' => $this->data['task_project_id'],
					'users' => $this->data['task_users_ids']));
		if($task) {
			$this->successMessage(array('ID' => $this->data['task_id']));
		}
		else {
			$this->errorMessage();
		}
	}

	protected function deleteTask() {
		$task = ttActivityHelper::delete($this->data['task_id']);

		if($task) {
			$this->successMessage(array('ID' => $this->data['task_id']));
		}
		else {
			$this->errorMessage();
		}
	}
}
