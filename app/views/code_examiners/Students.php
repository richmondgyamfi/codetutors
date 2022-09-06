<?php

function get_student_attribute($regno){
	
	 $db = $GLOBALS['db'];
	 $qry = "SELECT * FROM osis.students_db WHERE regno =:regno ";
	 try{
			$result = $db->select($qry, array('regno' => $regno));
			return (count($result) === 1) ? $result[0] : false;
		  } catch(Exception $e){
			  die("STDSX001");
		}
}

	function getProg(){
        $db = $GLOBALS['db'];
        $sql = "SELECT distinct progid,long_name from osis.prog_db";
        try{
            $results = $db->select($sql);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

    function getLevel(){
        $db = $GLOBALS['db'];
        $sql = "SELECT distinct level from osis.students_db order by level asc";
        try{
            $results = $db->select($sql);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

    function getstudsquery($prog_name, $level, $casis_user_centreid){
        $db = $GLOBALS['db'];
        $sql = "SELECT distinct(t1.regno) regno, CONCAT(t2.fname,' ',IFNULL(t2.mname,' '),' ', t2.lname) Name, 
			t3.long_name,t2.level, t1.cgpa_raw, t1.class 
			FROM  osisviews.cgpa_ranking
			AS t1
			LEFT JOIN osis.students_db AS t2 ON t2.studid=t1.studid
			LEFT JOIN osis.prog_db AS t3 ON t3.progid=t2.progid
			WHERE t2.centreid=:casis_user_centreid AND t2.progid=:prog_name AND t2.level=:level order by t1.cgpa_raw desc";
        try{
            $results = $db->select($sql, ['casis_user_centreid' => $casis_user_centreid, 'prog_name' => $prog_name, 'level' => $level]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

    function getSession($regno){
        $db = $GLOBALS['db'];
        $sql = "SELECT DISTINCT `session` FROM osisviews.assessment_examinar where regno =:regno ORDER BY `session` ASC";
        try{
            $results = $db->select($sql, ['regno' => $regno]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

function getStudentData($regno){
        $db = $GLOBALS['db'];
        $sql = "SELECT DISTINCT `regno`, `stud_name`,`prog_name`,level,`college`,`major_name` from osisviews.`assessment_examinar` where regno =:regno";
        try{
            $results = $db->select($sql, ['regno' => $regno]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

	function getStudentResultsData($regno, $session){
        $db = $GLOBALS['db'];
        $sql = "SELECT sn, `code`,`title`,cr,gd,gp,a1,a2,a3,a4,ta,total,final,audit,resit from osisviews.`assessment_examinar` WHERE regno=:regno and session=:session";
        try{
            $results = $db->select($sql, ['regno' => $regno, 'session' => $session]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

    function getGPA($regno, $session){
        $db = $GLOBALS['db'];

        try {
            $results = $db->select("SELECT DISTINCT ROUND( SUM(IF(`flag`=0, '0', `gp`)) / SUM(`cr`), 4) gpa, SUM(IF(`flag`=0, 0, `gp`)) tgp, SUM(`cr`) tcr FROM osisviews.assessment_examinar WHERE regno=:regno AND session=:sess", array('regno' => $regno, 'sess' => $session));

            return count($results) === 1 ? $results[0] : false;
        } catch(Exception $e){
            return false;
        }
    }

    function getCGPA($regno, $session){
        $db = $GLOBALS['db'];

        try {
            $results = $db->select("SELECT DISTINCT ROUND( SUM(IF(`flag`=0, '0', `gp`)) / SUM(`cr`), 4 ) gpa FROM osisviews.assessment_examinar WHERE regno=:regno AND session <= :sess", array('regno' => $regno, 'sess' => $session));

            return count($results) === 1 ? $results[0] : false;
        } catch(Exception $e){
            return false;
        }
    }

function add_new_student($appl_data){
	 $db = $GLOBALS['db'];
	 $stud_data = array();
	 
	 
	 $stud_data['doa']=$appl_data['doa'];
	 $stud_data['sex']=$appl_data['sex'];
	 $stud_data['dob']=$appl_data['dob'];
	 $stud_data['regno']=$appl_data['regno'];
	 
	 $stud_data['lname']=$appl_data['lname'];
	 $stud_data['fname']=$appl_data['fname'];
	 $stud_data['mname']=$appl_data['mname'];
	 $stud_data['progid']=$appl_data['progid'];
	 
	 $stud_data['email']=$appl_data['email'];
	 $stud_data['centreid']=$appl_data['centreid'];
	 $stud_data['cellphone']=$appl_data['cellphone'];
	 $stud_data['hometown']=$appl_data['hometown'];
	 $stud_data['ref_no']=$appl_data['refno'];
	 $stud_data['admission_no']=$appl_data['refno'];
	 $stud_data['applicant_id']=$appl_data['refno'];
	 
	 $stud_data['title']=$appl_data['title'];
	 $stud_data['level']=$appl_data['entrylevel'];
	 $stud_data['entrylevel']=$appl_data['entrylevel'];
	 
	 //debug_var($stud_data); exit;
	 
	 
	 try{
           $result = $db->insert('osis.students_db', $stud_data);
       } catch(Exception $e){
           die("STDSX003".$e);
      }
}

function delete_student_data($regno){
	
	 $db = $GLOBALS['db'];
}

function set_student_attribute($regno, $stud_attr=array()){
	
	 $db = $GLOBALS['db'];
	 try{
			$result = $db->update('osis.students_db',  $stud_attr, "regno = '$regno' ");
			return ((int)$result === 1) ? true : false;
		} catch(Exception $e){
			die("STDSX002");
	}
}

function get_max_student_reg_no($reg_no_class){
	
	$db = $GLOBALS['db'];
	$reg_no_class .='%';
	$qry = "SELECT MAX(regno) max_reg_no FROM osis.students_db WHERE regno LIKE :regno ";
	 
	 try{
			$result = $db->select($qry, array('regno' => $reg_no_class));
			return (count($result) < 1) ? 0 : $result[0];
		  } catch(Exception $e){
			  die("STDSX005");
		}
}

function create_portal_account($regno, $password){
	
	$db = $GLOBALS['db'];
	// $password_hash = password_hash($password, PASSWORD_BCRYPT);
	// $password_hash = md5($password);
	$password_hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
	
	$stud_data = array(
		'username' => $regno,
		'security_code' => $password,
		'passphrase' => $password_hash 
		);
		
	try{
          $result = $db->insert('osisextra.useraccount', $stud_data);
       } catch(Exception $e){
           die("STDSX004");
     }
}

/*
* compose sms for new student portal
* creation
*/
function compose_new_portal_sms($studname, $regno, $password){
	$msg = "Dear $studname, you have been enrolled. ";
	$msg.="Log on to https://studentioe.ucc.edu.gh using your Registration Number: $regno and Password: $password ";
	$msg.="to access the services.";
	return $msg;
}

function get_stud_data_admitted_applicants($ref_no, $centreid){
	 $db = $GLOBALS['db'];
	 $qry = "SELECT * FROM osis.students_db WHERE ref_no =:ref_no AND centreid=:centreid";
	 try{
			$result = $db->select($qry, array('ref_no' => $ref_no, 'centreid' => $centreid));
			return (count($result) === 1) ? $result[0] : false;
		  } catch(Exception $e){
			  die("STDSX005");
	}
}

function get_distinct_doa(){
	$db = $GLOBALS['db'];
	try{
		$results = $db->select("SELECT DISTINCT doa FROM osis.students_db");
		return count($results) > 0 ? $results : false;
	} catch(Exception $e){
		die("STDSX006");
	}
}

function get_user_dynamic_criteria($criteria, $data, $centreid){
	$tail = "";
	foreach($data as $key => $value){
		if($criteria === 'name') { $tail .= "t1.`{$key}`=:{$key} AND "; }
		elseif($criteria === 'identification') { $tail .= "t1.`{$key}`=:{$key} OR "; }
		else { $tail .= "t1.`{$key}`=:{$key}"; }
	}

	if($criteria === 'name'){
		$tail_end = explode('AND', $tail);
		array_pop($tail_end);
		$tail = implode(' AND ', $tail_end);
	} elseif($criteria === 'identification'){
		$tail_end = explode('OR', $tail);
		array_pop($tail_end);
		$tail = implode(' OR ', $tail_end);
	}

	$db = $GLOBALS['db'];
	try{
		$sql = "SELECT * FROM osis.students_db t1 
				JOIN osis.prog_db t2 ON t1.progid = t2.progid 
				JOIN osis.major_db t3 ON t1.majorid = t3.majorid WHERE t1.centreid = $centreid ";
		if(!empty($tail)) $sql .= "AND $tail";
		$results = $db->select($sql, $data);
		return count($results) > 0 ? $results : false;
	} catch(Exception $e){
		die($db->showQuery());
		die("STDSX007");
	}
}

function update_password($regno, $passcode, $centreid = null){
	$db = $GLOBALS['db'];

	$tail = (is_null($centreid)) ? "AND centreid = :centre" : "";

	$data = ['regno' => $regno];
	if(is_null($centreid)) { $data['centre'] = $centreid; }

	$hash = password_hash($passcode, PASSWORD_BCRYPT, ['cost' => 12]);
	try{
		$result = $db->select("SELECT regno FROM osis.students_db WHERE regno = :regno $tail", $data);
		if(count($result) === 1){
			$dataToUpdate = [
				'passphrase' => $hash,
				'security_code' => $passcode
			];

			$result2 = $db->update("osisextra.useraccount", $dataToUpdate, "username = :user", ['user' => $result[0]['regno']]);
			return (int)$result2 > 0 ? true : false;
		} else{
			return false;
		}
	} catch(Exception $e){
		die("STDSX007");
	}
}