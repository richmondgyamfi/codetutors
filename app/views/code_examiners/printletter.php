<?php
include APPROOT . '/views/includes/shrheader.php';
// include APPROOT.'/views/includes/nav.php';
// include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
if (!empty($data['applicantdata'])) {
    foreach ($data['applicantdata'] as $applicantdata) {
    }
}
?>
<section class="container mt-5">
    <?php if (isset($_SESSION['phone_no'])) : ?>
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
        <?php if (!isset($_SESSION['phone_no'])) : ?>
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
                                                    <label class="text-uppercase font-weight-bold" for="phone_no">Staff
                                                        Number</label>
                                                    <input type="tel" class="form-control" maxlength="10" id="phone_no" name="phone_no" placeholder="Staff Number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-3">
                                    <div class="form-group">
                                        <div class="text-center"><input type="submit" id="save1" name="save1" class="btn btn-block text-whitefont-weight-bold" style="background-color:#1c2473;" value="View Letter"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <form action="" id="application_fm" method="post">
                <div class="card">
                    <div class="body">
                        <?php if ($_SESSION['examiner_type'] == 'TEAM LEADER') : ?>
                            <section class="container">
                                <div class="row clearfix">
                                    <div class="col-3 text-center">
                                        <img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="80">
                                    </div>
                                    <div class="col-6 text-center">
                                        <h3>UNIVERSITY OF CAPE COAST</h3>
                                        <h5>COLLEGE OF DISTANCE EDUCATION</h5>
                                        <h5>EXAMINATION UNIT</h5>
                                    </div>
                                    <div class="col-3 text-center ">
                                        <img src="<?php echo URLROOT ?>/public/images/codelogo.jpeg" width="90">
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-md-8 col-lg-8 col-xl-8 col-sm-8">
                                        <p>Tel.: 0332-096502 / 03321- 35203 / 36947<br>
                                            Fax: 03321- 33655 <br>
                                            E-mail: code.examsunit@ucc.edu.gh/cce@ucc.edu.gh / cceucc@yahoo.com </p>
                                        <p><b>Our Ref.:</b> CoDE/Exams/M.2/Vol.2/069 </p>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
                                        <p>UNIVERSITY OF POST OFFICE <br>
                                            CAPE COAST</p>
                                        <p>8th July, 2024</p>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                                        <p>TEAM LEADERS
                                            <br>
                                            Mr./Mrs./Ms. <?= $_SESSION['ename'] ?>
                                        </p>
                                        <p><b>INVITATION TO CO-ORDINATION MEETING AND NON-RESIDENTIAL CONFERENCE MARKING OF END OF FIRST SEMESTER
                                                EXAMINATION
                                                SCRIPTS (2023/2024)</b></p>
                                        <p>You are kindly invited as a <b>Team Leader</b> to participate in the coordination meeting
                                            and
                                            nonresidential conference marking of End-of-Semester I Examinations scripts
                                            (2023/2024)
                                            scheduled for
                                            <b>18th to 25th July, 2024</b> at the <b><?= $_SESSION['marking_centre']; ?></b> Marking
                                            Centre.
                                            Please, you have
                                            been selected to mark <b><?= $_SESSION['course']; ?></b>.
                                            <br>
                                            <!-- <b>(Note: Your marking centre is <?= $_SESSION['marking_centre']; ?>
                                        <?= (($_SESSION['resident_status'] == 'RESIDENT MARKER') ? 'and accommodation will be confirmed through text messages' : '') ?>).</b><br> -->
                                            <b>Please, note the following schedule:</b>
                                        <ul>
                                            <li>Sunday, 14th July, 2024 - Arrival of Team Leader at CoDE, UCC</li>
                                            <li>Monday, 15th July, 2024 - Coordination of Team Leaders by Chief Examiners at CoDE, UCC </li>
                                            <li>Tuesday, 16th July, 2024 - Departure of Team Leaders to Marking Centres </li>
                                            <li>Thursday, 18th July, 2024 - Opening Ceremony and Coordination of Assistant Examiners by Team Leaders at the marking centres (9:00 am prompt).</li>
                                            <li>18th – 25th July, 2024 - Marking period</li>
                                        </ul>
                                        </p>
                                        <p>
                                            <b>Your allowances for the number of scripts marked, meals, vetting, hospitality and
                                                a
                                                maximum
                                                of three (3) round trips (a round trip is from Home-to-Marking Centre and Centre-back
                                                to-Home)
                                                will be
                                                paid to your Bank Account after the marking period.</b> Kindly provide/confirm
                                            your
                                            bank details
                                            and Ghana card number on the appropriate forms provided at the marking centre.
                                            <br>
                                            You are expected to report at the marking centre <b>at least three times</b> for
                                            vetting
                                            of
                                            Assistant
                                            Examiners' scripts, recording of scores and submission of scripts. Please, ensure
                                            that
                                            attendance sheets
                                            at the marking centre are properly signed each time you report to enable us to
                                            process
                                            your commuting
                                            ('T & T) allowance.
                                            <br>
                                            By a copy of this letter, requesting your <b>Head of Institution</b> to
                                            grant
                                            you permission for this assignment.
                                        <p>We count on your maximum cooperation to supervise all Assistant Examiners assigned to
                                            you
                                            effectively to adhere to the rules/regulations and timelines and also discharge
                                            their
                                            duties with
                                            integrity.</p>

                                        <p>Thank You.</p>
                                        Yours faithfully,<br>
                                        SIGNED <br>
                                        Matthew Quaidoo <br>
                                        <b>(Coordinator)</b> <br>
                                        <b>For: Provost</b><br>
                                        <div class="row">
                                            <div class="col-1">Cc:</div>
                                            <div class="col-11">
                                                Provost, CoDE <br>
                                                College Registrar, CoDE <br>
                                                College Finance Officer, CoDE <br>
                                                Head of Internal Audit, CoDE <br>
                                                <!-- Heads of Department, CoDE <br> -->

                                            </div>
                                        </div>
                                        </p>
                                    </div>

                                </div>
                            </section>

                        <?php elseif ($_SESSION['examiner_type'] == "ASSISTANT EXAMINER") : ?>
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
                                    <p><b>Our Ref.:</b> CoDE/Exams/M.2/Vol.2/068 </p>
                                </div>
                                <div class="col-md-4 col-lg-4 col-xl-4 col-sm-4">
                                    <p>UNIVERSITY OF POST OFFICE <br>
                                        CAPE COAST</p>
                                    <p>8th July, 2024</p>
                                </div>
                                <div class="col-md-12 col-lg-12 col-xl-12 col-sm-12">
                                    <p>ASSISTANT EXAMINERS
                                        <br>
                                        Mr./Mrs./Ms. <?= $_SESSION['ename'] ?>
                                    </p>
                                    <p><b>INVITATION TO CO-ORDINATION MEETING AND NON-RESIDENTIAL CONFERENCE MARKING OF END OF FIRST SEMESTER EXAMINATION
                                            SCRIPTS (2023/2024)</b></p>
                                    <p>
                                        You are kindly invited as an <b>Assistant Examiner</b> to participate in the non-residential
                                        conference marking of End of Semester I Examinations scripts (2023/2024) scheduled for
                                        <b> 18th – 25th July, 2024 </b> at the <b><?= $_SESSION['marking_centre']; ?></b> Marking Centre. Please, you
                                        have been selected to mark <b><?= $_SESSION['course']; ?></b>.
                                    </p>
                                    <b>Please, note the following schedule:</b>
                                    <ul>
                                        <li>Thursday, 18th July, 2024 - Arrival of Team Leaders and Assistant Examiners at the various marking centres (9:00 am promt). </li>
                                        <li>Thursday, 18th July, 2024 - Opening Ceremony and Coordination of Assistant
                                        Examiners at the marking centres. </li>
                                        <li>18th – 25th July, 2024 - Marking Period </li>
                                    </ul>
                                    </p>
                                    <p>
                                        <b>Your allowances for the number of scripts marked, meals, hospitality and a maximum of
                                            three (3) round trips (a round trip is from Home-to-Marking Centre-back to-Homc)
                                            will be paid to your Bank Account after the marking period. </b>Kindly
                                        provide/confirm
                                        your bank details and Ghana card number on the appropriate forms provided at the
                                        marking centre.
                                        <br>
                                        You are expected to report at the marking centre at <b>least thrce times</b> for vetting
                                        and
                                        clearance by your Team Leaders, and submission of scripts. Please, ensure that
                                        attendance sheets at the marking centre are properly signed each time you report to
                                        enable us to process your commuting (T & T) allowance.

                                        <br>
                                        We are, by a copy of this letter, requesting your <b>Head of Institution</b> to grant
                                        you permission for this assignment.

                                    <p>Please, be mindful of the fact that this conference marking session is non-residential.
                                        Therefore, we entreat you to strictly follow the rules and regulations as spelt out at
                                        the marking centre, discharge your duties creditably and meet the set timelines to
                                        ensure the overall integrity of the exercise.</p>
                                    <p>Thank You.</p>
                                    Yours faithfully,<br>
                                    SIGNED <br>
                                    Matthew Quaidoo <br>
                                    <b>(Coordinator)</b> <br>
                                    <b>For: Provost, CoDE</b>

                                    <br><br>
                                    <div class="row">
                                        <div class="col-1">Cc:</div>
                                        <div class="col-11">
                                            Provost, CoDE <br>
                                            College Registrar, CoDE <br>
                                            College Finance Officer, CoDE <br>
                                            Head of Internal Audit, CoDE <br>
                                            <!-- Heads of Department, CoDE <br> -->

                                        </div>
                                    </div>
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
include APPROOT . "/views/includes/footer.php";
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