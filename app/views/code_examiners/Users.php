<?php



function get_all_roles(){
	$db = $GLOBALS['db'];
	$qry = "SELECT * FROM osisauth.roles ORDER BY role";
	try{
		$result = $db->select($qry);
		return (count($result) > 0) ? $result : false;
	} catch(Exception $e){
		die("USRSX001");
	}
}


function get_roles_by_domain($userid){
	$db = $GLOBALS['db'];
	$qry = "SELECT * FROM osisauth.roles WHERE domain = :domain ORDER BY role";
	try{
		$domain = $db->select("SELECT t1.domain FROM osisauth.roles t1 LEFT JOIN osisauth.users t2 ON t1.roleid=t2.roleid WHERE t2.userid=:user", array('user' => $userid));
		$result = $db->select($qry, array('domain' => $domain[0]['domain']));
		return (count($result) > 0) ? $result : false;
	} catch(Exception $e){
		die("USRSX004");
	}
}


function username_exist_in_db($username){
	$db = $GLOBALS['db'];
	$qry = "SELECT * FROM osisauth.users WHERE username=:username ";
	try{
		  $result = $db->select($qry, array('username' => $username));
		  return (count($result) === 1) ? TRUE : FALSE;
	  } catch(Exception $e){
		  die("USRSX002");
	  }
}



function get_user_attribute_by_college($centreid){
	$db = $GLOBALS['db'];
	$qry = "SELECT `username`, CONCAT(`fname`, ' ', `lname`) `name`, `comment` FROM osisauth.users WHERE centreid=:center";
	try {
		$result = $db->select($qry, array('center' => $centreid));
		return (count($result) > 0) ? $result : false;
	} catch(Exception $e) {
		// echo $db->showQuery();
		die("USRSx005");
	}
}



function add_new_user($data){
	
	$db = $GLOBALS['db'];
	//$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
	$data['password'] = md5($data['password']);

	try{
		$result = $db->insert('osisauth.users', $data);
	} catch(Exception $e){
		die("USRSX003");
	}
}


function change_password($user_id, $data){
	$db = $GLOBALS['db'];
	//$data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
	$data['password'] = md5($data['password']);
	try{
		  $result = $db->update('osisauth.users',  $data, "userid = '{$user_id}'");
		  
		  return ((int)$result === 1) ? true : false;
	  } catch(Exception $e){
		  die("USRSX004");
	  }
}


function get_college_officers_data(){
  $db = $GLOBALS['db'];
  $qry = "SELECT * FROM osisauth.users WHERE roleid=4 ";
  try{
		$result = $db->select($qry);
		return (count($result) > 0) ? $result : false;
	  } catch(Exception $e){
		  die("USRSX005");
	}
	
} 




function set_user_attribute($userid, $usr_attr=array()){
	
	 $db = $GLOBALS['db'];
	 try{
			$result = $db->update('osisauth.users',  $usr_attr, "userid = '$userid' ");
			return ((int)$result === 1) ? true : false;
		} catch(Exception $e){
			die("USRSX006");
	}
}