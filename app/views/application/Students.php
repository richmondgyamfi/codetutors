<?php
@start_session();
require("models/Students.php");
require("helpers/random_char_gen.php");

$errors = array();
$filter_form = "";
$distinct_doas = get_distinct_doa();
$casis_user_centreid = $_SESSION['USER_CENTREID'];
$init = 0;

if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
    if($filter === "name"){
        $filter_form = "
            <form class='form-inline' method='post' style='display: inline-block'>
                <div class='form-group'>
                    <label class='sr-only' for='fname'>First name</label>
                    <input type='text' class='form-control' id='fname' placeholder='First name' name='fname'>
                </div>
                <div class='form-group'>
                    <label class='sr-only' for='mname'>Middle name</label>
                    <input type='text' class='form-control' id='mname' placeholder='Middle name' name='mname'>
                </div>
                <div class='form-group'>
                    <label class='sr-only' for='lname'>Last name</label>
                    <input type='text' class='form-control' id='lname' placeholder='Last name' name='lname'>
                </div>
                <input type='submit' class='btn btn-primary' name='FILTER_BY_NAME' value='Search'>
            </form>
        ";
    }

    if($filter === "identification"){
        $filter_form = "
            <form class='form-inline' method='post' style='display: inline-block'>
                <div class='form-group'>
                    <label class='sr-only' for='regno'>Registration number</label>
                    <input type='text' class='form-control' id='regno' placeholder='Registration number' name='regno'>
                </div>
                <div class='form-group'>
                    <label class='sr-only' for='admin_no'>Admission number</label>
                    <input type='text' class='form-control' id='admin_no' placeholder='Admission number' name='admin_no'>
                </div>
                <input type='submit' class='btn btn-primary' name='FILTER_BY_IDEN' value='Search'>
            </form>
        ";
    }

    if($filter === "doa"){
        $doa_string = "";
        foreach($distinct_doas as $key => $value){
            $doa_string .= "<option value='{$value['doa']}'>{$value['doa']}</option>";
        }

        $filter_form = "
            <form class='form-inline' method='post' style='display: inline-block'>
                <div class='form-group'>
                    <label class='sr-only' for='doa'>Date of Admission</label>
                    <select class='form-control' id='doa' name='doa' required>
                        <option value='' disabled selected> -- Select a value -- </option>
                        {$doa_string}
                    </select>
                </div>
                <input type='submit' class='btn btn-primary' name='FILTER_BY_DOA' value='Search'>
            </form>
        ";
    }

    if($filter === 'dob'){
        $days = range(1, 31);
        $months = range(1, 12);

        $days_string = "";
        foreach($days as $value){
            $new_value = str_pad($value, 2, "0", STR_PAD_LEFT);
            $days_string .= "<option value='{$new_value}'>{$new_value}</option>";
        }

        $months_string = "";
        foreach($months as $value){
            $new_value = str_pad($value, 2, "0", STR_PAD_LEFT);
            $months_string .= "<option value='{$new_value}'>{$new_value}</option>";
        }

        $filter_form = "
            <form class='form-inline' method='post' style='display: inline-block'>
                <div class='form-group'>
                    <label class='sr-only' for='day'>Day</label>
                    <select class='form-control' id='day' name='day' required>
                        <option value='' disabled selected>DD</option>
                        {$days_string}
                    </select>
                </div>
                <div class='form-group'>
                    <label class='sr-only' for='month'>Month</label>
                    <select class='form-control' id='month' name='month' required>
                        <option value='' disabled selected>MM</option>
                        {$months_string}
                    </select>
                </div>
                <div class='form-group'>
                    <label class='sr-only' for='year'>Year</label>
                    <input type='text' class='form-control' id='year' placeholder='YYYY' name='year' required>
                </div>
                <input type='submit' class='btn btn-primary' name='FILTER_BY_DOB' value='Search'>
            </form>
        ";
    }

    if($filter === "gender"){
        $filter_form = "
            <form class='form-inline' method='post' style='display: inline-block'>
                &nbsp;
                <div class='radio'>
                    <label>
                        <input type='radio' name='gender' value='M'> Male
                    </label>
                </div>
                &nbsp;
                <div class='radio'>
                    <label>
                        <input type='radio' name='gender' value='F'> Female
                    </label>
                </div>
                &nbsp;
                <input type='submit' class='btn btn-primary' name='FILTER_BY_GENDER' value='Search'>
            </form>
        ";
    }

    if(isset($_POST['FILTER_BY_NAME'])){
        $data = [];
        if($filter === "name"){
            if(!empty($_POST['fname'])) $data['fname'] = $_POST['fname'];
            if(!empty($_POST['mname'])) $data['mname'] = $_POST['mname'];
            if(!empty($_POST['lname'])) $data['lname'] = $_POST['lname'];
        }

        $students = get_user_dynamic_criteria($filter, $data, $casis_user_centreid);
        $init = $students && count($students) > 0 ? 1 : 0;
    }

    if(isset($_POST['FILTER_BY_IDEN'])){
        if($filter === "identification"){
            $data = [];
            if(!empty($_POST['regno'])) $data['regno'] = $_POST['regno'];
            if(!empty($_POST['admin_no'])) $data['ref_no'] = $_POST['admin_no'];
        }

        $students = get_user_dynamic_criteria($filter, $data, $casis_user_centreid);
        $init = $students && count($students) > 0 ? 1 : 0;
    }

    if(isset($_POST['FILTER_BY_DOA']) || isset($_POST['FILTER_BY_GENDER']) || isset($_POST['FILTER_BY_DOB'])){
        if($filter === "doa" | $filter === 'gender' | $filter === 'dob'){
            $data = [];
            if(isset($_POST['doa'])) $data['doa'] = $_POST['doa'];
            if(isset($_POST['gender'])) $data['sex'] = $_POST['gender'];
            if(isset($_POST['day']) & isset($_POST['month']) & isset($_POST['year'])) $data['dob'] = "{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
        }

        $students = get_user_dynamic_criteria($filter, $data, $casis_user_centreid);
        $init = $students && count($students) > 0 ? 1 : 0;
    }

    include("views/students/details.php");
}


