<?php 
include APPROOT.'/views/includes/shrheader.php';
// include APPROOT.'/views/includes/nav.php';
// include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
if(!empty($data['applicantdata'])){
    foreach($data['applicantdata'] as $applicantdata){}
}


?>
<section class="container mt-5">
    <div class="block-header mt-5">
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12 mt-5 col-sm-12">
                <h2>APPLY HERE
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <?php if(!isset($_SESSION['phone_no'])):?>
        <form action="" id="start_application_fm" method="post">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-uppercase font-weight-bold"><strong class="txt">Enter</strong> Details to
                                Start <small>Enter the following details to start application</small>
                                <small class="text-danger">NB: If you have already submitted your details you dont need
                                    to Submit again</small>
                                <small class="text-danger">NB: Save and Continue doesn't mean you have Submitted</small>
                                <a class="btn btn-secondary" href="https://youtu.be/lNGGZ5FdtrQ">Watch how to apply
                                    here</a>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-12">
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="fname">First
                                                    Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="mname">Middle
                                                    Name</label>
                                                <input type="text" class="form-control" id="mname" name="mname"
                                                    placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="lname">Last
                                                    Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
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
                                            style="background-color:#1c2473;" value="Save And Continue"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php else: ?>
        <form action="" id="application_fm" method="post">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 class="text-uppercase font-weight-bold"><strong class="txt">Personal</strong> Details
                                <small>Please fill the following form</small>
                                <small class="text-danger">Having difficulty? Please send a whatsapp to
                                    <b>0202551988</b> between 8:30pm to 4:30pm Monday to Friday</small>
                                <small class="text-danger">NB: If you have already submitted your details you dont need
                                    to Submit again</small>
                                <small class="text-danger">NB: Save and Continue doesn't mean you have Submitted. Make
                                    sure to submit</small>
                            </h2>
                            <a class="btn btn-secondary" href="https://youtu.be/lNGGZ5FdtrQ">Watch how to apply here</a>

                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-8">
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="fname">First
                                                    Name</label>
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    value="<?=(empty($applicantdata->fname)?'':$applicantdata->fname)?>"
                                                    placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="mname">Middle
                                                    Name</label>
                                                <input type="text" class="form-control" id="mname" name="mname"
                                                    value="<?=(empty($applicantdata->mname)?'':$applicantdata->mname)?>"
                                                    placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="lname">Last
                                                    Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    value="<?=(empty($applicantdata->lname)?'':$applicantdata->lname)?>"
                                                    placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="dob">Date of
                                                    Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob"
                                                    value="<?=(empty($applicantdata->dob)?'':$applicantdata->dob)?>"
                                                    placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="text-uppercase font-weight-bold" for="gender">Gender</label>
                                            <select class="pt-2 d-block" style="width:100%;" id="gender" name="gender">
                                                <option
                                                    value="<?=(empty($applicantdata->gender)?'':$applicantdata->gender)?>">
                                                    <?=(empty($applicantdata->gender)?'- Gender -':$applicantdata->gender)?>
                                                </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="phone_no">Phone
                                                    Number</label>
                                                <input type="tel" class="form-control" maxlength="10" id="phone_no"
                                                    value="<?=(empty($applicantdata->phone_no)?'':$applicantdata->phone_no)?>"
                                                    name="phone_no" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="<?=(empty($applicantdata->email)?'':$applicantdata->email)?>"
                                                    placeholder="Enter Your Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="curr_loc">CURRENT
                                                    LOCATION</label>
                                                <input type="text" class="form-control" id="curr_loc" name="curr_loc"
                                                    value="<?=(empty($applicantdata->curr_loc)?'':$applicantdata->curr_loc)?>"
                                                    placeholder="Enter Your Current Location">
                                            </div>
                                        </div>
                                        <!--<div class="col-md-4 col-lg-4 col-sm-4 mb-4">
                                            <label for="id_type" class="font-weight-bold text-uppercase">ID Card Type</label>
                                                <select class="pt-2 d-block" style="width:100%;" id="id_type" name="id_type" onchange="showDiv3(this)">
                                                    <option value="<?=(empty($applicantdata->id_type)?'':$applicantdata->id_type)?>"><?=(empty($applicantdata->id_type)?'- Select Card Type -':$applicantdata->id_type)?></option>
                                                    <option value="PASSPORT">PASSPORT</option>
                                                    <option value="VOTERS ID">VOTERS ID</option>
                                                    <option value="GHANA CARD">GHANA CARD</option>
                                                    <option value="DRIVER'S LICENSE">DRIVER'S LICENSE</option>
                                                    <option value="NHIS">NATIONAL HEALTH INSURANCE SCHEME CARD(NHIS)</option>
                                                </select>
                                        </div>-->
                                        <input type="hidden" class="form-control" id="id_type" name="id_type"
                                            value="GHANA CARD">
                                        <div class="col-md-4 col-lg-4 col-sm-4 mb-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="cardno">Ghana Card
                                                    Number</label>
                                                <input type="text" class="form-control" id="cardno" name="cardno"
                                                    value="<?=(empty($applicantdata->cardno)?'':$applicantdata->cardno)?>"
                                                    placeholder="Enter Your ID Card Number">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row clearfix">
                                        <div class="col-12">
                                            <div class="form-group text-center">
                                                <img class="avatar-img "
                                                    <?=(!empty($applicantdata->staffpic)?'style="width:200px; height:auto; margin-top:40px"':'style="width:150px; height:auto;"')?>
                                                    src="<?=(!empty($applicantdata->staffpic)?URLROOT.'/public/images/tutor_files/'.$applicantdata->staffpic :URLROOT.'/public/images/avatar3.png')  ?>"
                                                    alt="User Image">
                                                <?php if(empty($applicantdata->staffpic)){ ?>
                                                <label class="text-uppercase font-weight-bold" for="staffpic">Upload
                                                    your passport Picture</label>
                                                <input type="file" class="form-control text-uppercase" id="staffpic"
                                                    value="<?=(empty($applicantdata->staffpic)?'':$applicantdata->staffpic)?>"
                                                    name="staffpic">
                                                <?php } ?>
                                            </div>
                                            <?php if(empty($applicantdata->staffpic)){ ?>
                                            <div class="col-sm-12">
                                                <div class="form-group form-inline">
                                                    <label class="text-uppercase font-weight-bold text-danger"
                                                        for="save1">save image
                                                        <input type="checkbox" class="form-control text-uppercase ml-3"
                                                            onclick="showDiv5()" id="save1" name="save1"
                                                            placeholder="Position Held">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12" id="savecon1" style="display: none;">
                                                <div class="form-group">
                                                    <div class="text-center"><input type="submit" id="save1"
                                                            name="save1"
                                                            class="btn btn-block text-whitefont-weight-bold"
                                                            style="background-color:#1c2473;" value="Save And Continue">
                                                    </div>
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
                            <h2 class="font-weight-bold"><strong class="txt">ACADEMIC </strong> CREDENTIALS <small>Enter
                                    your academic infomation</small> </h2>
                        </div>
                        <div class="body">
                            <!-- <div class="row clearfix"> -->
                            <!-- <div class="col-md-12 col-lg-12 col-sm-12"> -->
                            <div class="col-md-12 col-lg-12 col-sm-12 text-uppercase">
                                <?php if(empty($applicantdata->cv)): ?>
                                <label for="input-folder-1 mt-3 font-weight-bold">Upload your Curriculum Vitae (CV)
                                    <small class="text-danger">.pdf File Only. File shouldn't exceed 2MB</small></label>
                                <div class="custom-file">
                                    <input type="file" onchange="validateSize(this)" class="custom-file-input" id="cv"
                                        name="cv">
                                    <label class="custom-file-label text-lowercase" for="cv">Upload Your CV
                                        (.pdf/.jpg)</label>
                                </div>
                                <?php else: ?>
                                <h5></h5>
                                <a class="btn btn-sm btn-secondary btn-block"
                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->cv);?>">
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
                                        <label for="t_degree" class="font-weight-bold">PhD QUALIFICATION (eg. PhD in
                                            Economics Education (<strong class="text-danger">If Any</strong>))</label>
                                        <input type="text" class="form-control" name="t_degree" id="t_degree"
                                            value="<?=(empty($applicantdata->t_degree)?'':$applicantdata->t_degree)?>"
                                            placeholder="PhD DEGREE QUALIFICATION">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                    <label for="t_degree_status" class="font-weight-bold text-uppercase">Status of your
                                        PhD</label>
                                    <select class="pt-2 d-block" style="width:100%;" id="t_degree_status"
                                        name="t_degree_status" onchange="showDiv2(this)">
                                        <option
                                            value="<?=(empty($applicantdata->t_degree_status)?'':$applicantdata->t_degree_status)?>">
                                            <?=(empty($applicantdata->t_degree_status)?'- PhD Status -':$applicantdata->t_degree_status)?>
                                        </option>
                                        <option value="COMPLETED">COMPLETED</option>
                                        <option value="ONGOING">ONGOING</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="com2">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase"
                                            <?=(!empty($applicantdata->t_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                            <?php if(empty($applicantdata->t_deg_cert)): ?>
                                            <label for="t_deg_cert" class="font-weight-bold">UPLOAD YOUR PhD CERTIFICATE
                                                <small class="text-danger">.pdf File Only. File shouldn't exceed
                                                    2MB</small> </label>
                                            <div class="custom-file">
                                                <input type="file" onchange="validateSize(this)"
                                                    class="custom-file-input" id="t_deg_cert" name="t_deg_cert">
                                                <label class="custom-file-label text-lowercase" for="t_deg_cert">Upload
                                                    CERTIFICATE(.pdf/.jpg)</label>
                                            </div>
                                            <?php else: ?>
                                            <a class="btn btn-sm btn-secondary btn-block"
                                                href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_deg_cert);?>">
                                                <h5>PhD CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase"
                                            <?=(!empty($applicantdata->t_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                            <?php if(empty($applicantdata->t_degree_trans)): ?>
                                            <label for="t_degree_trans" class="font-weight-bold">UPLOAD YOUR PhD
                                                TRANSCRIPT <small class="text-danger">.pdf File Only. File shouldn't
                                                    exceed 2MB</small></label>
                                            <div class="custom-file">
                                                <input type="file" onchange="validateSize(this)"
                                                    class="custom-file-input" id="t_degree_trans" name="t_degree_trans">
                                                <label class="custom-file-label text-lowercase"
                                                    for="t_degree_trans">Upload transcript(.pdf/.jpg)</label>
                                            </div>
                                            <?php else: ?>
                                            <a class="btn btn-sm btn-secondary btn-block"
                                                href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_degree_trans);?>">
                                                <h5>PhD TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" id="ongo2"
                                    <?=(!empty($applicantdata->t_degree_status == 'ONGOING'))?'style="display: block"':'style="display: none;"'?>>
                                    <?php if(empty($applicantdata->tb_detail_result)): ?>
                                    <label for="tb_detail_result" class="font-weight-bold">UPLOAD YOUR DETAILED RESULTS
                                        <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB</small></label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="tb_detail_result" name="tb_detail_result">
                                        <label class="custom-file-label text-lowercase" for="tb_detail_result">Upload
                                            DETAILED RESULTS (.pdf/.jpg)</label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_degree_trans);?>">
                                        <h5>PhD TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <hr><br>
                            <div class="row clearfix">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="s_degree" class="font-weight-bold">SECOND DEGREE (eg.
                                            MPhil/MSc/MEd/MCom/MBA)</label>
                                        <input type="text" class="form-control" name="s_degree" id="s_degree"
                                            value="<?=(empty($applicantdata->s_degree)?'':$applicantdata->s_degree)?>"
                                            placeholder="SECOND DEGREE">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                    <label for="degree_status" class="font-weight-bold text-uppercase">Status of your
                                        second degree</label>
                                    <select class="pt-2 d-block" style="width:100%;" id="degree_status"
                                        name="degree_status" onchange="showDiv(this)">
                                        <option
                                            value="<?=(empty($applicantdata->sec_degree_status)?'':$applicantdata->sec_degree_status)?>">
                                            <?=(empty($applicantdata->sec_degree_status)?'- Second Degree Status -':$applicantdata->sec_degree_status)?>
                                        </option>
                                        <option value="COMPLETED">COMPLETED</option>
                                        <option value="ONGOING">ONGOING</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="com">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase"
                                            <?=(!empty($applicantdata->sec_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                            <?php if(empty($applicantdata->sec_deg_cert)): ?>
                                            <label for="sec_deg_cert" class="font-weight-bold">UPLOAD YOUR SECOND DEGREE
                                                CERTIFICATE <small class="text-danger">.pdf File Only. File shouldn't
                                                    exceed 2MB</small> </label>
                                            <div class="custom-file">
                                                <input type="file" onchange="validateSize(this)"
                                                    class="custom-file-input" id="sec_deg_cert" name="sec_deg_cert">
                                                <label class="custom-file-label text-lowercase"
                                                    for="sec_deg_cert">Upload CERTIFICATE(.pdf/.jpg)</label>
                                            </div>
                                            <?php else: ?>
                                            <a class="btn btn-sm btn-secondary btn-block"
                                                href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->sec_deg_cert);?>">
                                                <h5>SECOND DEGREE CERTIFICATE Uploaded <i
                                                        class="zmdi zmdi-download"></i></h5>
                                            </a>
                                            <?php endif; ?>

                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase"
                                            <?=(!empty($applicantdata->sec_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                            <?php if(empty($applicantdata->sec_degree_trans)): ?>
                                            <label for="sec_degree_trans" class="font-weight-bold">UPLOAD YOUR SECOND
                                                DEGREE TRANSCRIPT <small class="text-danger">.pdf File Only. File
                                                    shouldn't exceed 2MB</small></label>
                                            <div class="custom-file">
                                                <input type="file" onchange="validateSize(this)"
                                                    class="custom-file-input" id="sec_degree_trans"
                                                    name="sec_degree_trans">
                                                <label class="custom-file-label text-lowercase"
                                                    for="sec_degree_trans">Upload transcript(.pdf/.jpg)</label>
                                            </div>
                                            <?php else: ?>
                                            <a class="btn btn-sm btn-secondary btn-block"
                                                href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->sec_degree_trans);?>">
                                                <h5>SECOND DEGREE TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i>
                                                </h5>
                                            </a>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" id="ongo"
                                    <?=(!empty($applicantdata->sec_degree_status == 'ONGOING'))?'style="display: block"':'style="display: none;"'?>>
                                    <?php if(empty($applicantdata->detail_result)): ?>
                                    <label for="detail_result" class="font-weight-bold">UPLOAD YOUR DETAILED RESULTS
                                        <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB</small></label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="detail_result" name="detail_result">
                                        <label class="custom-file-label text-lowercase" for="detail_result">Upload
                                            DETAILED RESULTS (.pdf/.jpg)</label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->detail_result);?>">
                                        <h5>SECOND DETAILED RESULTS Uploaded <i class="zmdi zmdi-download"></i></h5>
                                    </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <hr><br>

                            <div class="row clearfix">
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="form-group text-uppercase">
                                        <label for="f_degree" class="font-weight-bold">First Degree
                                            qualification</label>
                                        <input type="text" class="form-control"
                                            value="<?=(empty($applicantdata->f_degree)?'':$applicantdata->f_degree)?>"
                                            name="f_degree" id="f_degree"
                                            placeholder="Enter Degree Type (Eg. BSC Computer Science)">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_cert)): ?>
                                    <label for="f_degree_cert" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE
                                        CERTIFICATE <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB</small></label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="f_degree_cert" name="f_degree_cert">
                                        <label class="custom-file-label text-lowercase" for="f_degree_cert">Upload
                                            CERTIFICATE(.pdf/.jpg) </label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_cert);?>">
                                        <h5>FIRST DEGREE CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                    </a>
                                    <?php endif; ?>

                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_trans)): ?>
                                    <label for="f_degree_trans" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE
                                        transcript <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB</small></label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="f_degree_trans" name="f_degree_trans">
                                        <label class="custom-file-label text-lowercase" for="f_degree_trans">Upload
                                            transcript(.pdf/.jpg)</label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_trans);?>">
                                        <h5>FIRST DEGREE transcript Uploaded <i class="zmdi zmdi-download"></i></h5>
                                    </a>
                                    <?php endif; ?>

                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="form-group text-uppercase">
                                        <label for="f_degree2" class="font-weight-bold">First Degree qualification
                                            2</label>
                                        <input type="text" class="form-control" name="f_degree2" id="f_degree2"
                                            value="<?=(empty($applicantdata->f_degree2)?'':$applicantdata->f_degree2)?>"
                                            placeholder="Enter Degree Type (Eg. BSC Computer Science)">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_cert2)): ?>
                                    <label for="f_degree_cert2" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE
                                        CERTIFICATE 2 <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB</small></label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="f_degree_cert2" name="f_degree_cert2">
                                        <label class="custom-file-label text-lowercase" for="f_degree_cert2">Upload
                                            CERTIFICATE(.pdf/.jpg) </label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_cert2);?>">
                                        <h5>FIRST DEGREE CERTIFICATE 2 Uploaded <i class="zmdi zmdi-download"></i></h5>
                                    </a>
                                    <?php endif; ?>

                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_trans2)): ?>
                                    <label for="f_degree_trans2" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE
                                        transcript 2 <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB</small></label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="f_degree_trans2" name="f_degree_trans2">
                                        <label class="custom-file-label text-lowercase" for="f_degree_trans2">Upload
                                            transcript(.pdf/.jpg)</label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_trans2);?>">
                                        <h5>FIRST DEGREE transcript 2 Uploaded <i class="zmdi zmdi-download"></i></h5>
                                    </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <hr><br>
                            <div class="row clearfix">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="othercertname" class="font-weight-bold">OTHER QUALIFICATION (If
                                            Any)</label>
                                        <input type="text" class="form-control" name="othercertname"
                                            value="<?=(empty($applicantdata->othercertname)?'':$applicantdata->othercertname)?>"
                                            id="othercertname" placeholder="TYPE OTHER CERTIFICATION">
                                    </div>
                                </div>
                                <div class="col-md-6 text-uppercase">
                                    <?php if(empty($applicantdata->othercert)): ?>
                                    <label for="othercert" class="font-weight-bold">UPLOAD YOUR OTHER QUALIFICATION
                                        CERTIFICATE <small class="text-danger">.pdf File Only. File shouldn't exceed
                                            2MB.</small> </label>
                                    <div class="custom-file">
                                        <input type="file" onchange="validateSize(this)" class="custom-file-input"
                                            id="othercert" name="othercert">
                                        <label class="custom-file-label text-lowercase" for="othercert">Upload
                                            CERTIFICATE(.pdf/.jpg)</label>
                                    </div>
                                    <?php else: ?>
                                    <a class="btn btn-sm btn-secondary btn-block"
                                        href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->othercert);?>">
                                        <h5>OTHER QUALIFICATION CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i>
                                        </h5>
                                    </a>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <hr><br>
                            <div class="row clearfix">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <label for="t_existing" class="font-weight-bold text-uppercase">Are you an existing
                                        tutor?</label>
                                    <select class="pt-2 d-block" style="width:100%;" id="t_existing" name="t_existing"
                                        onchange="showDiv3(this)">
                                        <option
                                            value="<?=(empty($applicantdata->t_existing)?'':$applicantdata->t_existing)?>">
                                            <?=(empty($applicantdata->t_existing)?'- Select Tutor Status -':$applicantdata->t_existing)?>
                                        </option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6" id="sno"
                                    <?= (!empty($applicantdata->t_existing == 'YES'))?'style="display: block"':'style="display: none;"'?>>
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold" for="staffno">Staff
                                            Number</label>
                                        <input type="number" class="form-control" id="staffno"
                                            value="<?=(empty($applicantdata->staffno)?'':$applicantdata->staffno)?>"
                                            name="staffno" placeholder="Enter Your Staff Number">
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="study_cen1" class="font-weight-bold text-uppercase">Select Centre
                                            One</label>
                                        <select class="pt-2 d-block" style="width:100%;" id="study_cen1"
                                            name="study_cen1">
                                            <option
                                                value="<?=(empty($applicantdata->study_cen1)?'':$applicantdata->study_cen1)?>">
                                                <?=(empty($applicantdata->study_cen1)?'- Select Your Study Centre -':$applicantdata->study_cen1)?>
                                            </option>
                                            <?php foreach($data['total_cen'] as $centres):?>
                                            <option value="<?=$centres->centre_name?>">
                                                <?php echo $centres->centre_name;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="study_cen2" class="font-weight-bold text-uppercase">SELECT CENTRE
                                            Two</label>
                                        <select class="pt-2 d-block" style="width:100%;" id="study_cen2"
                                            name="study_cen2">
                                            <option
                                                value="<?=(empty($applicantdata->study_cen2)?'':$applicantdata->study_cen2)?>">
                                                <?=(empty($applicantdata->study_cen2)?'- Select Your Study Centre -':$applicantdata->study_cen2)?>
                                            </option>
                                            <?php foreach($data['total_cen'] as $centres):?>
                                            <option value="<?=$centres->centre_name?>">
                                                <?php echo $centres->centre_name;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 course_sel">
                                    <div class="form-group">
                                        <label for="course_sel" class="font-weight-bold text-uppercase">SELECT THE
                                            COURSE OF YOUR INTEREST</label>
                                        <select class="pt-2 d-block" style="width:100%;" id="course_sel"
                                            name="course_sel">
                                            <option
                                                value="<?=(empty($applicantdata->course_sel)?'':$applicantdata->course_sel)?>">
                                                <?=(empty($applicantdata->course_sel)?'- Course of Interest -':$applicantdata->course_sel)?>
                                            </option>
                                            <?php foreach($data['total_course'] as $course):?>
                                            <option value="<?=$course->course_name?>"><?php echo $course->course_name;?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 course_sel1">
                                    <div class="form-group">
                                        <label for="course_sel1" class="font-weight-bold text-uppercase">SELECT OTHER
                                            COURSE OF YOUR INTEREST</label>
                                        <select class="pt-2 d-block" style="width:100%;" id="course_sel1"
                                            name="course_sel1">
                                            <option
                                                value="<?=(empty($applicantdata->course_sel1)?'':$applicantdata->course_sel1)?>">
                                                <?=(empty($applicantdata->course_sel1)?'- Course of Interest -':$applicantdata->course_sel1)?>
                                            </option>
                                            <?php foreach($data['total_course'] as $course):?>
                                            <option value="<?=$course->course_name?>"><?php echo $course->course_name;?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6" id="sno1"
                                    <?=(!empty($applicantdata->t_existing == 'YES'))?'style="display: block"':'style="display: none;"'?>>
                                    <label for="centre_coor" class="font-weight-bold text-uppercase">Are you a centre
                                        coordinator?</label>
                                    <select class="pt-2 d-block" style="width:100%;" id="centre_coor" name="centre_coor"
                                        onchange="showDiv4(this)">
                                        <option
                                            value="<?=(empty($applicantdata->centre_coor)?'':$applicantdata->centre_coor)?>">
                                            <?=(empty($applicantdata->centre_coor)?'- Centre Coordinator -':$applicantdata->centre_coor)?>
                                        </option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-6" id="coor"
                                    <?=(!empty($applicantdata->t_existing == 'YES'))?'style="display: block"':'style="display: none;"'?>>
                                    <div class="form-group">
                                        <label for="cord_centre" class="font-weight-bold text-uppercase">CENTRE YOU ARE
                                            COORDINATING</label>
                                        <select class="pt-2 d-block" style="width:100%;" id="cord_centre"
                                            name="cord_centre">
                                            <option
                                                value="<?=(empty($applicantdata->study_cen3)?'':$applicantdata->study_cen3)?>">
                                                <?=(empty($applicantdata->study_cen3)?'- Select Cordinating Centre -':$applicantdata->study_cen3)?>
                                            </option>
                                            <?php foreach($data['total_cen'] as $centres):?>
                                            <option value="<?=$centres->centre_name?>">
                                                <?php echo $centres->centre_name;?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group form-inline">
                                            <label class="text-uppercase font-weight-bold mr-2 text-danger"
                                                for="save">Check this if ou want to save and continue your form later
                                                <input type="checkbox" class="form-control text-uppercase ml-3"
                                                    onclick="showDiv1()" id="save" name="save"
                                                    placeholder="Position Held">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="savecon" style="display: none;">
                                        <div class="form-group">
                                            <div class="text-center"><input type="submit" id="save" name="save"
                                                    class="btn btn-block font-weight-bold text-white"
                                                    style="background-color:#273B73;" value="Save and Continue Later">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="send">
                                        <div class="form-group">
                                            <div class="text-center"><input type="submit" id="done" name="done"
                                                    style="background-color:#D2262D;"
                                                    class="btn btn-block font-weight-bold text-white btn-danger"
                                                    value="Done Submit"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-sm-12 mt-5 mb-5">
                                <button type="submit" class="btn btn-block btn-round font-weight-bold" style="background-color:#1c2473;">Submit</button>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php endif; ?>
    </div>

    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header text-white" style="background-color: #1c2473;">
                    <h5 class="modal-title" id="staticBackdropLabel">NOTICE TO APPLICANTS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-white bg-danger"><strong>This application is open to ONLY tutors at the College of
                            Distance Education - UCC.</strong></h4>
                    <p>
                    <h5>Qualifications</h5>
                    <p>Applicants must have at least a Master’s Degree(MPhil/MSc/MEd/MCom/MBA) or PHD.
                        The applicant must also have a teaching experience.</p>


                    <h5>Duties of A Course Tutor</h5>
                    A Course Tutor is expected to: <br>
                    • Adopt/adapt teaching strategies to enhance the teaching and learning of the course applied for.
                    <br>
                    • Support the assessment strategy proposed by the Course Expert at the University of Cape Coast.
                    <br>
                    • Mark End-of-Semester Examination scripts.<br>
                    • Guide the students to develop independent learning and critical thinking skills. <br>
                    • Provide advisory services to students of the College of Distance Education, University of Cape
                    Coast.<br>
                    • Etc.<br><br>

                    <h5>Mode of Delivery</h5>
                    <p>Successful applicants will use both online and face-to-face mode of delivery to engage students.
                    </p>


                    <h5>Accompanying documents to be uploaded</h5>

                    1. Scanned copies of: <br>
                    i) 1st degree certificate and transcript.<br>
                    ii) 2nd degree certificate and transcript or Other Certification.<br>
                    iii) PhD certificate and transcript (if any).<br><br>

                    2. Curriculum Vitae
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default text-white" data-dismiss="modal"
                        style="background-color:#1c2473;border-radius:20px;">Understood</button>
                </div>
            </div>
        </div>
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

$(document).ready(function() {
    // checkCookie();
    $('#staticBackdrop').modal('show');
});

// $(document).ready(function() {
//     // checkCookie();
//     $('#infomodal').modal('show');
// });

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


function validateSize1(input) {
    var cv = document.getElementById('cv').val = '';
    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
    if (fileSize > 2) {
        alert('CV size should not exceeds 2 MiB');
        // $(this).val('');
        input.value = '';
        // $(file).val(''); //for clearing with Jquery
    } else {
        // Proceed further
    }
}

function validateSize(input) {
    const fileSize = input.files[0].size / 1024 / 1024; // in MiB
    if (fileSize > 2) {
        alert('File size should not exceeds 2 MiB');
        input.value = '';
        // $(file).val(''); //for clearing with Jquery
    } else {
        // Proceed further
    }
}

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
            url: "<?php echo URLROOT; ?>/users/tutor_applystart.php",
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