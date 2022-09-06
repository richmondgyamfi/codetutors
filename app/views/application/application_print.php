<link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/bootstrap/css/bootstrap.min.css">

<?php 
// include APPROOT.'/views/includes/shrheader.php';
// include APPROOT.'/views/includes/nav.php';
// include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
if(!empty($data['applicantdata'])){
    foreach($data['applicantdata'] as $applicantdata){}
}
?>
<ul class="navbar-nav ml-5 d-print-none">
    <?php if(isset($_SESSION['phone_no'])):?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT ?>/users/logout1.php">LOGOUT</a>
    </li>
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
    <?php if(!isset($_SESSION['phone_no'])):?>
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
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="mname">Middle Name</label>
                                                <input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="lname">Last Name</label>
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                            <label class="text-uppercase font-weight-bold" for="phone_no">Phone Number</label>
                                                <input type="tel" class="form-control" maxlength="10" id="phone_no" name="phone_no" placeholder="Phone">
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
        <?php else: ?>
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
                                                <input type="text" class="form-control-plaintext text-uppercase" id="fname" name="fname" value="<?=(empty($applicantdata->fname)?'':$applicantdata->fname)?>" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="mname">Middle Name</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="mname" name="mname" value="<?=(empty($applicantdata->mname)?'':$applicantdata->mname)?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="lname">Last Name</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="lname" name="lname" value="<?=(empty($applicantdata->lname)?'':$applicantdata->lname)?>" placeholder="Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="dob">Date of Birth</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="dob" name="dob" value="<?=(empty($applicantdata->dob)?'':$applicantdata->dob)?>" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="text-uppercase font-weight-bold" for="gender">Gender</label>
                                            <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->gender)?'':$applicantdata->gender)?>">
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                            <label class="text-uppercase font-weight-bold" for="phone_no">Phone Number</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" maxlength="10" id="phone_no" value="<?=(empty($applicantdata->phone_no)?'':$applicantdata->phone_no)?>" name="phone_no" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="email">Email</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="email" name="email" value="<?=(empty($applicantdata->email)?'':$applicantdata->email)?>" placeholder="Enter Your Email">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="curr_loc">CURRENT LOCATION</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="curr_loc" name="curr_loc" value="<?=(empty($applicantdata->curr_loc)?'':$applicantdata->curr_loc)?>" placeholder="Enter Your Current Location">
                                            </div>
                                        </div>                            
                                        <div class="col-md-4 col-lg-4 col-sm-4 mb-4">
                                            <label for="id_type" class="font-weight-bold text-uppercase">ID Card Type</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->id_type)?'':$applicantdata->id_type)?>">
                                                
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="text-uppercase font-weight-bold" for="cardno">ID Card Number</label>
                                                <input type="text" class="form-control-plaintext text-uppercase" id="cardno" name="cardno" value="<?=(empty($applicantdata->cardno)?'':$applicantdata->cardno)?>" placeholder="Enter Your ID Card Number">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row clearfix">
                                        <div class="col-12">
                                            <div class="form-group text-center">
                                                <img class="avatar-img " <?=(!empty($applicantdata->staffpic)?'style="width:200px; height:auto; margin-top:40px"':'style="width:150px; height:auto;"')?> src="<?=(!empty($applicantdata->staffpic)?URLROOT.'/public/images/tutor_files/'.$applicantdata->staffpic :URLROOT.'/public/images/avatar3.png')  ?>" alt="User Image">
                                                <?php if(empty($applicantdata->staffpic)){ ?>
                                                <label class="text-uppercase font-weight-bold" for="staffpic">Upload your passport Picture</label>
                                                <input type="file" class="form-control text-uppercase" id="staffpic" value="<?=(empty($applicantdata->staffpic)?'':$applicantdata->staffpic)?>" name="staffpic">
                                                <?php } ?>
                                            </div>
                                            <?php if(empty($applicantdata->staffpic)){ ?>
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
                                    <?php if(empty($applicantdata->cv)): ?>
                                    <label for="input-folder-1 mt-3 font-weight-bold">Upload your Curriculum Vitae (CV)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cv" name="cv">
                                        <label class="custom-file-label text-lowercase" for="cv">Upload Your CV (.pdf/.docx/.jpg)</label>
                                    </div>
                                    <?php else: ?>                                        
                                        <h5></h5>
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->cv);?>">
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
                                        <input type="text" class="form-control-plaintext text-uppercase" name="t_degree" id="t_degree" value="<?=(empty($applicantdata->t_degree)?'':$applicantdata->t_degree)?>" placeholder="PhD DEGREE QUALIFICATION">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                    <label for="t_degree_status" class="font-weight-bold text-uppercase">Status of your PhD</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->t_degree_status)?'':$applicantdata->t_degree_status)?>">
                                        
                                </div>
                                <div class="col-md-12" id="com2">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?=(!empty($applicantdata->t_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                        <?php if(empty($applicantdata->t_deg_cert)): ?>
                                            <label for="t_deg_cert" class="font-weight-bold">UPLOAD YOUR PhD CERTIFICATE  </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="t_deg_cert" name="t_deg_cert">
                                                <label class="custom-file-label text-lowercase" for="t_deg_cert">Upload CERTIFICATE(.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else: ?>                                        
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_deg_cert);?>">
                                                <h5>PhD CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?=(!empty($applicantdata->t_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                        <?php if(empty($applicantdata->t_degree_trans)): ?>
                                            <label for="t_degree_trans" class="font-weight-bold">UPLOAD YOUR PhD TRANSCRIPT </label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="t_degree_trans" name="t_degree_trans">
                                                <label class="custom-file-label text-lowercase" for="t_degree_trans">Upload transcript(.pdf/.docx/.jpg)</label>
                                            </div>
                                        <?php else: ?>                                        
                                            <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_degree_trans);?>">
                                                <h5>PhD TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                            </a>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase"id="ongo2" <?=(!empty($applicantdata->t_degree_status == 'ONGOING'))?'style="display: block"':'style="display: none;"'?>>
                                <?php if(empty($applicantdata->tb_detail_result)): ?>
                                    <label for="tb_detail_result" class="font-weight-bold">UPLOAD YOUR DETAILED RESULTS</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="tb_detail_result" name="tb_detail_result">
                                        <label class="custom-file-label text-lowercase" for="tb_detail_result">Upload DETAILED RESULTS (.pdf/.docx/.jpg)</label>
                                    </div>
                                <?php else: ?>                                        
                                    <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->t_degree_trans);?>">
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
                                        <input type="text" class="form-control-plaintext text-uppercase" name="s_degree" id="s_degree" value="<?=(empty($applicantdata->s_degree)?'':$applicantdata->s_degree)?>" placeholder="SECOND DEGREE">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 mb-4">
                                    <label for="degree_status" class="font-weight-bold text-uppercase">Status of your second degree</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->sec_degree_status)?'':$applicantdata->s_degree)?>">
                                        
                                </div>
                                <div class="col-md-12" id="com">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?=(!empty($applicantdata->sec_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                            <?php if(empty($applicantdata->sec_deg_cert)): ?>
                                                <label for="sec_deg_cert" class="font-weight-bold">UPLOAD YOUR SECOND DEGREE CERTIFICATE  </label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sec_deg_cert" name="sec_deg_cert">
                                                    <label class="custom-file-label text-lowercase" for="sec_deg_cert">Upload CERTIFICATE(.pdf/.docx/.jpg)</label>
                                                </div>
                                            <?php else: ?>                                        
                                                <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->sec_deg_cert);?>">
                                                    <h5>SECOND DEGREE CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                                </a>
                                            <?php endif; ?>
                                            
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase" <?=(!empty($applicantdata->sec_degree_status == 'ONGOING'))?'style="display: none"':'style="display: block;"'?>>
                                            <?php if(empty($applicantdata->sec_degree_trans)): ?>
                                                <label for="sec_degree_trans" class="font-weight-bold">UPLOAD YOUR SECOND DEGREE TRANSCRIPT </label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="sec_degree_trans" name="sec_degree_trans">
                                                    <label class="custom-file-label text-lowercase" for="sec_degree_trans">Upload transcript(.pdf/.docx/.jpg)</label>
                                                </div>
                                            <?php else: ?>                                        
                                                <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->sec_degree_trans);?>">
                                                    <h5>SECOND DEGREE TRANSCRIPT Uploaded <i class="zmdi zmdi-download"></i></h5>
                                                </a>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 text-uppercase"id="ongo" <?=(!empty($applicantdata->sec_degree_status == 'ONGOING'))?'style="display: block"':'style="display: none;"'?>>
                                    <?php if(empty($applicantdata->detail_result)): ?>
                                        <label for="detail_result" class="font-weight-bold">UPLOAD YOUR DETAILED RESULTS</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="detail_result" name="detail_result">
                                            <label class="custom-file-label text-lowercase" for="detail_result">Upload DETAILED RESULTS (.pdf/.docx/.jpg)</label>
                                        </div>
                                    <?php else: ?>                                        
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->detail_result);?>">
                                            <h5>SECOND DETAILED RESULTS Uploaded <i class="zmdi zmdi-download"></i></h5>
                                        </a>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                            <hr><br>
                                                    
                            <div class="row clearfix">
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="form-group text-uppercase">
                                        <label for="f_degree" class="font-weight-bold">First Degree qualification</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->f_degree)?'':$applicantdata->f_degree)?>" name="f_degree" id="f_degree" placeholder="Enter Degree Type (Eg. BSC Computer Science)">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_cert)): ?>
                                        <label for="f_degree_cert" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE CERTIFICATE </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="f_degree_cert" name="f_degree_cert">
                                            <label class="custom-file-label text-lowercase" for="f_degree_cert">Upload CERTIFICATE(.pdf/.docx/.jpg) </label>
                                        </div>
                                    <?php else: ?>                                        
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_cert);?>">
                                            <h5>FIRST DEGREE CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                        </a>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_trans)): ?>
                                        <label for="f_degree_trans" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE transcript </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="f_degree_trans" name="f_degree_trans">
                                            <label class="custom-file-label text-lowercase" for="f_degree_trans">Upload transcript(.pdf/.docx/.jpg)</label>
                                        </div>
                                    <?php else: ?>                                        
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_trans);?>">
                                            <h5>FIRST DEGREE transcript Uploaded <i class="zmdi zmdi-download"></i></h5>
                                        </a>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4">
                                    <div class="form-group text-uppercase">
                                        <label for="f_degree2" class="font-weight-bold">First Degree qualification 2</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" name="f_degree2" id="f_degree2" value="<?=(empty($applicantdata->f_degree2)?'':$applicantdata->f_degree2)?>" placeholder="Enter Degree Type (Eg. BSC Computer Science)">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_cert2)): ?>
                                        <label for="f_degree_cert2" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE CERTIFICATE 2 </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="f_degree_cert2" name="f_degree_cert2">
                                            <label class="custom-file-label text-lowercase" for="f_degree_cert2">Upload CERTIFICATE(.pdf/.docx/.jpg) </label>
                                        </div>
                                    <?php else: ?>                                        
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_cert2);?>">
                                            <h5>FIRST DEGREE CERTIFICATE 2 Uploaded <i class="zmdi zmdi-download"></i></h5>
                                        </a>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="col-md-4 col-lg-4 col-sm-4 text-uppercase">
                                    <?php if(empty($applicantdata->f_degree_trans2)): ?>
                                        <label for="f_degree_trans2" class="font-weight-bold">UPLOAD YOUR FIRST DEGREE transcript 2 </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="f_degree_trans2" name="f_degree_trans2">
                                            <label class="custom-file-label text-lowercase" for="f_degree_trans2">Upload transcript(.pdf/.docx/.jpg)</label>
                                        </div>
                                    <?php else: ?>                                        
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->f_degree_trans2);?>">
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
                                        <input type="text" class="form-control-plaintext text-uppercase" name="othercertname" value="<?=(empty($applicantdata->othercertname)?'':$applicantdata->othercertname)?>" id="othercertname" placeholder="TYPE OTHER CERTIFICATION">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php if(empty($applicantdata->othercert)): ?>
                                        <label for="othercert" class="font-weight-bold">UPLOAD YOUR OTHER QUALIFICATION CERTIFICATE  </label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="othercert" name="othercert">
                                            <label class="custom-file-label text-lowercase" for="othercert">Upload CERTIFICATE(.pdf/.docx/.jpg)</label>
                                        </div>
                                    <?php else: ?>                                        
                                        <a class="btn btn-sm btn-secondary btn-block" href="<?php echo URLROOT; ?>/download.php?<?php echo basename($applicantdata->othercert);?>">
                                            <h5>OTHER QUALIFICATION CERTIFICATE Uploaded <i class="zmdi zmdi-download"></i></h5>
                                        </a>
                                    <?php endif; ?>
                                                                            
                                </div>
                            </div>
                            <hr><br>
                            <div class="row clearfix">
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <label for="t_existing" class="font-weight-bold text-uppercase">Are you an existing tutor?</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->t_existing)?'':$applicantdata->t_existing)?>">
                                        
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6" id="sno" <?= (!empty($applicantdata->t_existing == 'YES'))?'style="display: block"':'style="display: none;"'?>>
                                    <div class="form-group">
                                        <label class="text-uppercase font-weight-bold" for="staffno">Staff Number</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" id="staffno" value="<?=(empty($applicantdata->staffno)?'':$applicantdata->staffno)?>" name="staffno" placeholder="Enter Your Staff Number">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="study_cen1" class="font-weight-bold text-uppercase">Select Centre One</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->study_cen1)?'':$applicantdata->study_cen1)?>">
                                        
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="study_cen2" class="font-weight-bold text-uppercase">SELECT CENTRE Two</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->study_cen2)?'':$applicantdata->study_cen2)?>">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 course_sel">
                                    <div class="form-group">
                                        <label for="course_sel" class="font-weight-bold text-uppercase">SELECT THE COURSE OF YOUR INTEREST</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->course_sel)?'':$applicantdata->course_sel)?>">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 course_sel">
                                    <div class="form-group">
                                        <label for="course_sel1" class="font-weight-bold text-uppercase">SELECT OTHER COURSE OF YOUR INTEREST</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->course_sel1)?'':$applicantdata->course_sel1)?>">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6" id="sno1" <?=(!empty($applicantdata->t_existing == 'YES'))?'style="display: block"':'style="display: none;"'?>>
                                    <label for="centre_coor" class="font-weight-bold text-uppercase">Are you a centre coordinator?</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->centre_coor)?'':$applicantdata->centre_coor)?>">
                                        
                                </div>

                                <div class="col-md-6 col-lg-6 col-sm-6" id="coor" <?=(!empty($applicantdata->t_existing == 'YES'))?'style="display: block"':'style="display: none;"'?>>
                                    <div class="form-group">
                                        <label for="cord_centre" class="font-weight-bold text-uppercase">CENTRE YOU ARE COORDINATING</label>
                                        <input type="text" class="form-control-plaintext text-uppercase" value="<?=(empty($applicantdata->study_cen3)?'':$applicantdata->study_cen3)?>">
                                        
                                    </div>
                                </div>
                            </div>

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
include APPROOT."/views/includes/footer.php";
?>

