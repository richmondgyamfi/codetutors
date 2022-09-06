<?php
    function hasNotPaid($regno){
        $db = $GLOBALS['db'];
        try{
            $result = $db->select("SELECT * FROM osisfin.stud_payments WHERE trim(regno)=:regno", ['regno' => $regno]);
            return count($result) === 0 ? true : false;
        } catch(Exception $e){
            die("FINx001");
        }
    }

    function hasPaymentIssue($regno){
        $db = $GLOBALS['db'];
        try{
            $result = $db->select("SELECT * FROM osisfin.stud_payments WHERE trim(regno)=:regno AND allow = 'NO'", ['regno' => $regno]);
            return count($result) === 1 ? $result[0]['comment'] : false;
        } catch(Exception $e){
            die("FINx002");
        }
    }

    function isApproved($studid){
        $db = $GLOBALS['db'];
        try{
            $result = $db->select("SELECT allow FROM osispref.college_approval WHERE studid=:studid", ['studid' => $studid]);
            return count($result) === 1 && (int)$result[0]['allow'] === 1 ? true : false;
        } catch(Exception $e){
            die("FINx003");
        }
    }

    function getApprovalList($centreid){
        $db = $GLOBALS['db'];
        $sql = "SELECT t1.*, t2.regno, concat(t2.lname, ' ', t2.fname, ' ', ifnull(t2.mname, '')) `student_name` FROM osispref.college_approval t1 JOIN osis.students_db t2 ON t1.studid = t2.studid WHERE t2.centreid = :centre ORDER BY regno";
        try{
            $results = $db->select($sql, ['centre' => $centreid]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx004');
        }
    }

    function getApprovalList1($acasession, $centreid){
        $db = $GLOBALS['db'];
        $sql = "SELECT DISTINCT t1.studid,t1.flag,t2.regno, concat(t2.lname, ' ', t2.fname, ' ', ifnull(t2.mname, '')) `student_name` FROM osissp.assmain t1 JOIN osis.students_db t2 ON t1.studid = t2.studid WHERE t1.session=:acasession AND t1.flag IN (1,2) AND  t2.centreid = :centre ORDER BY regno";
        try{
            $results = $db->select($sql, ['centre' => $centreid, 'acasession' => $acasession]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx004a');
        }
    }

    function getStudentApproval($regno, $centreid){
        $db = $GLOBALS['db'];
        $sql = "SELECT t1.*, t2.regno, concat(t2.lname, ' ', t2.fname, ' ', ifnull(t2.mname, '')) `student_name` FROM osispref.college_approval t1 JOIN osis.students_db t2 ON t1.studid = t2.studid WHERE t2.centreid = :centre AND t2.regno = :regno";
        try{
            $results = $db->select($sql, ['centre' => $centreid, 'regno' => $regno]);
            return count($results) === 1 ? $results : false;
        } catch(Exception $e){
            die('FINx005');
        }
    }

    function getStudentApproval1($acasession, $regno, $centreid){
        $db = $GLOBALS['db'];
        $sql = "SELECT DISTINCT t1.studid, t1.flag, t2.regno, concat(t2.lname, ' ', t2.fname, ' ', ifnull(t2.mname, '')) `student_name` FROM osissp.assmain t1 JOIN osis.students_db t2 ON t1.studid = t2.studid WHERE t1.session=:acasession AND t1.flag IN (1,2) AND t2.centreid = :centre AND t2.regno = :regno";
        try{
            $results = $db->select($sql, ['centre' => $centreid, 'regno' => $regno, 'acasession' => $acasession]);
            return count($results) === 1 ? $results : false;
        } catch(Exception $e){
            die('FINx005a');
        }
    }
    
    function getacyrStudentApproval($acasession, $centreid){
        $db = $GLOBALS['db'];
        $sql = "SELECT DISTINCT t1.studid, t1.flag, t2.regno, concat(t2.lname, ' ', t2.fname, ' ', ifnull(t2.mname, '')) `student_name` FROM osissp.assmain t1 JOIN osis.students_db t2 ON t1.studid = t2.studid WHERE t1.session= :acasession AND t1.flag IN (1,2) AND t2.centreid = :centre order by regno";
        try{
            $results = $db->select($sql, ['centre' => $centreid, 'acasession' => $acasession]);
            return count($results) > 0 ? $results : false;
        } catch(Exception $e){
            die('FINx005a');
        }
    }

    function toggleStudentApproval($studid, $toggle = "approve"){
        // var_dump($studid);die();
        $db = $GLOBALS['db'];
        try{
            if($toggle == "approve"){
                $result = $db->update("osispref.college_approval", ['allow' => 1], "studid = :studid", ['studid' => $studid]);
            } else{
                $result = $db->update("osispref.college_approval", ['allow' => 0], "studid = :studid", ['studid' => $studid]);
            }
            
            return (int)$result === 1 ? true : false;
        } catch(Exception $e){
            die('FINx006');
        }
    }


    function toggleStudentApproval1($acasession, $studid, $toggle = "approve"){
        // var_dump($studid);die();
        $db = $GLOBALS['db'];
        try{
            if($toggle == "approve"){
                $result = $db->update("osissp.assmain", ['flag' => 2], "studid = :studid AND session=:acasession", ['studid' => $studid, 'acasession' => $acasession] );
            } else{
                $result = $db->update("osissp.assmain", ['flag' => 1], "studid = :studid AND session=:acasession", ['studid' => $studid, 'acasession' => $acasession]);
            }
            
            return (int)$result === 1 ? true : false;
        } catch(Exception $e){
            die('FINx006a');
        }
    }

    function isPaidApplicant($refno){
        $db = $GLOBALS['db'];
        $sql = "SELECT osisviews.HAS_PAID_ADMISSION(:refno) `pay_state`";
        try{
            $result = $db->select($sql, ['refno' => $refno]);
            return $result[0]['pay_state']; 
        } catch(Exception $e){
            die('FINx007');
        }
    }
    
    function acdemicyr($accyr){
        $db = $GLOBALS['db'];
        $sql = "SELECT distinct(session) as accademicsession, LEFT(session,4) new,   (LEFT(session,4) -1) new1, if(RIGHT(session,1)=1,'First Semester','Second Semester')  AS semester FROM osissp.assmain
WHERE session >= :accyr";
        try{
            $result = $db->select($sql, ['accyr' => $accyr]);
            return $result; 
        } catch(Exception $e){
            die('FINx00r3');
        }
    }

    function updatePaidApplicant($refno, $data){
        $db = $GLOBALS['db'];
        try{
            $result = $db->update('osisfin.paid_applicants', $data, "applicant_id = :refno", ['refno' => $refno]);
            return $result;
        } catch(Exception $e){
            die('FINx008');
        }
    }

    function insertApproval($regno){
        $db = $GLOBALS['db'];
        $sql = "INSERT IGNORE INTO osispref.college_approval(studid, allow)
        SELECT studid, 1 `allow` FROM osis.students_db WHERE regno = :regno";
        
        try{
            $result = $db->complexQuery($sql, ['regno' => $regno]);
            return $result;
        } catch(Exception $e){
            die('FINx008');
        }
    }

    function insertStudFinancials($refno, $acadyr){
        $db = $GLOBALS['db'];
        $sql = "INSERT IGNORE INTO osisfin.student_financials(acad_yr, payable, paid, cf, regno)
        SELECT '{$acadyr}' `acad_yr`, t3.fees `payable`, t1.amount_paid `paid`, t3.fees `cf`, t2.regno
        FROM osisfin.bank_data t1 
        JOIN osis.students_db t2 ON t1.student_no = t2.ref_no 
        JOIN osisfin.userfees t3 ON t2.level = t3.level AND t2.progid = t3.progid
        WHERE t1.student_no = :refno";
        try {
            $result = $db->complexQuery($sql, ['refno' => $refno]);
            return $result;
        } catch (Exception $e) {
            die('FINx009');
        }
    }

    function insertStudPayments($refno){
        $db = $GLOBALS['db'];
        $sql = "INSERT IGNORE INTO osisfin.stud_payments(regno, amount, pmt_type, allow, `comment`)
        SELECT t1.regno, paid `amount`, 'NML' `pmt_type`, IF(paid >= payable, 'YES', 'NO') `allow`, IF(paid >= payable, 'Cleared to register', concat('Sorry you still owe ', payable - paid)) `comment`
        FROM osisfin.student_financials t1 JOIN osis.students_db t2 ON t1.regno = t2.regno 
        WHERE paid > 0 AND ref_no = :refno";
        try {
            $result = $db->complexQuery($sql, ['refno' => $refno]);
            return $result;
        } catch (Exception $e) {
            die('FINx010');
        }
    }
?>
