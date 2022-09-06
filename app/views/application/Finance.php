<?php
@start_session();
require_once("models/Finance.php");

$errors = array();
$casis_user = $_SESSION['USER_ID'];
$casis_user_centreid = $_SESSION['USER_CENTREID'];

if(isset($_POST['SEARCH_STUD'])){
// var_dump($_POST);die();
    $regno = clean_input($_POST['regno']);
    $approval_list = getStudentApproval($regno, $casis_user_centreid);
    $init=1;
    include("views/finance/approve.php");
    exit();
}

if(isset($_POST['TOGGLER'])){
    $studid = clean_input($_POST['studid']);
    $action = clean_input($_POST['allow']);
    toggleStudentApproval($studid, $action);
}

$approval_list = getApprovalList($casis_user_centreid);
$init=1;
include("views/finance/approve.php");
