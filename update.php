<?php include '../../Connections/cnOSIS.php';?>

<?php

$sql_group2 = "
UPDATE  osissp.asshead as t1
JOIN osissp.assmain as t2 on t1.assheadcode=t2.assheadcode and t1.groupnum=t2.groupnum
JOIN osis.course_db as t3 on t2.courseid=t3.courseid
set t1.userid='0000001946',t1.status='2'
WHERE t2.progid in ('INTJHS','INTPRI','INTECT') and t2.session=20221 and grade='IC'  and code in ('EBS355SW','EBS407SW','EBS490SW');




";
	if (mysql_query($sql_group2)) {
        echo "<font color='#009933' size='+2' > Records have been  Updated Sucessfully</font>";
	} else {
		echo "Error updating record: " . mysql_error();
	}
	die();
	  
?>


<?php
$sql_group2 = "-- UPDATE osissp.assmain 
       SET flag=1
	   WHERE regcode=00000000015697311063820202 AND session=20202;";
	if (mysql_query($sql_group2)) {
        echo "<font color='#009933' size='+2' > Records have been  Updated Sucessfully</font>";
	} else {
		echo "Error updating record: " . mysql_error();
	}
?>

