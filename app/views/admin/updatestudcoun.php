<?php

// var_dump($_POST);
require_once("../Connections/osisConn.php");

$valofcoun = explode('_', $_POST['feedback']);
$cid = $valofcoun[1];
$feedback = $valofcoun[0];
$sql = "UPDATE hrmscode.counselors set feedback = '$feedback' WHERE id = '$cid'";
$result = mysql_query($sql);

?>