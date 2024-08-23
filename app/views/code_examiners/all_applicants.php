<?php
include APPROOT . '/views/includes/head.php';
include APPROOT . '/views/includes/nav.php';
include APPROOT . '/views/includes/sidenav.php';

$cdata = $data['total_cos'];
?>

<section class="content d-print-none">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <?php //var_dump($data['total_app']);
                ?>
                <h2>All Applicants
                    <small class="text-muted">Welcome! <?= $_SESSION['fullname'] ?></small>
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid print-container">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong class="txt"> All Applicants</strong> List </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Date Applied</th>
                                        <th>Applicants Fullname</th>
                                        <th>Phone Number</th>
                                        <th>Current Location</th>
                                        <th>Course</th>
                                        <th>Centre</th>
                                        <th>Staff No.</th>
                                        <th>Level</th>
                                        <th>Marked Before</th>
                                        <th>Bank Name & Branch</th>
                                        <th>Bank Account Name & Number</th>
                                        <th>Examiner Type</th>
                                        <th>Resident Status</th>
                                        <th>Marking Centre</th>
                                        <th>Status</th>
                                        <?php if ($_SESSION['role'] == 1) : ?>
                                            <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>



                                <tbody>
                                    <?php foreach ($data['total_app'] as $data) { ?>
                                        <tr>
                                            <td><?php echo $data->dateapplied ?></td>
                                            <td><?php echo strtoupper($data->fname . ' ' . $data->mname . ' ' . $data->lname); ?>
                                            </td>
                                            <td><?php echo $data->phone_no ?></td>
                                            <td><?php echo strtoupper($data->curr_loc); ?></td>
                                            <td><?php echo strtoupper($data->course); ?></td>
                                            <td><?php echo strtoupper($data->centre); ?></td>
                                            <td>
                                                <?php echo $data->staffno ?>
                                            </td>
                                            <td><?php echo $data->level ?></td>
                                            <td><?php echo $data->marked ?></td>
                                            <td><?php echo $data->bankname . ' ' . $data->branch ?></td>
                                            <td><?php echo $data->acc_name . ' ' . $data->acc_no ?></td>
                                            <td><?php echo $data->examiner_type; ?></td>
                                            <td><?php echo $data->resident_status; ?></td>
                                            <td><?php echo $data->marking_centre; ?></td>
                                            <td><span class="badge <?= ((($data->status == 2) || ($data->status == 4)) ? 'badge-danger' : 'badge-success') ?> ">
                                                    <?= (($data->status == 1) ? 'Applied' : (($data->status == 2) ? 'Selected' : (($data->status == 3) ? 'Rejected' : (($data->status == 4) ? 'Appointed' : (($data->status == 5) ? 'Not Appointed' : (($data->status == 0) ? 'Yet To Apply' : '')))))) ?></span>
                                            </td>
                                            <?php if ($_SESSION['role'] == 1) : ?>
                                                <td>
                                                    <!--<button class="btn btn-primary btn-sm btn-round" onclick="assessor(<?php echo $data->id; ?>)">
                                        <i class="zmdi zmdi-file"></i>
                                        </button>-->
                                                    <?php //if($data->status == 0) { 
                                                    ?>
                                                    <!-- <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-original-title="Select/Reject" data-target="#approve" title="Select/Reject" data-id="<?php echo $data->id; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a> -->

                                                    <?php //}elseif($data->status == 1) { 
                                                    ?>
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-original-title="Assign Role" data-target="#assignrole" title="Assign Role" data-id="<?php echo $data->id; ?>" data-course="<?php echo $data->course; ?>" data-examiner_type="<?php echo $data->examiner_type; ?>" data-resident_status="<?php echo $data->resident_status; ?>" data-marking_centre="<?php echo $data->marking_centre; ?>">
                                                        <i class="zmdi zmdi-plus"></i>
                                                    </a>
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-original-title="Select/Reject" data-target="#approve2" title="Select/Reject" data-id="<?php echo $data->id; ?>">
                                                        <i class="zmdi zmdi-cloud-upload"></i>
                                                    </a>
                                                    <!--<a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" 
                                        data-toggle="modal" data-original-title="Appointed/Not Appointed" data-target="#appoint" title="Appointed/Not Appointed" data-id="<?php echo $data->id; ?>">
                                            <i class="zmdi zmdi-plus"></i>
                                        </a>-->
                                                    <?php //} 
                                                    ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include APPROOT . "/views/includes/footer.php";
?>

<div class="modal fade right" id="approve" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 10px 10px;">
            <div class="modal-header" style="background-color: #1c2473;">
                <h5 class="modal-title text-white p-2">Select/Reject Applicant</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <form method="POST" class="uploadfileapproval">
                    <!-- <input type="hidden" name="promoid" id="promoid" value="<?php echo $_POST['promo_id']; ?>"> -->
                    <!-- <input type="hidden" name="stage_office" id="stage_office" value="<?php echo $office_id; ?>"> -->
                    <input type="hidden" name="promo_id" id="promo_id">
                    <!-- <input type="hidden" name="promo_stage" id="promo_stage"> -->
                    <!-- <div class="clearfix">
                        <div class="funkyradio row">
                            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                                <input type="radio" name="radio" class="radio" id="radio1" value="2" />
                                <label for="radio1">Select Applicant</label>
                            </div>
                            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                                <input type="radio" name="radio" class="radio" id="radio2" value="3" />
                                <label for="radio2">Reject Applicant</label>
                            </div>
                        </div>
                    </div> -->
                    <div class="row mb-4 mt-5">
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="submit" name="approve" id="approve">
                                Submit</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="button" data-dismiss="modal" aria-label="Close">
                                Cancel</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade right" id="approve2" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 10px 10px;">
            <div class="modal-header" style="background-color: #1c2473;">
                <h5 class="modal-title text-white p-2">Select/Reject Applicant</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <form method="POST" class="uploadfileapproval2">
                    <!-- <input type="hidden" name="promoid" id="promoid" value="<?php echo $_POST['promo_id']; ?>"> -->
                    <!-- <input type="hidden" name="stage_office" id="stage_office" value="<?php echo $office_id; ?>"> -->
                    <input type="hidden" name="promo_id" id="promo_id">
                    <!-- <input type="hidden" name="promo_stage" id="promo_stage"> -->
                    <div class="clearfix">
                        <div class="funkyradio row">
                            <div class="funkyradio-primary col-md-12 col-lg-12 col-sm-12">
                                <input type="radio" name="radio" class="radio" id="radio5" value="0" />
                                <label for="radio5">Deselect Applicant</label>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-4 mt-5">
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="submit" name="approve" id="approve">
                                Submit</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="button" data-dismiss="modal" aria-label="Close">
                                Cancel</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade right" id="appoint" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="border-radius: 10px 10px;">
            <div class="modal-header" style="background-color: #1c2473;">
                <h5 class="modal-title text-white p-2">Select/Reject Applicant</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <form method="POST" class="appt_dis" id="appt_dis">
                    <input type="hidden" name="promo_id1" id="promo_id1">
                    <div class="clearfix">
                        <div class="funkyradio row">
                            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                                <input type="radio" name="radio1" class="radio" id="radio3" value="4" />
                                <label for="radio3">Appointed</label>
                            </div>
                            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                                <input type="radio" name="radio1" class="radio" id="radio4" value="5" />
                                <label for="radio4">Not Appointed</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4 mt-5">
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="submit">
                                Submit</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="button" data-dismiss="modal" aria-label="Close">
                                Cancel</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<div class="modal fade right" id="assignrole" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="height:100%;" role="document">
        <div class="modal-content" style="border-radius: 10px 10px;">
            <div class="modal-header" style="background-color: #1c2473;">
                <h5 class="modal-title text-white p-2">Select/Reject Applicant</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <form method="POST" class="assrole" id="assrole">
                    <input type="hidden" name="promo_id1" id="promo_id1">
                    <input type="hidden" name="promo_course" id="promo_course">
                    <input type="hidden" name="promo_examiner_type" id="promo_examiner_type">
                    <input type="hidden" name="promo_resident_status" id="promo_resident_status">
                    <input type="hidden" name="promo_marking_centre" id="promo_marking_centre">
                    <div class="clearfix">
                        <div class="funkyradio row">
                            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                                <input type="radio" name="radio" class="radio" id="radio1" value="2" />
                                <label for="radio1">Select Applicant</label>
                            </div>
                            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                                <input type="radio" name="radio" class="radio" id="radio2" value="3" />
                                <label for="radio2">Reject Applicant</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 mb-4">
                        <label for="examinertype" class="font-weight-bold text-uppercase">Type Of Examiner*</label>
                        <select class="form-control show-tick" id="examinertype" name="examinertype">
                            <option value="">- Type Of Examiner -</option>
                            <option value="TEAM LEADER">TEAM LEADER</option>
                            <option value="ASSISTANT EXAMINER">ASSISTANT EXAMINER</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 mb-4">
                        <label for="res_status" class="font-weight-bold text-uppercase">Resident Status*</label>
                        <select class="form-control show-tick" id="res_status" name="res_status">
                            <option value="">- Resident Status -</option>
                            <option value="RESIDENT MARKER">RESIDENT MARKER</option>
                            <option value="NON-RESIDENT MARKER">NON-RESIDENT MARKER</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 mb-4">
                        <label for="markcenter" class="font-weight-bold text-uppercase">Marking Centre*</label>
                        <select class="form-control show-tick" id="markcenter" name="markcenter">
                            <option value="">- Marking Centre -</option>
                            <option value="SUNYANI">SUNYANI</option>
                            <option value="CAPE COAST">CAPE COAST</option>
                            <option value="KUMASI">KUMASI</option>
                            <option value="ACCRA">ACCRA</option>
                            <option value="TAMALE">TAMALE</option>
                            <option value="HO">HO</option>
                            <option value="WA">WA</option>
                            <option value="KOFORIDUA">KOFORIDUA</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 mb-4">
                        <label class="text-uppercase font-weight-bold" for="course">Course To Mark</label>
                        <select class="form-control show-tick" id="course" name="course">
                            <option value="">- Course -</option>
                            <?php foreach ($cdata as $totalcos) { ?>
                                <option value="<?= $totalcos->title ?>"><?= $totalcos->title ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row mb-4 mt-5">
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="submit">
                                Submit</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
                            <button class="btn btn-primary btn-round btn-block mx-auto" type="button" data-dismiss="modal" aria-label="Close">
                                Cancel</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</div>

<script>
    $("#approve").on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var promo_id = button.data('id');
        // var promo_stage = button.data('entry');

        var modal = $(this);
        modal.find('.modal-body #promo_id').val(promo_id);
        // modal.find('.modal-body #promo_stage').val(promo_stage);
    });

    $("#approve2").on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var promo_id = button.data('id');
        // var promo_stage = button.data('entry');

        var modal = $(this);
        modal.find('.modal-body #promo_id').val(promo_id);
        // modal.find('.modal-body #promo_stage').val(promo_stage);
    });

    $("#appoint").on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var promo_id1 = button.data('id');
        // var promo_stage = button.data('entry');

        var modal = $(this);
        modal.find('.modal-body #promo_id1').val(promo_id1);
        // modal.find('.modal-body #promo_stage').val(promo_stage);
    });

    $("#assignrole").on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var promo_id1 = button.data('id');
        var promo_course = button.data('course');
        var promo_examiner_type = button.data('examiner_type')
        var promo_resident_status = button.data('resident_status')
        var promo_marking_centre = button.data('marking_centre')
        var modal = $(this);
        modal.find('.modal-body #promo_id1').val(promo_id1);
        modal.find('.modal-body #promo_course').val(promo_course);
        modal.find('.modal-body #promo_examiner_type').val(promo_examiner_type);
        modal.find('.modal-body #promo_resident_status').val(promo_resident_status);
        modal.find('.modal-body #promo_marking_centre').val(promo_marking_centre);
    });


    $(document).ready(function() {
        $('.uploadfileapproval').on('submit', function(event) {
            event.preventDefault();
            if (document.getElementById("radio1").checked == false && document.getElementById("radio2")
                .checked == false) {
                Swal.fire({
                    title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                    html: '<span class="text-danger">Select a your reply (Select/Reject Applicant)</span>',
                    showConfirmButton: false,
                    width: 400,
                    height: 200,
                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Custom image',
                    timer: 3000
                });
            } else {
                Swal.fire({
                    html: '<span class="text-danger font-weight-bold"> Are you want to perform this action?</span>',
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
                            url: "<?php echo URLROOT; ?>/code_examiners/tut_action.php",
                            method: "POST",
                            data: $('.uploadfileapproval').serialize(),
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
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Loading image',
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                } else if (response.status == 'error') {
                                    Swal.fire({
                                        title: 'Oooops!!!',
                                        html: '<span class="text-danger">' +
                                            response.message + '</span>',
                                        showConfirmButton: false,
                                        width: 300,
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Loading image',
                                        timer: 3000
                                    })
                                }

                            }
                        });
                    }
                });
            }

        });
    });

    $(document).ready(function() {
        $('.uploadfileapproval2').on('submit', function(event) {
            event.preventDefault();
            if (document.getElementById("radio5").checked == false) {
                Swal.fire({
                    title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                    html: '<span class="text-danger">Select a your reply (De-Select Applicant)</span>',
                    showConfirmButton: false,
                    width: 400,
                    height: 200,
                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Custom image',
                    timer: 3000
                });
            } else {
                Swal.fire({
                    html: '<span class="text-danger font-weight-bold"> Are you want to perform this action?</span>',
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
                            url: "<?php echo URLROOT; ?>/code_examiners/tut_action.php",
                            method: "POST",
                            data: $('.uploadfileapproval2').serialize(),
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
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Loading image',
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                } else if (response.status == 'error') {
                                    Swal.fire({
                                        title: 'Oooops!!!',
                                        html: '<span class="text-danger">' +
                                            response.message + '</span>',
                                        showConfirmButton: false,
                                        width: 300,
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Loading image',
                                        timer: 3000
                                    })
                                }

                            }
                        });
                    }
                });
            }

        });
    });


    $(document).ready(function() {
        $('#appt_dis').on('submit', function(event) {
            event.preventDefault();
            if (document.getElementById("radio3").checked == false && document.getElementById("radio4")
                .checked == false) {
                Swal.fire({
                    title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                    html: '<span class="text-danger">Select a your reply (Select/Reject Applicant)</span>',
                    showConfirmButton: false,
                    width: 400,
                    height: 200,
                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Custom image',
                    timer: 3000
                });
            } else {
                Swal.fire({
                    html: '<span class="text-danger font-weight-bold"> Are you want to perform this action?</span>',
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
                            url: "<?php echo URLROOT; ?>/users/tut_action1.php",
                            method: "POST",
                            data: $('#appt_dis').serialize(),
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
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Loading image',
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                } else if (response.status == 'error') {
                                    Swal.fire({
                                        title: 'Oooops!!!',
                                        html: '<span class="text-danger">' +
                                            response.message + '</span>',
                                        showConfirmButton: false,
                                        width: 300,
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Loading image',
                                        timer: 3000
                                    })
                                }

                            }
                        });
                    }
                });
            }

        });
    });

    $(document).ready(function() {
        $('#assrole').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo URLROOT; ?>/users/actiontut.php",
                method: "POST",
                data: $('#assrole').serialize(),
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
                            imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                            imageWidth: 100,
                            imageHeight: 100,
                            imageAlt: 'Loading image',
                            timer: 3000
                        }).then(function() {
                            location.reload();
                        });
                    } else if (response.status == 'error') {
                        Swal.fire({
                            title: 'Oooops!!!',
                            html: '<span class="text-danger">' + response.message +
                                '</span>',
                            showConfirmButton: false,
                            width: 300,
                            imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                            imageWidth: 100,
                            imageHeight: 100,
                            imageAlt: 'Loading image',
                            timer: 3000
                        })
                    }

                }
            });

        });
    });

    function assessor(id) {
        var data = id;
        console.log(data);
        jQuery.ajax({
            url: "<?php echo URLROOT; ?>/modal/es_modal.php",
            method: "post",
            data: "app_id=" + data,
            success: function(data) {
                jQuery('body').append(data);
                jQuery('#deptdata').modal('toggle');

            },
            error: function() {
                alert("Something went wrong");
            }
        });
    }
</script>