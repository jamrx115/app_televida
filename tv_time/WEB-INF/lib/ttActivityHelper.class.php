<?php
// +----------------------------------------------------------------------+
// | Anuko Time Tracker
// +----------------------------------------------------------------------+
// | Copyright (c) Anuko International Ltd. (https://www.anuko.com)
// +----------------------------------------------------------------------+
// | LIBERAL FREEWARE LICENSE: This source code document may be used
// | by anyone for any purpose, and freely redistributed alone or in
// | combination with other software, provided that the license is obeyed.
// |
// | There are only two ways to violate the license:
// |
// | 1. To redistribute this code in source form, with the copyright
// |    notice or license removed or altered. (Distributing in compiled
// |    forms without embedded copyright notices is permitted).
// |
// | 2. To redistribute modified versions of this code in *any* form
// |    that bears insufficient indications that the modifications are
// |    not the work of the original author(s).
// |
// | This license applies to this document only, not any other software
// | that it may be combined with.
// |
// +----------------------------------------------------------------------+
// | Contributors:
// | https://www.anuko.com/time_tracker/credits.htm
// +----------------------------------------------------------------------+

// Class ttActivityHelper is used to help with activity related operations.
class ttActivityHelper {

// insert function inserts a new activity into database, with assignment of project and users.
  static function insert($fields)
  {
	$mdb2 = getConnection();

	$team_id = (int) $fields['team_id'];
	$name = $fields['name'];
	$description = $fields['description'];
	$project_id = (int) $fields['project_id'];
	$users = $fields['users'];
	$status = $fields['status'];

	$sql = "insert into tt_activities (team_id, name, description, status) values ($team_id, ".$mdb2->quote($name).", ".$mdb2->quote($description).", ".$mdb2->quote($status).")";
	$affected = $mdb2->exec($sql);
	$last_id = 0;
	if (is_a($affected, 'PEAR_Error'))
		return false;

	$sql = "select last_insert_id() as last_insert_id";
	$res = $mdb2->query($sql);
	$val = $res->fetchRow();
	$last_id = $val['last_insert_id'];

	$sql = "insert into tt_project_activity_binds (project_id, activity_id) values ($project_id, $last_id)";
	$affected = $mdb2->exec($sql);

	if (is_a($affected, 'PEAR_Error'))
		return false;

	if (is_array($users)) {
		foreach ($users as $u_id) {
		// Insert activity binds into tt_activity_user_binds table.
			$sql = "insert into tt_activity_user_binds (activity_id, user_id) values($last_id, $u_id)";
			$affected = $mdb2->exec($sql);
			if (is_a($affected, 'PEAR_Error'))
				return false;
		}
	}

	return $last_id;
  }

// update function updates an activity in database.
  static function update($fields)
  {
	$mdb2 = getConnection();

	$activity_id = (int)$fields['activity_id'];
	$name = $fields['name'];
	$description = $fields['description'];
	$status = $fields['status'];
	$project_id = $fields['project_id'];
	$users = $fields['users'];

	$sql = "update tt_activities set name = ".$mdb2->quote($name).", description = ".$mdb2->quote($description).", status = $status where id = $activity_id";
	$affected = $mdb2->exec($sql);
	if (is_a($affected, 'PEAR_Error'))
		die($affected->getMessage());

	// update activity binds into tt_project_activity_binds table.
	$sql = "update tt_project_activity_binds set project_id = $project_id where activity_id = $activity_id";
	$affected = $mdb2->exec($sql);
	if (is_a($affected, 'PEAR_Error'))
		die($affected->getMessage());

	$sql = "delete from tt_activity_user_binds where activity_id = $activity_id";
    	$affected = $mdb2->exec($sql);
    	if (is_a($affected, 'PEAR_Error'))
      		die($affected->getMessage());

	if (is_array($users)) {
		foreach ($users as $u_id) {
		// Insert activity binds into tt_activity_user_binds table.
			$sql = "insert into tt_activity_user_binds (activity_id, user_id) values($activity_id, $u_id)";
			$affected = $mdb2->exec($sql);
			if (is_a($affected, 'PEAR_Error'))
				return false;
		}
	}

	return true;
  }

  static function delete($activity_id)
  {
	$mdb2 = getConnection();

	// Delete activity.
	$sql = "delete from tt_activities where id = $activity_id";
	$affected = $mdb2->exec($sql);
	if (is_a($affected, 'PEAR_Error'))
		return false;

	// Delete project binds to activity.
	$sql = "delete from tt_project_activity_binds where activity_id = $activity_id";
	$affected = $mdb2->exec($sql);
	if (is_a($affected, 'PEAR_Error'))
		return false;

	// Delete users binds to activity.
	$sql = "delete from tt_activity_user_binds where activity_id = $activity_id";
	$affected = $mdb2->exec($sql);
	if (is_a($affected, 'PEAR_Error'))
		return false;

	return true;
  }

}
