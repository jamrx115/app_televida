<?php

class API_Sender
{
	protected $url = 'http://localhost/proyectos/index.php/Api/';
	protected $user, $data, $duration, $start, $finish, $response;

	public function __construct($user) {
		$this->user = $user;
	}

	public function setPath($path)
	{
		$this->url.= $path;
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	public function setNewTime($start, $finish)
	{
		$this->start = ttTimeHelper::to24HourFormat($start);
		$this->finish = ttTimeHelper::to24HourFormat($finish);
		$this->duration = ttTimeHelper::toDuration($start, $finish);
		if (!$this->duration) {
			return false;
		}
		return true;
	}	

	public function createTaskTime($idTask, $date, $note, $real_finish)
	{	
		$params = array('task_id' => $idTask,
				'date' => $date,				
				'start' => $this->start,
				'finish' => $this->finish,
				'real_finish' => $real_finish,
				'duration' => $this->duration,
				'notes' => $note);

		$this->setData(array('data' => json_encode($params)));
		$this->setPath('index/createtime');
		$this->sendPost();
		
		return $this->getResponse();		
	}

	public function updateTaskTime($idPhprojekt, $idTask, $date, $note, $real_finish)
	{	
		$params = array('timecard_id' => $idPhprojekt,
				'task_id' => $idTask,
				'date' => $date,				
				'start' => $this->start,
				'finish' => $this->finish,
				'real_finish' => $real_finish,
				'duration' => $this->duration,
				'notes' => $note);

		$this->setData(array('data' => json_encode($params)));
		$this->setPath('index/updatetime');
		$this->sendPost();
		
		return $this->getResponse();		
	}

	public function deleteTaskTime($idPhprojekt)
	{	
		$params = array('timecard_id' => $idPhprojekt);

		$this->setData(array('data' => json_encode($params)));
		$this->setPath('index/deletetime');
		$this->sendPost();
		
		return $this->getResponse();		
	}

	public function sendPost() {

		$ch = curl_init();

		$opt = array(	CURLOPT_URL => $this->url,
				CURLOPT_HEADER => 0,
				CURLOPT_HTTPHEADER => array( $this->authHeader() ),
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $this->data );
					
		curl_setopt_array($ch, $opt);

		$this->response = curl_exec($ch);

		curl_close($ch);
	}

	protected function authHeader()
	{
		$credentials = $this->user->login . ':' . $this->getPassword($this->user);
		return "Authorization: Basic " . base64_encode($credentials);
	}

	protected function getPassword($user)
	{
		return md5($user->login . $this->data['data'] . '_4lLt1C001');
	}

	public function getResponse()
	{		
		$responseRaw = json_decode($this->response);
		$response = ($responseRaw->code == 200) ? $responseRaw->data : false;
		return $response;
	}

}
