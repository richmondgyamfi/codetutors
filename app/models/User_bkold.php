<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function gettotal_app(){
        $this->db->query("SELECT (SELECT COUNT(*) FROM `applying_tutors`) AS total_ap, 
        (SELECT COUNT(*) FROM `applying_tutors` WHERE STATUS = 0) AS new_ap,
        (SELECT COUNT(*) FROM `applying_tutors` WHERE STATUS = 1) AS selected_ap,
        (SELECT COUNT(*) FROM `applying_tutors` WHERE STATUS = 2) AS rejected_ap ,
        (SELECT COUNT(*) FROM `applying_tutors` WHERE STATUS = 3) AS appointed_ap
        FROM `applying_tutors`");

        $result = $this->db->resultSet();

        return $result;
    }

    public function gettotal_app1(){
        $this->db->query("SELECT (SELECT COUNT(*) FROM `codeexaminers` where fname is not null) AS total_ap, 
        (SELECT COUNT(*) FROM `codeexaminers` WHERE STATUS = 1 and fname is not null) AS new_ap,
        (SELECT COUNT(*) FROM `codeexaminers` WHERE STATUS = 2 and fname is not null) AS selected_ap,
        (SELECT COUNT(*) FROM `codeexaminers` WHERE STATUS = 3 and fname is not null) AS rejected_ap ,
        (SELECT COUNT(*) FROM `codeexaminers` WHERE STATUS = 4 and fname is not null) AS appointed_ap
        FROM `codeexaminers` where fname is not null");

        $result = $this->db->resultSet();

        return $result;
    }

    public function gettotal_courses($sid){
        $this->db->query("select * from code_courses
        WHERE t1.id='$sid' ORDER BY t3.course_name");

        $result = $this->db->resultSet();

        return $result;
    }

    public function gettotal_allcourses(){
        $this->db->query("select * from code_courses order by course_name");

        $result = $this->db->resultSet();

        return $result;
    }

    public function gettotal_centers(){
        $this->db->query("select id, centre_name from code_centres");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getall_app(){
        $this->db->query("SELECT * FROM `applying_tutors` where state > 0");

        $result = $this->db->resultSet();

        return $result;
    }

    public function check_datalog($phn){
            try {
                $itemlist = $this->db->query("SELECT *, concat(fname,' ',ifnull(mname,' '),' ',lname) as ename FROM `codeexaminers` WHERE staffno = '$phn' and status = 2 and fname is not null");

                $items = $this->db->single();
                return $items;
            } catch (\Throwable $th) {
                return false;
            }
        }

    public function check_datalog1($phn){
        try {
            $itemlist = $this->db->query("SELECT * FROM `applying_tutors` WHERE phone_no = '$phn'");

            $items = $this->db->single();
            return $items;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function selcoun(){
        $runtype = $_SESSION['role'];
        $this->db->query("SELECT * FROM `users`");

        $result = $this->db->resultSet();

        return $result;
    }

    public function newcounsel_studapp(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT t1.*, concat(t2.fname,' ',t2.lname) as sname, regno FROM hrmscode.`counselors` as t1
left join osis.students_db as t2 on t1.studid = t2.studid where t1.status = 0");

        $result = $this->db->resultSet();

        return $result;
    }

    public function newcounsel_staffapp(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT t1.*, concat(t2.fname,' ',t2.lname) as sname FROM hrmscode.`counselors_staff` as t1
left join hr.staff as t2 on t1.staff_id = t2.staff_no where t1.status = 0");

        $result = $this->db->resultSet();

        return $result;
    }

    public function allcounsel_stud(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT * FROM `counselors`");

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_receivedall(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT t1.*, concat(t2.fname,' ',t2.lname) as sname, t3.fullname FROM hrmscode.`counselors` as t1
        left join osis.students_db as t2 on t1.studid = t2.studid 
        left join hrmscode.users as t3 on t1.received_by = t3.username
        where t1.status > 0");
        $this->db->bind(':username', $_SESSION['username']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_received_staffall(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT t1.*, concat(t2.fname,' ',t2.lname) as sname, t3.fullname FROM hrmscode.`counselors_staff` as t1
        left join hr.staff as t2 on t1.staff_id = t2.staff_no 
        left join hrmscode.users as t3 on t1.received_by = t3.username
        where t1.status > 0");
        $this->db->bind(':username', $_SESSION['username']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_received(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT t1.*, concat(t2.fname,' ',t2.lname) as sname, t3.fullname FROM hrmscode.`counselors` as t1
        left join osis.students_db as t2 on t1.studid = t2.studid 
        left join hrmscode.users as t3 on t1.received_by = t3.username
        where t1.status > 0 and t1.received_by = :username");
        $this->db->bind(':username', $_SESSION['username']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_received_staff(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT t1.*, concat(t2.fname,' ',t2.lname) as sname, t3.fullname FROM hrmscode.`counselors_staff` as t1
        left join hr.staff as t2 on t1.staff_id = t2.staff_no 
        left join hrmscode.users as t3 on t1.received_by = t3.username
        where t1.status > 0 and t1.received_by = :username");
        $this->db->bind(':username', $_SESSION['username']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_log($data){
        $this->db->query("SELECT *, t1.sub_date as actdate FROM counselors as t1
        left join counseling_log as t2 on t1.id = t2.cid 
        left join hrmscode.users as t3 on t2.reassigned_to = t3.username where cid = :cid");
        $this->db->bind(':cid', $data);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_log_staff($data){
        $this->db->query("SELECT *, t1.sub_date as actdate FROM counselors_staff as t1
        left join counseling_log_staff as t2 on t1.id = t2.cid 
        left join hrmscode.users as t3 on t2.reassigned_to = t3.username where cid = :cid");
        $this->db->bind(':cid', $data);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_users(){
        $role = $_SESSION['role'];
        $this->db->query("SELECT * FROM `users` where status = 0 and role >= 2");

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_completed(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT * FROM `counselors` where status > 3 and received_by = :username");
        $this->db->bind(':username', $_SESSION['username']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsel_awaitng(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT * FROM `counselors` where status in (1,2,3,4) and received_by = :username");
        $this->db->bind(':username', $_SESSION['username']);

        $result = $this->db->resultSet();

        return $result;
    }

    public function counsels_stat(){
        $runtype = (($_SESSION['role'] == 2)?'DC':'RG');
        $this->db->query("SELECT count(*) as totalno,received_by,fullname FROM hrmscode.counselors as t1 
        left join hrmscode.users as t2 on t1.received_by = t2.username where t1.received_by is not null and t1.status > 0 GROUP BY received_by, fullname");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getall_app1(){
        $this->db->query("SELECT * FROM `codeexaminers` where fname is not null");

        $result = $this->db->resultSet();

        return $result;
    }

    public function report_query($dda){

        $this->db->query("SELECT * FROM `applying_tutors` WHERE status = $dda");

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            $result = "";
            return $result;
        }

        // return $result;
    }

    public function update_App1($data){
        $this->db->query("UPDATE `codeexaminers` 
        SET `status` = :status_app WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':pid', $data['pid']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function report_query1($dda){

        $this->db->query("SELECT * FROM `codeexaminers` WHERE status = $dda and fname is not null order by marking_centre asc");

        $result = $this->db->resultSet();

        if ($result) {
            return $result;
        } else {
            $result = "";
            return $result;
        }

        // return $result;
    }

    public function update_password($pass){
        $this->db->query("UPDATE users SET `password` = :newpassword WHERE username = :uname");

        $this->db->bind(':uname', $_SESSION['username']);
        $this->db->bind(':newpassword', $pass);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function code_logs($staffno, $activity){
        $this->db->query("insert into code_logs(loginid,activity) values(:staffno,:activity)");

        $this->db->bind(':staffno', $staffno);
        $this->db->bind(':activity', $activity);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function createuser($data){
        $this->db->query("insert into users(fullname,username,password,email) values(:fullname,:uname,:password,:email)");

        $this->db->bind(':fullname', $data['fullname']);
        $this->db->bind(':uname', $data['uname']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function subcouncil($data){
        $this->db->query("insert into counselors(council_needed
        ,phone_no
        ,email
        ,studid) 
        values(:cantype
        ,:phone_no
        ,:email
        ,:studid)");

        $this->db->bind(':cantype', $data['cantype']);
        $this->db->bind(':phone_no', $data['phone_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':studid', $data['studid']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function update_App($data){
        $this->db->query("UPDATE `applying_tutors` 
        SET `status` = :status_app WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':pid', $data['pid']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function checkstaff_no($sno){
        $this->db->query("SELECT * FROM staff_no where staff_no = :staff_no");
        $this->db->bind(':staff_no', $sno);

        $result = $this->db->resultSet();

        return $result;
    }

    public function checkstaff_code($sno){
        $this->db->query("SELECT * FROM codeexaminers where staffno = :staff_no");
        $this->db->bind(':staff_no', $sno);

        $result = $this->db->resultSet();

        return $result;
    }

    public function checkstaff_no_hr($sno){
        $this->db->query("SELECT * FROM hr.staff where staff_no = :staff_no");
        $this->db->bind(':staff_no', $sno);

        $result = $this->db->resultSet();

        return $result;
    }

    public function checkapply(){
        $this->db->query("SELECT * FROM codeexaminers where fname is not null");

        $result = $this->db->resultSet();

        return $result;
    }

    public function gettotalcode_courses(){
        $this->db->query("SELECT * FROM code_courses ORDER BY course_name");

        $result = $this->db->resultSet();

        return $result;
    }

    public function reassigned(){
        $this->db->query("select * from hrmscode.counselors as t1
        left join osis.students_db as t2 on t1.studid = t2.studid
         where t1.received_by = :username and  t1.reassigned >0");
        $this->db->bind(':username', trim($_SESSION['username']));

        $result = $this->db->resultSet();

        return $result;
    }

    public function update_Appcouncil($data){
        // var_dump($data);die();
        $this->db->query("UPDATE `counselors` 
        SET `status` = :status_app, received_by = :username WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':pid', $data['pid']);
        $this->db->bind(':username', trim($data['username']));

        if($this->db->execute()){
            $this->db->query("insert into counseling_log(reassigned_to, cid, comments, state) values(:reassigned_to,:cid, :comments, :state)");
            $this->db->bind(':state', $data['status_app']);
            $this->db->bind(':comments', 'Assigned to counsellor');
            $this->db->bind(':reassigned_to', $data['username']);
            $this->db->bind(':cid', $data['pid']);
            if($this->db->execute()){
                return true;
            }else{
            return false;
            }
        }else{
            return false;
        }
    }

    public function update_Appcouncil_staff($data){
        // var_dump($data);die();
        $this->db->query("UPDATE `counselors_staff` 
        SET `status` = :status_app, received_by = :username WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':pid', $data['pid']);
        $this->db->bind(':username', trim($data['username']));

        if($this->db->execute()){
            $this->db->query("insert into counseling_log_staff(reassigned_to, cid, comments, state) values(:reassigned_to,:cid, :comments, :state)");
            $this->db->bind(':state', $data['status_app']);
            $this->db->bind(':comments', 'Assigned to counsellor');
            $this->db->bind(':reassigned_to', $data['username']);
            $this->db->bind(':cid', $data['pid']);
            if($this->db->execute()){
                return true;
            }else{
            return false;
            }
        }else{
            return false;
        }
    }

    public function update_Appcou_staff($data){
        // var_dump($data);die();
        $this->db->query("UPDATE `counselors_staff` 
        SET `status` = :status_app, comments =:comments WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':comments', $data['comments']);
        $this->db->bind(':pid', $data['pid']);
        // $this->db->execute();
        if($this->db->execute()){
            $this->db->query("insert into counseling_log_staff(cid, comments, state) values(:cid, :comments, :state)");
            $this->db->bind(':state', $data['status_app']);
            $this->db->bind(':comments', $data['comments']);
            // $this->db->bind(':reassigned_to', $data['sno']);
            $this->db->bind(':cid', $data['pid']);
            if($this->db->execute()){
                return true;
            }else{
            return false;
            }
        }

        else{
            return false;
        }
    }

    public function update_Appcou($data){
        // var_dump($data);die();
        $this->db->query("UPDATE `counselors` 
        SET `status` = :status_app, comments =:comments, reassigned = 1  WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':comments', $data['comments']);
        // $this->db->bind(':reassigned_to', $data['sno']);
        $this->db->bind(':pid', $data['pid']);
        // $this->db->execute();
        if($this->db->execute()){
            $this->db->query("insert into counseling_log(cid, comments, state) values(:cid, :comments, :state)");
            $this->db->bind(':state', $data['status_app']);
            $this->db->bind(':comments', $data['comments']);
            // $this->db->bind(':reassigned_to', $data['sno']);
            $this->db->bind(':cid', $data['pid']);
            if($this->db->execute()){
                return true;
            }else{
            return false;
            }
        }

        else{
            return false;
        }
    }

    public function update_Appcou1($data){
        // var_dump($data);die();
        $this->db->query("UPDATE `counselors` 
        SET `status` = :status_app, comments =:comments, reassigned = 1, received_by = :reassigned_to  WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':comments', $data['comments']);
        $this->db->bind(':reassigned_to', $data['sno']);
        $this->db->bind(':pid', $data['pid']);
        // $this->db->execute();
        if($this->db->execute()){
            $this->db->query("insert into counseling_log(reassigned_to, cid, comments, state) values(:reassigned_to,:cid, :comments, :state)");
            $this->db->bind(':state', $data['status_app']);
            $this->db->bind(':comments', $data['comments']);
            $this->db->bind(':reassigned_to', $data['sno']);
            $this->db->bind(':cid', $data['pid']);
            if($this->db->execute()){
                return true;
            }else{
            return false;
            }
        }

        else{
            return false;
        }
    }

    public function update_Appcou1_staff($data){
        // var_dump($data);die();
        $this->db->query("UPDATE `counselors_staff` 
        SET `status` = :status_app, comments =:comments, reassigned = 1, received_by = :reassigned_to  WHERE `id` = :pid");
        
        $this->db->bind(':status_app', $data['status_app']);
        $this->db->bind(':comments', $data['comments']);
        $this->db->bind(':reassigned_to', $data['sno']);
        $this->db->bind(':pid', $data['pid']);
        // $this->db->execute();
        if($this->db->execute()){
            $this->db->query("insert into counseling_log_staff(reassigned_to, cid, comments, state) values(:reassigned_to,:cid, :comments, :state)");
            $this->db->bind(':state', $data['status_app']);
            $this->db->bind(':comments', $data['comments']);
            $this->db->bind(':reassigned_to', $data['sno']);
            $this->db->bind(':cid', $data['pid']);
            if($this->db->execute()){
                return true;
            }else{
            return false;
            }
        }

        else{
            return false;
        }
    }

    public function getapp_data($id){
        $this->db->query("SELECT t1.*, t2.`centre_name`, t3.course_name as title FROM `applying_tutors` AS t1
        LEFT JOIN `code_centres` AS t2 ON t1.`study_cen1` = t2.`id`
        LEFT JOIN code_courses AS t3 ON t1.`course_sel` = t3.id WHERE t1.id = $id");

        $result = $this->db->resultSet();

        return $result;
    }

    public function submit_App1($data){
        $this->db->query('UPDATE codeexaminers set
        fname = :fname,mname = :mname,lname=:lname,dob=:dob,gender=:gender,ghcard_no=:ghcard_no,phone_no=:phone_no,email=:email,
        curr_loc=:curr_loc,course=:course,program=:program,centre=:centre,level=:level,marked=:marked,bankname=:bankname,
        branch=:branch,acc_name=:acc_name,acc_no=:acc_no,status=1,dateapplied=current_timestamp where staffno=:staffno');


        //Bind values
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':mname', $data['mname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':ghcard_no', $data['ghcard_no']);
        $this->db->bind(':phone_no', $data['phone_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':curr_loc', $data['curr_loc']);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':program', $data['program']);
        $this->db->bind(':centre', $data['centre']);
        $this->db->bind(':level', $data['level']);
        $this->db->bind(':marked', $data['marked']);
        $this->db->bind(':bankname', $data['bankname']);
        $this->db->bind(':branch', $data['branch']);
        $this->db->bind(':acc_name', $data['acc_name']);
        $this->db->bind(':acc_no', $data['acc_no']);
        $this->db->bind(':staffno', $_SESSION['staff_no_start']);
        // die();
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function check_data1($phn, $email){
        $this->db->query("SELECT * FROM `codeexaminers` WHERE phone_no = '$phn' OR email = '$email'");

        $row = $this->db->single();
        // $result = $this->db->resultSet();

        return $row;
    }

    public function check_data($phn, $email){
        $this->db->query("SELECT * FROM `applying_tutors` WHERE phone_no = '$phn' OR email = '$email'");

        $row = $this->db->single();
        // $result = $this->db->resultSet();

        return $row;
    }

    public function applicantdata(){
        try {
            $itemlist = $this->db->query("SELECT * FROM `applying_tutors` WHERE id = :userid");
            $this->db->bind(':userid', $_SESSION['user_id']);

            $items = $this->db->resultSet();
            return (int) $items > 0 ? $items : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function gettotalcode_centers(){
        $this->db->query("SELECT * FROM code_centres ORDER BY centre_name");

        $result = $this->db->resultSet();

        return $result;
    }

    public function gettotal_prog(){
        $this->db->query("SELECT * FROM code_program ORDER BY prog_name");

        $result = $this->db->resultSet();

        return $result;
    }

    public function update_App2($data){
        $this->db->query("UPDATE `codeexaminers` 
        SET 
        examiner_type = :examiner_type,
        resident_status = :resident_status,
        course = :course,
        marking_centre = :marking_centre
        WHERE `id` = :pid");
        
        $this->db->bind(':examiner_type', $data['examiner_type']);
        $this->db->bind(':resident_status', $data['resident_status']);
        $this->db->bind(':course', $data['course']);
        $this->db->bind(':marking_centre', $data['marking_centre']);
        $this->db->bind(':pid', $data['pid']);
        // $this->db->bind(':status_app', '2');

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getallcode_app(){
        $this->db->query("SELECT * FROM `codeexaminers` where fname is not null");

        $result = $this->db->resultSet();

        return $result;
    }

    public function submit_Appst($data){
        $this->db->query('INSERT INTO applying_tutors (
        fname,mname,lname,phone_no) 
        VALUES(:fname,:mname,:lname,:phone_no)');

        //Bind values
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':mname', $data['mname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':phone_no', $data['phone_no']);
        // die();
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function submit_App($data){
        // var_dump($data);die();
        $this->db->query('update applying_tutors set fname = :fname
        ,mname = :mname,lname = :lname,dob = :dob,gender = :gender,phone_no = :phone_no,email = :email,
        curr_loc = :curr_loc,f_degree = :f_degree,sec_degree_status = :sec_degree_status,
        course_sel = :course_sel,course_sel1 = :course_sel1,study_cen1 = :study_cen1,cv = :cv,f_degree_cert = :f_degree_cert,
        f_degree_trans = :f_degree_trans,sec_deg_cert = :sec_deg_cert,sec_degree_trans = :sec_degree_trans
        ,detail_result = :detail_result
        ,s_degree = :s_degree,t_degree = :t_degree,t_degree_status = :t_degree_status,t_deg_cert = :t_deg_cert
        ,t_degree_trans = :t_degree_trans,othercert = :othercert,othercertname = :othercertname, staffno = :staffno
        ,tb_detail_result = :tb_detail_result, id_type = :id_type, cardno = :cardno, f_degree2 = :f_degree2, 
        staffpic = :staffpic, f_degree_cert2 = :f_degree_cert2
        ,f_degree_trans2 = :f_degree_trans2, study_cen2 = :study_cen2, centre_coor = :centre_coor, t_existing = :t_existing,
        study_cen3 = :cord_centre, state = :state  where id =:aid');

        //Bind values
        $this->db->bind(':fname', $data['fname']);
        $this->db->bind(':mname', $data['mname']);
        $this->db->bind(':lname', $data['lname']);
        $this->db->bind(':dob', $data['dob']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':phone_no', $data['phone_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':curr_loc', $data['curr_loc']);
        $this->db->bind(':f_degree', $data['f_degree']);
        $this->db->bind(':s_degree', $data['s_degree']);
        $this->db->bind(':sec_degree_status', $data['sec_degree_status']);
        $this->db->bind(':course_sel', $data['course_sel']);
        $this->db->bind(':course_sel1', $data['course_sel1']);
        $this->db->bind(':study_cen1', $data['study_cen1']);
        $this->db->bind(':cv', $data['cv']);
        $this->db->bind(':f_degree_cert', $data['f_degree_cert']);
        $this->db->bind(':f_degree_trans', $data['f_degree_trans']);
        $this->db->bind(':sec_deg_cert', $data['sec_deg_cert']);
        $this->db->bind(':sec_degree_trans', $data['sec_degree_trans']);
        $this->db->bind(':detail_result', $data['detail_result']);
        $this->db->bind(':t_degree', $data['t_degree']);
        $this->db->bind(':t_degree_status', $data['t_degree_status']);
        $this->db->bind(':t_deg_cert', $data['t_deg_cert']);
        $this->db->bind(':t_degree_trans', $data['t_degree_trans']);
        $this->db->bind(':othercert', $data['othercert']);
        $this->db->bind(':othercertname', $data['othercertname']);
        $this->db->bind(':tb_detail_result', $data['tb_detail_result']);
        $this->db->bind(':staffno', $data['staffno']);
        $this->db->bind(':id_type', $data['id_type']);
        $this->db->bind(':cardno', $data['cardno']);
        $this->db->bind(':f_degree2', $data['f_degree2']);
        $this->db->bind(':staffpic', $data['staffpic']);
        $this->db->bind(':f_degree_cert2', $data['f_degree_cert2']);
        $this->db->bind(':f_degree_trans2', $data['f_degree_trans2']);
        $this->db->bind(':study_cen2', $data['study_cen2']);
        $this->db->bind(':centre_coor', $data['centre_coor']);
        $this->db->bind(':cord_centre', $data['cord_centre']);
        $this->db->bind(':t_existing', $data['t_existing']);
        $this->db->bind(':state', $data['state']);
        $this->db->bind(':aid', $_SESSION['user_id']);
        
        // die();
        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $sql = $this->db->query('SELECT * FROM users WHERE username = :username and status = 0');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();
        if($row){
            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
            //     echo $row->password;
            // die();
                return $row;
            } else {
                return false;
            }
        }else{
            return false;
        }
        
    }

    public function checkuser($username) {
        $sql = $this->db->query('SELECT * FROM users WHERE username = :username and status = 0');

        //Bind value
        $this->db->bind(':username', $username);

        // $row = $this->db->single();
        // var_dump($row);
        // die();
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
        
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}