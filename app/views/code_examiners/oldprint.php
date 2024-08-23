<?php 
include APPROOT.'/views/includes/shrheader.php';
// include APPROOT.'/views/includes/nav.php';
// include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
if(!empty($data['applicantdata'])){
    foreach($data['applicantdata'] as $applicantdata){}
}
?>
<section class="container">
    <?php if(isset($_SESSION['phone_no'])):?>
    <div class="block-header mt-5">
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <button onclick="print()" class="btn btn-secondary d-print-none"><i class="zmdi zmdi-print"></i>
                    Print</button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="container-fluid">
        <?php if(!isset($_SESSION['phone_no'])):?>
        <form action="" id="start_application_fm" class="mt-5" method="post">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-uppercase font-weight-bold"><strong class="txt">Enter</strong> Details to
                                Start <small>Enter the following details to start application</small> </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="row clearfix">
                                        <!--<div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="lname">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                            </div>
                                        </div>-->
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="phone_no">Phone
                                                    Number</label>
                                                <input type="tel" class="form-control" maxlength="10" id="phone_no"
                                                    name="phone_no" placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="md-3">
                                <div class="form-group">
                                    <div class="text-center"><input type="submit" id="save1" name="save1"
                                            class="btn btn-block text-whitefont-weight-bold"
                                            style="background-color:#1c2473;" value="View Letter"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php else: ?>
        <form action="" id="application_fm" method="post">
            <div class="card">
                <div class="body">
                    <?php if($_SESSION['examiner_type'] == 'TEAM LEADER'): ?>
                    <div class="row clearfix">
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 text-center">
                            <img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="80">
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 text-center">
                            <h3>UNIVERSITY OF CAPE COAST</h3>
                            <h5>COLLEGE OF DISTANCE EDUCATION</h5>
                            <h5>EXAMINATION UNIT</h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 text-center ">
                            <img src="<?php echo URLROOT ?>/public/images/codelogo.jpeg" width="90">
                        </div>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
                            <p>Tel.: 0332-096502 / 03321- 35203 / 36947<br>
                                Fax: 03321- 33655 <br>
                                E-mail: code.examsunit@ucc.edu.gh/cce@ucc.edu.gh / cceucc@yahoo.com </p>
                            <p><b>Our Ref.:</b> CoDE/Exams/E.2/Vol.1/187</p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
                            <p>UNIVERSITY OF POST OFFICE <br>
                                CAPE COAST</p>
                            <p>15th October, 2021</p>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                            <p>ALL TEAM LEADERS
                                <br>
                                Mr./Mrs./Ms. <?=$_SESSION['ename']?>
                            </p>
                            <p><b>INVITATION TO CO-ORDINATION AND CONFERENCE MARKING OF END OF SEMESTER II EXAMINATION
                                    SCRIPTS (2020/2021)</b></p>
                            <p>We are happy to inform you that you have been appointed as a Team Leader for
                                <b><?=$_SESSION['course'];?></b> at <b><?=$_SESSION['marking_centre'];?></b>.
                                You are therefore invited to participate in the Co-ordination Meeting and Residential
                                Marking of End-of-Semester II (2020/2021) examination scripts which is scheduled for
                                <b>1st May, to 11th May, 2022</b>.
                                <br>
                                <b>(Note: Your marking centre is <?=$_SESSION['marking_centre'];?>
                                    <?=(($_SESSION['resident_status'] == 'RESIDENT MARKER')?'and accommodation will be confirmed through text messages':'') ?>).</b><br>
                                <b>Please, note the following schedule:</b>
                            <ul>
                                <li>Sunday, 1st May, 2022 - Arrival of Team Leaders outside Cape Coast</li>
                                <li>Monday, 2nd May, 2022 - Coordination of Team Leaders at CoDE, UCC by Chief Examiners
                                </li>
                                <li>Tuesday, 3rd May, 2022 - Departure of Team Leaders and Supervisors to
                                    various marking Centres and
                                    - Arrival of Assistant Examiners at the marking
                                    Centres </li>
                                <li>Wednesday, 4th May, 2022 - Coordination of Assistant Examiners at
                                    Marking Centres</li>
                                <li>4th to 11th May, 2021 - Marking Period</li>
                                <li>Thursday, 12th May, 2021 - Departure of Team Leaders</li>
                            </ul>
                            </p>
                            <p>
                                <b>Please, come well prepared because all your entitlements (meals, hospitality and team
                                    leaders’ allowances claims for marking of scripts) will be paid to your Bank Account
                                    after the marking period to vet Assistant Examiners` scripts and ensure proper
                                    recording of scores. </b>
                                <br>
                                We are, by a copy of this letter, requesting your <b>Head of Institution</b> to grant
                                you permission for this assignment. <b>Team Leaders will be expected to stay throughout
                                    the marking period.</b>
                            <p>We hope to enjoy a good working relationship with you.</p>
                            <p>Thank You.</p>
                            Yours faithfully,<br>
                            SIGNED <br>
                            Matthew Quaidoo <br>
                            <b>(Coordinator)</b> <br>
                            <b>For: Provost, CoDE</b>
                            </p>
                        </div>

                    </div>
                    <?php elseif($_SESSION['examiner_type'] == "ASSISTANT EXAMINER"): ?>
                    <div class="row clearfix">
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 text-center">
                            <img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="80">
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 text-center">
                            <h3>UNIVERSITY OF CAPE COAST</h3>
                            <h5>COLLEGE OF DISTANCE EDUCATION</h5>
                            <h5>EXAMINATION UNIT</h5>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3 col-sm-3 text-center">
                            <img src="<?php echo URLROOT ?>/public/images/codelogo.jpeg" width="90">
                        </div>
                    </div>
                    <hr>
                    <div class="row clearfix">
                        <div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
                            <p>Tel.: 0332-096502 / 03321- 35203 / 36947<br>
                                Fax: 03321- 33655 <br>
                                E-mail: code.examsunit@ucc.edu.gh/cce@ucc.edu.gh / cceucc@yahoo.com </p>
                            <p><b>Our Ref.:</b> CoDE/Exams/E.2/Vol.1/187</p>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
                            <p>UNIVERSITY OF POST OFFICE <br>
                                CAPE COAST</p>
                            <p>15th October, 2021</p>
                        </div>
                        <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                            <p>ALL ASSISTANT EXAMINERS
                                <br>
                                Mr./Mrs./Ms. <?=$_SESSION['ename']?>
                            </p>
                            <p><b>INVITATION TO CO-ORDINATION AND CONFERENCE MARKING OF END OF SEMESTER II EXAMINATION
                                    SCRIPTS (2020/2021)</b></p>
                            <p>
                                You are kindly invited to participate in the Co-ordination Meeting and Residential
                                Marking of End-of-Semester II (2020/2021) examination scripts which is scheduled for
                                <b>4th May, to 11th May, 2022</b> as an Assistant Examiner.
                            <p>Please, you have been selected to mark <b><?=$_SESSION['course'];?></b> at
                                <b><?=$_SESSION['marking_centre'];?></b>
                            </p>
                            <b>(Note: Your marking centre is <?=$_SESSION['marking_centre'];?>
                                <?=(($_SESSION['resident_status'] == 'RESIDENT MARKER')?'and accommodation will be confirmed through text messages':'') ?>).</b><br>
                            <b>Please, note the following schedule:</b>
                            <ul>
                                <li>Tuesday, 3rd May, 2022 - Arrival of Assistant Examiners at the various
                                    marking Centres </li>
                                <li>Wednesday, 4th May, 2022 - Coordination of Assistant Examiners at
                                    Marking Centres </li>
                                <li>4th to 11th May, 2022 - Marking Period </li>
                                <li>Wednesday, 11th May, 2022 - Departure of Assistant Examiners</li>
                                <li>Thursday, 12th May, 2022</li>
                            </ul>
                            </p>
                            <p>
                                <b>Please, come well prepared because all your entitlements (number of scripts marked,
                                    meals and hospitality) will be made to your Bank Account after the marking period.
                                </b>
                                <br>
                                We are, by a copy of this letter, requesting your <b>Head of Institution</b> to grant
                                you permission for this assignment. <b>Assistant Examiners will be expected to report at
                                    the marking centre ever day for vetting by their Team Leaders till the end of the
                                    marking period.</b>
                            <p>We hope to enjoy a good working relationship with you.</p>
                            <p>Thank You.</p>
                            Yours faithfully,<br>
                            Matthew Quaidoo <br>
                            SIGNED <br>
                            <b>(Coordinator)</b> <br>
                            <b>For: Provost, CoDE</b>

                            <br><br>
                            cc: Director of Finance, U. C. C <br>
                            Director of Internal Audit, U. C. C <br>
                            College Registrar, CoDE <br>
                            College Finance Officer, CoDE
                            </p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </form>
        <?php endif; ?>
    </div>


    <!--<div class="modal fade" id="infomodal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #1c2473;">
                    <h5 class="modal-title" id="staticBackdropLabel">NOTICE TO APPLICANTS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This application is open to ONLY tutors at the various Colleges of Education in Ghana.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default text-white" data-dismiss="modal" style="background-color:#1c2473;border-radius:20px;">Understood</button>
                </div>
            </div>
        </div>
    </div>-->
</section>
<?php 
include APPROOT."/views/includes/footer.php";
?>

<script>
// $('#study_cen1').on('change',function(){
//     var rid = $(this).val();
//     // alert(rid);
//     if(rid){
//     $.ajax({
//     method: "POST",
//     url: '<?php echo URLROOT; ?>/ajax/courses',
//     cache: false,
//     data:'rid='+rid,
//         success:function(data){
//             // alert(data);
//             $('.course_sel').html(data);
//         },
//         error: function(){
//           alert("Something went wrong with the child option.")
//           }
//     });
// }           
// });


function showDiv(select) {
    // var stval = document.getElementsByName('degree_status').value;
    if (select.value === 'COMPLETED') {
        var stval = document.getElementById('com').style.display = "block";
        var stval = document.getElementById('ongo').style.display = "none";
        // alert('select');
    } else if (select.value === 'ONGOING') {
        var stval = document.getElementById('ongo').style.display = "block";
        var stval = document.getElementById('com').style.display = "none";
        // alert('select1');
    }
}

function showDiv2(select) {
    // var stval = document.getElementsByName('degree_status').value;
    if (select.value === 'COMPLETED') {
        var stval = document.getElementById('com2').style.display = "block";
        var stval = document.getElementById('ongo2').style.display = "none";
        // alert('select');
    } else if (select.value === 'ONGOING') {
        var stval = document.getElementById('ongo2').style.display = "block";
        var stval = document.getElementById('com2').style.display = "none";
        // alert('select1');
    }
}

function showDiv1() {
    // Get the checkbox
    var checkBox = document.getElementById("save");
    // Get the output text
    //   var text = document.getElementById("text");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        //  alert('checked');
        // text.style.display = "block";
        var stval = document.getElementById('savecon').style.display = "block";
        var stval = document.getElementById('send').style.display = "none";
    } else {
        //  alert('checked1');    
        var stval = document.getElementById('send').style.display = "block";
        var stval = document.getElementById('savecon').style.display = "none";

    }
}

function showDiv5() {
    // Get the checkbox
    var checkBox = document.getElementById("save1");
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        var stval = document.getElementById('savecon1').style.display = "block";
    } else {
        var stval = document.getElementById('savecon1').style.display = "none";

    }
}

function showDiv4(select) {
    if (select.value === 'YES') {
        var stval = document.getElementById('coor').style.display = "block";
        // var stval = document.getElementById('ongo').style.display = "none";
        // alert('select');
    } else if (select.value === 'NO') {
        // var stval = document.getElementById('ongo').style.display = "block";
        var stval = document.getElementById('coor').style.display = "none";
        // alert('select1');
    }
}

function showDiv3(select) {
    // var stval = document.getElementsByName('degree_status').value;
    if (select.value === 'YES') {
        var stval = document.getElementById('sno').style.display = "block";
        var stval = document.getElementById('sno1').style.display = "block";
        // var stval = document.getElementById('ongo').style.display = "none";
        // alert('select');
    } else if (select.value === 'NO') {
        // var stval = document.getElementById('ongo').style.display = "block";
        var stval = document.getElementById('sno').style.display = "none";
        var stval = document.getElementById('sno1').style.display = "none";
        // alert('select1');
    }
}

// $(document).ready(function() {
//     // checkCookie();
//     $('#staticBackdrop').modal('show');
// });

// $(document).ready(function() {
//     // checkCookie();
//     $('#infomodal').modal('show');
// });

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$(document).ready(function() {
    $('#application_fm').on('submit', function(event) {
        event.preventDefault();
        var form_data = new FormData(this);
        //   var file_data = $("#cv").fileinput();
        //   var file_data = $('#cv')[0].files;
        //   var file_data = $('#f_degree_trans')[0].files;
        //   var file_data = $('#f_degree_cert')[0].files;
        //   var file_data = $('#sec_deg_cert')[0].files;
        //   var file_data = $('#sec_degree_trans')[0].files;
        //   var file_data = $('#detail_result')[0].files;
        //   form_data.append('file', file_data);
        if ($('#fname').val() == '') {
            Swal.fire({
                // position: 'top-right',
                title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                html: '<span class="text-danger">Please fill in your details</span>',
                showConfirmButton: false,
                width: 300,
                height: 200,
                imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: 'Custom image',
                timer: 3000
            });
        } else {
            Swal.fire({
                //   position: 'top-right',
                html: '<span class="text-danger font-weight-bold"> Are you sure you want to submit?</span>',
                showConfirmButton: true,
                showCancelButton: true,
                width: 500,
                height: 200,
                imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: 'Custom image',
                confirmButtonText: 'Yes!'
                //   timer: 3000
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "<?php echo URLROOT; ?>/users/tutor_apply.php",
                        method: "POST",
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        //   data:$('#application_fm').serialize(),
                        success: function(data) {
                            console.log(data);
                            var response = JSON.parse(data);
                            console.log(response.status);
                            if (response.status == 'success') {
                                Swal.fire({
                                    title: 'Success!!!',
                                    html: '<span class="text-danger">' +
                                        response.message + '</span>',
                                    showConfirmButton: false,
                                    width: 300,
                                    height: 200,
                                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                    imageWidth: 100,
                                    imageHeight: 100,
                                    imageAlt: 'Custom image',
                                    timer: 3000
                                }).then(function() {
                                    // location.replace("https://comedigitalize.com");
                                    location.reload();
                                });
                                $('#application_fm')[0].reset();
                                //   $('#sub_form').html(data);
                            } else if (response.status == 'error') {
                                Swal.fire({
                                    //   position: 'top-right',
                                    title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                                    html: '<span class="text-danger">' +
                                        response.message + '</span>',
                                    showConfirmButton: false,
                                    width: 300,
                                    height: 200,
                                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                    imageWidth: 100,
                                    imageHeight: 100,
                                    imageAlt: 'Custom image',
                                    timer: 3000
                                });
                            }

                        }
                    });
                }
            });
        }

    });
});


$(document).ready(function() {
    $('#start_application_fm').on('submit', function(event) {
        event.preventDefault();
        var form_data = new FormData(this);
        $.ajax({
            url: "<?php echo URLROOT; ?>/code_examiners/print.php",
            method: "POST",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            //   data:$('#application_fm').serialize(),
            success: function(data) {
                console.log(data);
                var response = JSON.parse(data);
                console.log(response.status);
                if (response.status == 'success') {
                    Swal.fire({
                        title: 'Success!!!',
                        html: '<span class="text-danger">' + response.message +
                            '</span>',
                        showConfirmButton: false,
                        width: 300,
                        height: 200,
                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                        imageWidth: 100,
                        imageHeight: 100,
                        imageAlt: 'Custom image',
                        timer: 3000
                    }).then(function() {
                        // location.replace("https://comedigitalize.com");
                        location.reload();
                    });
                } else if (response.status == 'error') {
                    Swal.fire({
                        //   position: 'top-right',
                        title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                        html: '<span class="text-danger">' + response.message +
                            '</span>',
                        showConfirmButton: false,
                        width: 300,
                        height: 200,
                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                        imageWidth: 100,
                        imageHeight: 100,
                        imageAlt: 'Custom image',
                        timer: 3000
                    });
                }

            }
        });


    });
});
</script>