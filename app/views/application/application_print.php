<link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/bootstrap/css/bootstrap.min.css">

<?php
// include APPROOT.'/views/includes/shrheader.php';
// include APPROOT.'/views/includes/nav.php';
// include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
if (!empty($data['applicantdata'])) {
    foreach ($data['applicantdata'] as $applicantdata) {
    }
}
?>
<ul class="navbar-nav ml-5 d-print-none">
<?php if(!isset($_SESSION['centre'])):?>
    <?php if (isset($_SESSION['phone_no'])) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT ?>/users/logout1.php">LOGOUT</a>
        </li>
    <?php endif; ?>
    <?php endif; ?>
</ul>
<section class="container">
    <div class="block-header mt-5">
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width='80' height='80' alt="">
                <h1>UNIVERSITY OF CAPE COAST</h1>
                <h2>COLLEGE OF DISTANCE EDUCATION TUTOR'S APPLICATION FORM
                </h2>
                <hr>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php if (!isset($_SESSION['phone_no'])) : ?>
            <form action="" id="start_application_fm" method="post">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-uppercase font-weight-bold"><strong class="txt">Enter</strong> Details to Start <small>Enter the following details to start application</small> </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-12">
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="fname">First Name</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="fname" name="fname" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="mname">Middle Name</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="mname" name="mname" placeholder="Middle Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="lname">Last Name</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="lname" name="lname" placeholder="Last Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="phone_no">Phone Number</label>
                                                    <input type="tel" readonly class="form-control-plaintext text-uppercase" maxlength="10" id="phone_no" name="phone_no" placeholder="Phone">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-3">
                                    <div class="form-group">
                                        <div class="text-center"><input type="submit" id="save1" name="save1" class="btn btn-block text-whitefont-weight-bold" style="background-color:#1c2473;" value="Save And Continue"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else : ?>
            <form action="" id="application_fm" method="post">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2 class="text-uppercase font-weight-bold"><strong class="txt">Personal</strong> Details </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-8">
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="fname">First Name</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="fname" name="fname" value="<?= (empty($applicantdata->fname) ? '' : $applicantdata->fname) ?>" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="mname">Middle Name</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="mname" name="mname" value="<?= (empty($applicantdata->mname) ? '' : $applicantdata->mname) ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="lname">Last Name</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="lname" name="lname" value="<?= (empty($applicantdata->lname) ? '' : $applicantdata->lname) ?>" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="dob">Date of Birth</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="dob" name="dob" value="<?= (empty($applicantdata->dob) ? '' : $applicantdata->dob) ?>" placeholder="Date of Birth">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="text-uppercase font-weight-bold" for="gender">Gender</label>
                                                <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->gender) ? '' : $applicantdata->gender) ?>">

                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="phone_no">Phone Number</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" maxlength="10" id="phone_no" value="<?= (empty($applicantdata->phone_no) ? '' : $applicantdata->phone_no) ?>" name="phone_no" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="email">Email</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="email" name="email" value="<?= (empty($applicantdata->email) ? '' : $applicantdata->email) ?>" placeholder="Enter Your Email">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="curr_loc">CURRENT LOCATION</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="curr_loc" name="curr_loc" value="<?= (empty($applicantdata->curr_loc) ? '' : $applicantdata->curr_loc) ?>" placeholder="Enter Your Current Location">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="digital_address">DIGITAL/HOUSE ADDRESS</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="digital_address" name="digital_address" value="<?= (empty($applicantdata->digital_address) ? '' : $applicantdata->digital_address) ?>" placeholder="Enter Your Digital/House Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="postal_address">POSTAL ADDRESS</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="postal_address" name="postal_address" value="<?= (empty($applicantdata->postal_address) ? '' : $applicantdata->postal_address) ?>" placeholder="Enter Your Postal Address">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="text-uppercase font-weight-bold" for="cardno">Ghana Card Number</label>
                                                    <input type="text" readonly class="form-control-plaintext text-uppercase" id="cardno" name="cardno" value="<?= (empty($applicantdata->cardno) ? '' : $applicantdata->cardno) ?>" placeholder="Enter Your ID Card Number">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row clearfix">
                                            <div class="col-12">
                                                <div class="form-group text-center">
                                                    <img class="avatar-img " <?= (!empty($applicantdata->staffpic) ? 'style="width:200px; height:auto; margin-top:40px"' : 'style="width:150px; height:auto;"') ?> src="<?= (!empty($applicantdata->staffpic) ? URLROOT . '/public/images/tutor_files/' . $applicantdata->staffpic : URLROOT . '/public/images/avatar3.png')  ?>" alt="User Image">
                                                    <?php if (empty($applicantdata->staffpic)) { ?>
                                                        <label class="text-uppercase font-weight-bold" for="staffpic">Upload your passport Picture</label>
                                                        <input type="file" class="form-control text-uppercase" id="staffpic" value="<?= (empty($applicantdata->staffpic) ? '' : $applicantdata->staffpic) ?>" name="staffpic">
                                                    <?php } ?>
                                                </div>
                                                <?php if (empty($applicantdata->staffpic)) { ?>
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-inline">
                                                            <label class="text-uppercase font-weight-bold text-danger" for="save1">save image
                                                                <input type="checkbox" class="form-control text-uppercase ml-3" onclick="showDiv5()" id="save1" name="save1" placeholder="Position Held">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12" id="savecon1" style="display: none;">
                                                        <div class="form-group">
                                                            <div class="text-center"><input type="submit" id="save1" name="save1" class="btn btn-block text-whitefont-weight-bold" style="background-color:#1c2473;" value="Save And Continue"></div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header mt-5 text-uppercase">
                                <h2 class="font-weight-bold"><strong class="txt">ACADEMIC </strong> CREDENTIALS </h2>
                            </div>
                            <div class="body">
                                <!-- <div class="row clearfix"> -->
                                <!-- <div class="col-md-12 col-lg-12 col-sm-12"> -->
                                <div class="col-md-12 col-lg-12 col-sm-12 text-uppercase">
                                    <?php if (empty($applicantdata->cv)) : ?>
                                        <label for="input-folder-1 mt-3 font-weight-bold">Upload your Curriculum Vitae (CV)</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="cv" name="cv">
                                            <label class="custom-file-label text-lowercase" for="cv">Upload Your CV (.pdf/.docx/.jpg)</label>
                                        </div>
                                    <?php else : ?>
                                        <h5></h5>
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->cv); ?>">
                                            <h5>Curriculum Vitae (CV) Uploaded <i class="zmdi zmdi-download"></i></h5>
                                        </a>
                                    <?php endif; ?>
                                    <!-- <div class="file-loading">
                                        <input id="input-folder-1" name="input-folder-1[]" type="file">
                                    </div> -->
                                </div>
                                <!-- </div> -->
                                <hr><br>
                                <div class="row clearfix">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="t_degree" class="font-weight-bold">PhD QUALIFICATION</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="t_degree" id="t_degree" value="<?= (empty($applicantdata->t_degree) ? '' : $applicantdata->t_degree) ?>" placeholder="PhD DEGREE QUALIFICATION">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                        <label for="t_degree_status" class="font-weight-bold text-uppercase">Status of your PhD</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->t_degree_status) ? '' : $applicantdata->t_degree_status) ?>">

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <label for="admission_date" class="font-weight-bold">Admission Date</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="admission_date" name="admission_date" value="<?= (empty($applicantdata->admission_date) ? '' : $applicantdata->admission_date) ?>" placeholder="Enter the date of Admission">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="phd_inst_award" class="font-weight-bold">Awarding University (eg. University of Cape Coast)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="phd_inst_award" name="phd_inst_award" value="<?= (empty($applicantdata->phd_inst_award) ? '' : $applicantdata->phd_inst_award) ?>" placeholder="Enter the institution awarded">
                                    </div>
                                    <div class="col-md-12" id="com2">
                                        <div class="row">
                                            
                                            <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <label for="t_deg_cert_yr" class="font-weight-bold">Year of Award (eg. 2023)</label>
                                                <input type="text" readonly class="form-control-plaintext text-uppercase" id="t_deg_cert_yr" name="t_deg_cert_yr" value="<?= (empty($applicantdata->t_deg_cert_yr) ? '' : $applicantdata->t_deg_cert_yr) ?>" placeholder="Enter the year this certificate was awarded">
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <label for="completion_date" class="font-weight-bold">Completed Date</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="completion_date" name="completion_date" value="<?= (empty($applicantdata->completion_date) ? '' : $applicantdata->completion_date) ?>" placeholder="Enter the date of Completion">
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <label for="certificate_no" class="font-weight-bold">Certificate Number</label>
                                                <input type="text" readonly class="form-control-plaintext text-uppercase" id="certificate_no" name="certificate_no" value="<?= (empty($applicantdata->certificate_no) ? '' : $applicantdata->certificate_no) ?>" placeholder="Enter the Certificate Number">
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <?php if (empty($applicantdata->t_deg_cert)) : ?>
                                                    <label for="t_deg_cert" class="font-weight-bold">UPLOAD YOUR PhD CERTIFICATE </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="t_deg_cert" name="t_deg_cert">
                                                        <label class="custom-file-label text-lowercase" for="t_deg_cert">Upload CERTIFICATE(.pdf/.docx/.jpg)</label>
                                                    </div>
                                                <?php else : ?>
                                                    <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_deg_cert); ?>">
                                                        <h5>PhD CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <?php if (empty($applicantdata->t_degree_trans)) : ?>
                                                    <label for="t_degree_trans" class="font-weight-bold">UPLOAD YOUR PhD TRANSCRIPT </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="t_degree_trans" name="t_degree_trans">
                                                        <label class="custom-file-label text-lowercase" for="t_degree_trans">Upload transcript(.pdf/.docx/.jpg)</label>
                                                    </div>
                                                <?php else : ?>
                                                    <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_degree_trans); ?>">
                                                        <h5>PhD TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" id="ongo2" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: block"' : 'style="display: none;"' ?>>
                                        <?php if (empty($applicantdata->tb_detail_result)) : ?>
                                            <label for="tb_detail_result" class="font-weight-bold">UPLOAD YOUR DETAILED RESULTS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="tb_detail_result" name="tb_detail_result">
                                                <label class="custom-file-label text-lowercase" for="tb_detail_result">Upload DETAILED RESULTS (.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_degree_trans); ?>">
                                                <h5>PhD TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <hr><br>
                                <div class="row clearfix">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="s_degree" class="font-weight-bold">SECOND DEGREE</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="s_degree" id="s_degree" value="<?= (empty($applicantdata->s_degree) ? '' : $applicantdata->s_degree) ?>" placeholder="SECOND DEGREE">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                        <label for="degree_status" class="font-weight-bold text-uppercase">Status of your second degree</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->sec_degree_status) ? '' : $applicantdata->s_degree) ?>">

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <label for="admission_date_sec_deg" class="font-weight-bold">Admission Date</label>
                                        <input type="text" required class="form-control-plaintext text-uppercase" id="admission_date_sec_deg" name="admission_date_sec_deg" value="<?= (empty($applicantdata->admission_date_sec_deg) ? '' : $applicantdata->admission_date_sec_deg) ?>" placeholder="Enter the date of Admission">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="masters_inst_award" class="font-weight-bold">Awarding University (eg. University of Cape Coast)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="masters_inst_award" name="masters_inst_award" value="<?= (empty($applicantdata->masters_inst_award) ? '' : $applicantdata->masters_inst_award) ?>" placeholder="Enter the institution awarded">
                                    </div>
                                    <div class="col-md-12" id="com">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <label for="completion_date_sec_deg" class="font-weight-bold">Completed Date</label>
                                                <input type="text" readonly class="form-control-plaintext text-uppercase" id="completion_date_sec_deg" name="completion_date_sec_deg" value="<?= (empty($applicantdata->completion_date_sec_deg) ? '' : $applicantdata->completion_date_sec_deg) ?>" placeholder="Enter the date of Completion">
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <label for="certificate_no_sec_deg" class="font-weight-bold">Certificate Number</label>
                                                <input type="text" readonly class="form-control-plaintext text-uppercase" id="certificate_no_sec_deg" name="certificate_no_sec_deg" value="<?= (empty($applicantdata->certificate_no_sec_deg) ? '' : $applicantdata->certificate_no_sec_deg) ?>" placeholder="Enter the Certificate Number">
                                            </div>
                                            
                                            <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <label for="sec_deg_cert_yr" class="font-weight-bold">Year of Award (eg. 2023)</label>
                                                <input type="text" readonly class="form-control-plaintext text-uppercase" id="sec_deg_cert_yr" name="sec_deg_cert_yr" value="<?= (empty($applicantdata->sec_deg_cert_yr) ? '' : $applicantdata->sec_deg_cert_yr) ?>" placeholder="Enter the year this certificate was awarded">
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?= (!empty($applicantdata->sec_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <?php if (empty($applicantdata->sec_deg_cert)) : ?>
                                                    <label for="sec_deg_cert" class="font-weight-bold">UPLOAD YOUR SECOND DEGREE CERTIFICATE </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="sec_deg_cert" name="sec_deg_cert">
                                                        <label class="custom-file-label text-lowercase" for="sec_deg_cert">Upload CERTIFICATE(.pdf/.docx/.jpg)</label>
                                                    </div>
                                                <?php else : ?>
                                                    <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->sec_deg_cert); ?>">
                                                        <h5>SECOND DEGREE CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                                    </a>
                                                <?php endif; ?>

                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?= (!empty($applicantdata->sec_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                                <?php if (empty($applicantdata->sec_degree_trans)) : ?>
                                                    <label for="sec_degree_trans" class="font-weight-bold">UPLOAD YOUR SECOND DEGREE TRANSCRIPT </label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="sec_degree_trans" name="sec_degree_trans">
                                                        <label class="custom-file-label text-lowercase" for="sec_degree_trans">Upload transcript(.pdf/.docx/.jpg)</label>
                                                    </div>
                                                <?php else : ?>
                                                    <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->sec_degree_trans); ?>">
                                                        <h5>SECOND DEGREE TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                                    </a>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" id="ongo" <?= (!empty($applicantdata->sec_degree_status == 'ONGOING')) ? 'style="display: block"' : 'style="display: none;"' ?>>
                                        <?php if (empty($applicantdata->detail_result)) : ?>
                                            <label for="detail_result" class="font-weight-bold">UPLOAD YOUR DETAILED RESULTS</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="detail_result" name="detail_result">
                                                <label class="custom-file-label text-lowercase" for="detail_result">Upload DETAILED RESULTS (.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->detail_result); ?>">
                                                <h5>SECOND DETAILED RESULTS Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr><br>

                                <div class="row clearfix">
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="f_degree" class="font-weight-bold">First Degree qualification</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->f_degree) ? '' : $applicantdata->f_degree) ?>" name="f_degree" id="f_degree" placeholder="Enter Degree Type (Eg. BSC Computer Science)">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <label for="admission_date_first_deg" class="font-weight-bold">Admission Date</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="admission_date_first_deg" name="admission_date_first_deg" value="<?= (empty($applicantdata->admission_date_first_deg) ? '' : $applicantdata->admission_date_first_deg) ?>" placeholder="Enter the date of Admission">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="f_deg_inst_award" class="font-weight-bold">Awarding University (eg. University of Cape Coast)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="f_deg_inst_award" name="f_deg_inst_award" value="<?= (empty($applicantdata->f_deg_inst_award) ? '' : $applicantdata->f_deg_inst_award) ?>" placeholder="Enter the institution awarded">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="first_deg_cert_yr" class="font-weight-bold">Year of Award (eg. 2023)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="first_deg_cert_yr" name="first_deg_cert_yr" value="<?= (empty($applicantdata->first_deg_cert_yr) ? '' : $applicantdata->first_deg_cert_yr) ?>" placeholder="Enter the year this certificate was awarded">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="completion_date_first_deg" class="font-weight-bold">Completed Date</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="completion_date_first_deg" name="completion_date_first_deg" value="<?= (empty($applicantdata->completion_date_first_deg) ? '' : $applicantdata->completion_date_first_deg) ?>" placeholder="Enter the date of Completion">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="certificate_no_first_deg" class="font-weight-bold">Certificate Number</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="certificate_no_first_deg" name="certificate_no_first_deg" value="<?= (empty($applicantdata->certificate_no_first_deg) ? '' : $applicantdata->certificate_no_first_deg) ?>" placeholder="Enter the Certificate Number">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <?php if (empty($applicantdata->f_degree_cert)) : ?>
                                            <label for="f_degree_cert" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE CERTIFICATE </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="f_degree_cert" name="f_degree_cert">
                                                <label class="custom-file-label text-lowercase" for="f_degree_cert">Upload CERTIFICATE(.pdf/.docx/.jpg) </label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_cert); ?>">
                                                <h5>FIRST DEGREE CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <?php if (empty($applicantdata->f_degree_trans)) : ?>
                                            <label for="f_degree_trans" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE transcript </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="f_degree_trans" name="f_degree_trans">
                                                <label class="custom-file-label text-lowercase" for="f_degree_trans">Upload transcript(.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_trans); ?>">
                                                <h5>FIRST DEGREE transcript Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="f_degree2" class="font-weight-bold">First Degree qualification 2</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="f_degree2" id="f_degree2" value="<?= (empty($applicantdata->f_degree2) ? '' : $applicantdata->f_degree2) ?>" placeholder="Enter Degree Type (Eg. BSC Computer Science)">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <label for="admission_date_first_deg2" class="font-weight-bold">Admission Date</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="admission_date_first_deg2" name="admission_date_first_deg2" value="<?= (empty($applicantdata->admission_date_first_deg2) ? '' : $applicantdata->admission_date_first_deg2) ?>" placeholder="Enter the date of Admission">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="f_deg_inst_award2" class="font-weight-bold">Awarding University (eg. University of Cape Coast)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="f_deg_inst_award2" name="f_deg_inst_award2" value="<?= (empty($applicantdata->f_deg_inst_award2) ? '' : $applicantdata->f_deg_inst_award2) ?>" placeholder="Enter the institution awarded">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="first_deg_cert_yr2" class="font-weight-bold">Year of Award (eg. 2023)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="first_deg_cert_yr2" name="first_deg_cert_yr2" value="<?= (empty($applicantdata->first_deg_cert_yr2) ? '' : $applicantdata->first_deg_cert_yr2) ?>" placeholder="Enter the year this certificate was awarded">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="completion_date_first_deg2" class="font-weight-bold">Completed Date</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="completion_date_first_deg2" name="completion_date_first_deg2" value="<?= (empty($applicantdata->completion_date_first_deg2) ? '' : $applicantdata->completion_date_first_deg2) ?>" placeholder="Enter the date of Completion">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="certificate_no_first_deg2" class="font-weight-bold">Certificate Number</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="certificate_no_first_deg2" name="certificate_no_first_deg2" value="<?= (empty($applicantdata->certificate_no_first_deg2) ? '' : $applicantdata->certificate_no_first_deg2) ?>" placeholder="Enter the Certificate Number">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <?php if (empty($applicantdata->f_degree_cert2)) : ?>
                                            <label for="f_degree_cert2" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE CERTIFICATE 2 </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="f_degree_cert2" name="f_degree_cert2">
                                                <label class="custom-file-label text-lowercase" for="f_degree_cert2">Upload CERTIFICATE(.pdf/.docx/.jpg) </label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_cert2); ?>">
                                                <h5>FIRST DEGREE CERTIFICATE 2 Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase">
                                        <?php if (empty($applicantdata->f_degree_trans2)) : ?>
                                            <label for="f_degree_trans2" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE transcript 2 </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="f_degree_trans2" name="f_degree_trans2">
                                                <label class="custom-file-label text-lowercase" for="f_degree_trans2">Upload transcript(.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_trans2); ?>">
                                                <h5>FIRST DEGREE transcript 2 Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr><br>
                                <div class="row clearfix">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="othercertname" class="font-weight-bold">OTHER QUALIFICATION (If Any)</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="othercertname" value="<?= (empty($applicantdata->othercertname) ? '' : $applicantdata->othercertname) ?>" id="othercertname" placeholder="TYPE OTHER CERTIFICATION">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="other_deg_inst_award" class="font-weight-bold">Awarding Institution (eg. University of Cape Coast)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="other_deg_inst_award" name="other_deg_inst_award" value="<?= (empty($applicantdata->other_deg_inst_award) ? '' : $applicantdata->other_deg_inst_award) ?>" placeholder="Enter the institution awarded">
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 text-uppercase" <?= (!empty($applicantdata->t_degree_status == 'ONGOING')) ? 'style="display: none"' : 'style="display: block;"' ?>>
                                        <label for="other_deg_cert_yr2" class="font-weight-bold">Year of Award (eg. 2023)</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="other_deg_cert_yr2" name="other_deg_cert_yr2" value="<?= (empty($applicantdata->other_deg_cert_yr2) ? '' : $applicantdata->other_deg_cert_yr2) ?>" placeholder="Enter the year this certificate was awarded">
                                    </div>
                                    <div class="col-md-6">
                                        <?php if (empty($applicantdata->othercert)) : ?>
                                            <label for="othercert" class="font-weight-bold">UPLOAD YOUR OTHER QUALIFICATION CERTIFICATE </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="othercert" name="othercert">
                                                <label class="custom-file-label text-lowercase" for="othercert">Upload CERTIFICATE(.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else : ?>
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->othercert); ?>">
                                                <h5>OTHER QUALIFICATION CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <hr><br>
                                <div class="row clearfix">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <label for="t_existing" class="font-weight-bold text-uppercase">Are you an existing tutor?</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->t_existing) ? '' : $applicantdata->t_existing) ?>">

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6" id="sno" <?= (!empty($applicantdata->t_existing == 'YES')) ? 'style="display: block"' : 'style="display: none;"' ?>>
                                        <div class="form-group">
                                            <label class="text-uppercase font-weight-bold" for="staffno">Staff Number</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" id="staffno" value="<?= (empty($applicantdata->staffno) ? '' : $applicantdata->staffno) ?>" name="staffno" placeholder="Enter Your Staff Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-uppercase font-weight-bold" for="area_specialization">Area of Specialization </label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" id="area_specialization" value="<?= (empty($applicantdata->area_specialization) ? '' : $applicantdata->area_specialization) ?>" name="area_specialization" placeholder="Enter Your Area of Specialization">
                                        </div>

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12">
                                        <label for="tut_rank" class="font-weight-bold text-uppercase">What is your Rank?</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="tut_rank" value="<?= (empty($applicantdata->tut_rank) ? '' : $applicantdata->tut_rank) ?>" name="tut_rank" placeholder="Enter Your Area of Specialization">

                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="study_cen1" class="font-weight-bold text-uppercase">Select Centre One</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->study_cen1) ? '' : $applicantdata->study_cen1) ?>">

                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="study_cen2" class="font-weight-bold text-uppercase">SELECT CENTRE Two</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->study_cen2) ? '' : $applicantdata->study_cen2) ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 course_sel">
                                        <div class="form-group">
                                            <label for="course_sel" class="font-weight-bold text-uppercase">SELECT COURSE TAUGHT</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->course_sel) ? '' : $applicantdata->course_sel) ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 prog_sel">
                                        <div class="form-group">
                                            <label for="prog_sel" class="font-weight-bold text-uppercase">SELECT THE
                                                PROGRAMME TAUGHT</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->prog_sel) ? '' : $applicantdata->prog_sel) ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 course_sel">
                                        <div class="form-group">
                                            <label for="course_sel1" class="font-weight-bold text-uppercase">SELECT OTHER
                                            COURSE TAUGHT</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->course_sel1) ? '' : $applicantdata->course_sel1) ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12 prog_sel1">
                                        <div class="form-group">
                                            <label for="prog_sel1" class="font-weight-bold text-uppercase">SELECT OTHER
                                                PROGRAMME TAUGHT</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->prog_sel1) ? '' : $applicantdata->prog_sel1) ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6" id="sno1" <?= (!empty($applicantdata->t_existing == 'YES')) ? 'style="display: block"' : 'style="display: none;"' ?>>
                                        <label for="centre_coor" class="font-weight-bold text-uppercase">Are you a centre coordinator?</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->centre_coor) ? '' : $applicantdata->centre_coor) ?>">

                                    </div>

                                    <div class="col-md-6 col-lg-6 col-sm-6" id="coor" <?= (!empty($applicantdata->t_existing == 'YES')) ? 'style="display: block"' : 'style="display: none;"' ?>>
                                        <div class="form-group">
                                            <label for="cord_centre" class="font-weight-bold text-uppercase">CENTRE YOU ARE COORDINATING</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->study_cen3) ? '' : $applicantdata->study_cen3) ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-12" >
                                        <label for="current_work_schedule" class="font-weight-bold text-uppercase">Current Work Schedule</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" value="<?= (empty($applicantdata->current_work_schedule) ? '' : $applicantdata->current_work_schedule) ?>">
                                        
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="text-uppercase font-weight-bold" for="year_of_appointment">Date of Appointment</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" id="year_of_appointment" value="<?= (empty($applicantdata->year_of_appointment) ? '' : $applicantdata->year_of_appointment) ?>" name="year_of_appointment" placeholder="Enter Your Staff Number">
                                        </div>

                                    </div>
                                </div>
                                <hr> <br>
                                <div class="row clearfix">
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="part_full_time" class="font-weight-bold">Parttime/Fulltime</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" id="year_of_appointment" value="<?= (empty($applicantdata->part_full_time) ? '' : $applicantdata->part_full_time) ?>" name="year_of_appointment" placeholder="Enter Your Staff Number">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12 text-uppercase">
                                        <label for="dept_faculty" class="font-weight-bold">Department/Faculty</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="dept_faculty" name="dept_faculty" value="<?= (empty($applicantdata->dept_faculty) ? '' : $applicantdata->dept_faculty) ?>" placeholder="Enter the Department/Faculty">
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12 text-uppercase">
                                        <label for="original_institution" class="font-weight-bold">Original Institution</label>
                                        <input type="text" readonly class="form-control-plaintext text-uppercase" id="original_institution" name="original_institution" value="<?= (empty($applicantdata->original_institution) ? '' : $applicantdata->original_institution) ?>" placeholder="Enter the original institution">
                                    </div>
                                   
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="course_taught" class="font-weight-bold">Course Taught</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="course_taught" id="course_taught" value="<?= (empty($applicantdata->course_taught) ? '' : $applicantdata->course_taught) ?>" placeholder="Enter Course Taught">
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                
                                <!--<div class="col-sm-12 mt-5 mb-5">
                                <button type="submit" class="btn btn-block btn-round font-weight-bold" style="background-color:#1c2473;">Submit</button>
                            </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header mt-5 text-uppercase">
                                <h2 class="font-weight-bold"><strong class="txt">BANK </strong> DETAILS </h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="bank_name" class="font-weight-bold">Bank Name</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="bank_name" id="bank_name" value="<?= (empty($applicantdata->bank_name) ? '' : $applicantdata->bank_name) ?>" placeholder="Enter Bank Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="bank_branch" class="font-weight-bold">Bank Branch</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="bank_branch" id="bank_branch" value="<?= (empty($applicantdata->bank_branch) ? '' : $applicantdata->bank_branch) ?>" placeholder="Enter Bank Branch">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="account_number" class="font-weight-bold">Account Number</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="account_number" id="account_number" value="<?= (empty($applicantdata->account_number) ? '' : $applicantdata->account_number) ?>" placeholder="Enter Account Number">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header mt-5 text-uppercase">
                                <h2 class="font-weight-bold"><strong class="txt">Family </strong> Information </h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="spouse_name" class="font-weight-bold">Spouse Name</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="spouse_name" id="spouse_name" value="<?= (empty($applicantdata->spouse_name) ? '' : $applicantdata->spouse_name) ?>" placeholder="Enter Spouse Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="next_of_kin" class="font-weight-bold">Next of Kin</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="next_of_kin" id="next_of_kin" value="<?= (empty($applicantdata->next_of_kin) ? '' : $applicantdata->next_of_kin) ?>" placeholder="Enter Next of Kin">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="nok_phone_no" class="font-weight-bold">Phone Number</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="nok_phone_no" id="nok_phone_no" value="<?= (empty($applicantdata->nok_phone_no) ? '' : $applicantdata->nok_phone_no) ?>" placeholder="Enter Next of King Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="nok_digital_number" class="font-weight-bold">Digital/House Number</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="nok_digital_number" id="nok_digital_number" value="<?= (empty($applicantdata->nok_digital_number) ? '' : $applicantdata->nok_digital_number) ?>" placeholder="Enter Next of King Digital/House No.">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="form-group text-uppercase">
                                            <label for="nok_postal_address" class="font-weight-bold">Postal Address</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="nok_postal_address" id="nok_postal_address" value="<?= (empty($applicantdata->nok_postal_address) ? '' : $applicantdata->nok_postal_address) ?>" placeholder="Enter Next of King physical/postal Address">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <?php if(!empty($_SESSION['centre'])):?>
                            <div class="row clearfix">
                                
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header mt-5 text-uppercase">
                                            <h5 class="font-weight-bold"><strong class="txt">Tutors </strong> Attendance  </h5>
                                        </div>
                                        <div class="col-md-12 col-lg-12 col-sm-12 mb-4" >
                                            <label for="centre_presence" class="font-weight-bold text-uppercase">Is the Tutor present at the centre?</label>
                                            <input type="text" readonly class="form-control-plaintext text-uppercase" name="nok_postal_address" id="nok_postal_address" value="<?= (empty($applicantdata->centre_presence) ? '' : $applicantdata->centre_presence) ?>">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif;?>
                                <div class="mt-5">
                                    <div class="row clearfix">
                                        <div class="col-sm-12" id="send">
                                            <div class="form-group">
                                                <div class="text-center d-print-none"><input type="submit" onclick="print()" id="done" name="done" style="background-color:#D2262D;" class="btn btn-block font-weight-bold text-white btn-danger" value="Print Form"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>

</section>
<?php
include APPROOT . "/views/includes/footer.php";
?>