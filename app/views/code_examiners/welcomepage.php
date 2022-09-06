<?php 
include APPROOT.'/views/includes/shrheader2.php';
// include APPROOT.'/views/includes/nav.php';
// include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
// var_dump($data['total_cos']);
?>
<section class="container">
    <div class="block-header mt-5">
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2>CODE EXAMINERS APPLICATION FORM <?php //var_dump($data['total_app']);?>
                    <small class="text-muted">Apply as an examiner for the CoDE UCC </small>
                </h2>
                <h5 class="text-danger"><strong>This application is open to ONLY tutors at the various study
                        centres.</strong></h5>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form action="" id="welcome_fm" method="post">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-uppercase font-weight-bold"><strong class="txt">Welcome</strong> Page
                                <small>Enter your staff number to comtinue</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold" for="staff_no">Staff
                                            Number</label>
                                        <input type="text" class="form-control" id="staff_no" required name="staff_no"
                                            placeholder="Staff Number">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold" for="mname">Middle Name</label>
                                        <input type="text" class="form-control" id="mname" name="mname"
                                            placeholder="Middle Name">
                                    </div>
                                </div> -->
                                <div class="col-sm-12 mt-5 mb-5">
                                    <button type="submit" class="btn btn-block btn-round"
                                        style="background-color:#1c2473;"><b>Submit</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php 
include APPROOT."/views/includes/footer.php";
?>

<script>
$(document).ready(function() {
    $('#welcome_fm').on('submit', function(event) {
        event.preventDefault();
        var form_data = new FormData(this);
        if ($('#staff_no').val() == '') {
            Swal.fire({
                // position: 'top-right',
                title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                html: '<span class="text-danger">Please enter your staff number</span>',
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
                html: '<span class="text-danger font-weight-bold"> Are you sure you want to apply?</span>',
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
                        url: "welcome.php",
                        method: "POST",
                        dataType: 'text',
                        //   cache:false,
                        //   contentType:false,
                        //   processData: false,
                        //   data:form_data,
                        data: $('#welcome_fm').serialize(),
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
                                $('#welcome_fm')[0].reset();
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
</script>