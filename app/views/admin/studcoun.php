<?php
session_start();
include("../lib/sessionCheck.php");
require_once("../lib/functionsReg.php");
$studid=$_SESSION['studid'];
$runtype=$_SESSION['student']['runtype'];



require_once("../Connections/osisConn.php");
$session=getCurrentSession();
$currSem=getSemester($session);
studDOAIsCurrent($studid, $currSem, $regperiod);

require_once("../lib/fxns_cce.php");

function getPrevious($studid){
    $sql = "SELECT * FROM hrmscode.counselors WHERE studid = '$studid'";
    $result = mysql_query($sql);
    $numRows = mysql_num_rows($result);
    $row = mysql_fetch_assoc($result);
    if($numRows !== 1){
        return false;
    } else{
        return $row;
    }
}

if(isset($_POST['submit_details'])){
    $district = isset($_POST['district']) ? $_POST['district'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $school = isset($_POST['school']) ? $_POST['school'] : '';
    $c_school= strtoupper($school);
    $delivery_mode = isset($_POST['delivery_mode']) ? $_POST['delivery_mode'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $c_location= strtoupper($location);
    $c_type = isset($_POST['c_type']) ? $_POST['c_type'] : '';
    
    $sql = "SELECT * FROM hrmscode.counselors WHERE studid = '$studid' and council_needed = '$c_type' and status = 0";
    $result = mysql_query($sql);
    $numRows = mysql_num_rows($result);
    $row = mysql_fetch_assoc($result);
    if($numRows > 0){
        echo "<font color='#FF0000' size='+2' > Already Submitted !!!!!</font>";
    } else{
    $sql_upd = "INSERT INTO hrmscode.counselors(studid,phone_no,email,council_needed,runtype,delivery_mode) 
                VALUES('$studid','$contact','$c_school','$c_type','$runtype','$delivery_mode')
                ON DUPLICATE KEY UPDATE
                phone_no = '$contact',
                email = '$c_school',
                delivery_mode = '$delivery_mode',
                council_needed = '$c_type'";
    
    if (mysql_query($sql_upd)) {
        echo "<font color='#009933' size='+2' >Sent Successfully !!!!!</font>";
    } else {
        echo "sError creating a course: " . mysql_error();
    }
    }
}

if($studid = '000000000736008'):
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="../lib/jvFunctions.js" type="text/javascript" ></script>
<link href="../lib/globall.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<style type="text/css">
select{
    border: 1px solid #87CEFA ;
    border-radius: 3px; 
    width: 500px; 
    padding: 5px 5px;
    margin: 3px 2px;
      }
input[type=text] {
    border: 1px solid #87CEFA ;
    border-radius: 3px; 
    width: 500px; 
    padding: 5px 5px;
    margin: 3px 2px;
    text-transform: uppercase;
}
input[type="text"]::placeholder{
    text-align: left;
    font-weight: bold;
    
}
</style>
<body >
<form name="pd" id="pd" action="" method="post">
    <h2 style="color:red">This is not yet live </h2>
<table width="764" class="tablet">
	<th colspan="2">PLEASE PROVIDE INFORMATION </th>

    <tr>
        <td width="10%"><b>COUNSELLING TYPE</b></td>
        <td>
            <select name="c_type" required>
                <option selected disabled value="">[ ---  Select the Counselling Type --- ]</option>
                <option  <?php if($class == "ACADEMIC/EDUCATIONAL"){ echo "selected"; } ?> value="ACADEMIC/EDUCATIONAL">ACADEMIC/EDUCATIONAL</option>
                <option  <?php if($class == "SOCIAL/PERSONAL"){ echo "selected"; } ?> value="SOCIAL/PERSONAL">SOCIAL/PERSONAL</option>
                <option  <?php if($class == "CARRIER"){ echo "selected"; } ?> value="CARRIER">CARRIER</option>
                <option  <?php if($class == "OTHERS"){ echo "selected"; } ?> value="OTHERS">OTHERS</option>
            </select>
        </td>
    </tr>

    <tr>
        <td width="10%"><b>CONTACT</b></td>
        <td>
            <input type="tel" required name='contact' value="" placeholder="Eg: 0244444444" />
        </td>
    </tr>

    <tr>
        <td width="10%"><b>EMAIL ADDRESS</b></td>
        <td>
            <input type='email' value="" required name="school" id="txtName"  placeholder="Eg: name@ucc.edu.gh">
        </td>
    </tr>

    <tr>
        <td width="10%"><b>MODE OF DELIVERY</b></td>
        <td>
            <select name="delivery_mode" required>
                <option value="" selected disabled>[ ---  Select the Mode of Delivery --- ]</option>
                <option  <?php if($class == "PHONE CALL"){ echo "selected"; } ?> value="PHONE CALL">PHONE CALL</option>
                <option  <?php if($class == "VIDEO CALL"){ echo "selected"; } ?> value="VIDEO CALL">VIDEO CALL</option>
                <option  <?php if($class == "CHATTING"){ echo "selected"; } ?> value="CHATTING">CHATTING</option>
                <option  <?php if($class == "FACE TO FACE"){ echo "selected"; } ?> value="FACE TO FACE">FACE TO FACE</option>
                <option  <?php if($class == "EMAIL"){ echo "selected"; } ?> value="EMAIL">EMAIL</option>
            </select>
        </td>
    </tr>


   
    
    <tr>
    <td align="right"><label></label></td>
    <td> <input type="submit" name="submit_details" value="SUBMIT DETAILS" class="sg-submitbtn"></td>
    </tr>
</table>
</form>

<br><br>

<?php
       

        $sql = "SELECT * FROM hrmscode.counselors WHERE studid = '$studid'";
        $result = mysql_query($sql);
        // $numRows = mysql_num_rows($result);
        $row = mysql_fetch_assoc($result);
                      while($row = mysql_fetch_array($result))
                      {
                          $data[] = $row;
                      }
                      if(empty($data))
                        {
                        
                        }
                        else
                        { ?>
                        <BR><BR>
                        <hr>
                           <table class="tablet" width="80%" >
                                <tr bgcolor="#175170">
                                    <th ><strong> # </strong></th>
                                    <th ><strong>Council Type</strong> </th>
                                    <th ><strong>Contact</strong></th>
                                    <th ><strong>Delivery Mode</strong></th>
                                    <th ><strong>Email</strong></th>
                                    <th ><strong>Status</strong> </th>
                                    <th ><strong>Feedback</strong> </th>
                                </tr>
                                <?php $n=1;?>
                                <?php if(count($data) > 0): ?>
                                <?php foreach($data as $datum): ?>
                                <tr height="40"  onMouseOver="bgColor='#CCCCFF'" onMouseOut="bgColor='#F3F3F3'" >
                                    <td><i><?php echo $n++?></i></td>
                                    
                                    <td><font color="#003399"><?php echo $datum['council_needed']; ?></font></td>
                                    <td align="center"><font color="#003366" size="+1"><?php echo $datum['phone_no']; ?><font></td>
                                    <td><font color="#003399"><?php echo $datum['delivery_mode']; ?></font></td>
                                    
                                    <td><font color="#003399"><?php echo $datum['email']; ?></font></td>
                                    <td>
                                        <font color="<?php echo (($datum['status'] == 0)?'#FF0000':(($datum['status'] == 1)?'#008080':(($datum['status'] == 2)?'#800080':(($datum['status'] == 3)?'#FFA500':(($datum['status'] == 4)?'#008000':'')))))?>">
                                        <?php echo (($datum['status'] == 0)?'Pending':(($datum['status'] == 1)?'Assigned':(($datum['status'] == 2)?'Refered':(($datum['status'] == 3)?'Counseling Ongoing':(($datum['status'] == 4)?'Completed':'')))))?></span></td>
                                        </font>
                                    </td>
                                    <td>
                                    <?php if($datum['status'] >  2): ?>
                                        <form action="" method="POST" id="f_feedback">
                                        <select name="feedback" required>
                                            <option value="" selected disabled>[ ---  Give Us Feedback --- ]</option>
                                            <option  <?php if($datum['feedback'] == "VERY SATISFIED"){ echo "selected"; } ?> value="VERY SATISFIED_<?php echo $datum['id'];?>">VERY SATISFIED</option>
                                            <option  <?php if($datum['feedback'] == "SATISFIED"){ echo "selected"; } ?> value="SATISFIED_<?php echo $datum['id'];?>">SATISFIED</option>
                                            <option  <?php if($datum['feedback'] == "SIGHTLY SATISFIED"){ echo "selected"; } ?> value="SIGHTLY SATISFIED_<?php echo $datum['id'];?>">SIGHTLY SATISFIED</option>
                                            <option  <?php if($datum['feedback'] == "NOT SATISFIED"){ echo "selected"; } ?> value="NOT SATISFIED_<?php echo $datum['id'];?>">NOT SATISFIED</option>
                                            <option  <?php if($datum['feedback'] == "NOT ATTENDED TO"){ echo "selected"; } ?> value="NOT ATTENDED TO_<?php echo $datum['id'];?>">NOT ATTENDED TO</option>
                                        </select>
                                        </form>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </table>  
                    <?php } 
                
        
       ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$(document).ready(function(e) {
  $("[name='feedback']").on('change', function() {
        // alert('Feedback Given Successfully');
    var url = "updatecoun.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $("#f_feedback").serialize(),
      success: function(data) {
        // $(".tnxforate").html(data)
        alert('Feedback Given Successfully');
      }
    });
  });
});
</script>
</html>
<?php
 endif;
 ?>