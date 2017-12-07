<?php

require_once('logic/crud_actions.php');
require_once('../../initialize.php');
import('form.Form');
import('ttTeamHelper');
import('ttUser');
import('ttProjectHelper');
import('ttClientHelper');
import('ttActivityHelper');

$data = null;
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
	case 'POST':
		$data = $_POST;
		break;
	case 'PUT':
	case 'DELETE':
		$str = file_get_contents("php://input");
		$data = (array) json_decode($str);
		break;
}

$api = new CRUD_Actions((array) $data['data'], $data['action'], $auth, $method);
$api->login();
$api->execAction();
echo $api->replyMessage();