if(isset($_POST['CHANGE_PASSWD'])){
    $regno = $_POST['regno'] ?? "";
    $password = random_num();
    $upd = 0;
    if($regno !== ''){
        $upd = update_password($regno, $password, $casis_user_centreid);
        if(!$upd) {
            $errors[] = "A new password wasn't generated. Please try again or double check the registration number!";
            include("views/students/change_password.php");
            exit;
        }
    } else{
        $errors[] = "Please provide a valid registration number. Thank you!";
		include("views/students/change_password.php");
		exit;
    }

    $init = 1;
    include("views/students/change_password.php");
}


if(isset($_POST['SEARCH_STUD'])){
// var_dump($_POST);die();
    $regno = clean_input($_POST['regno']);
    $sessiondata = getSession($regno);
    $sdata = getStudentData($regno);
    // $sresults = getStudentResultsData($regno, $session);
    // var_dump($sessiondata);die();
    $init=1;
    include("views/students/stud_transcript.php");
    exit();
}

if(isset($_POST['SEARCH_STUDS'])){
// var_dump($_POST);die();
    // $casis_user_centreid
    $prog_name = clean_input($_POST['prog_name']);
    $level = clean_input($_POST['level']);
    $getProg = getProg();
    $getLevel = getLevel();
    $getstudsquery = getstudsquery($prog_name, $level,$casis_user_centreid);
    $getstudsquery1 = getstudsquery($prog_name, $level,$casis_user_centreid);
    // var_dump($getstudsquery);die();

    $init=1;
    include("views/students/stud_data.php");
    exit();
}

    $getProg = getProg();
    $getLevel = getLevel();
    // var_dump($getProg);
    // var_dump($getLevel);
    $init=1;
    include("views/students/stud_data.php");

?>