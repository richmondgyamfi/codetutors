<?php
class Modal extends Controller{

	public function __construct(){
		$this->userFunctions = $this->model('Functions');
		$this->userModel = $this->model('User');
    }

 public function es_modal(){
  if(isset($_POST['app_id'])){
    $ex_data = $this->userModel->getapp_data($_POST['app_id']);
    // var_dump($ex_data);
    // die();
    foreach($ex_data as $adata){}
    ?>
<div class="modal fade" id="deptdata" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content print-container" style="border-radius: 10px 10px;">
            <div class="modal-header d-print-none" style="background-color: #1c2473;">
                <h5 class="modal-title text-white mb-3">Details of
                    <?=ucwords($adata->fname.' '.$adata->mname.' '.$adata->lname);?></h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-light">
                <div class="clearfix">
                    <div class="card">
                        <ul class="nav nav-tabs d-print-none">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">Application
                                    Details</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#friends">Download
                                    Files</a></li>
                        </ul>
                        <div class="tab-content mrt">
                            <div class="tab-pane body active check" id="about">
                                <div class="row clearfix ">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2 class="text-uppercase"><strong>Personal</strong> Details
                                                    <small>Please fill the following form</small> </h2>
                                            </div>
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-sm-4 sd">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="fname">First Name</label>
                                                            <input type="text" class="form-control-plaintext" id="fname"
                                                                name="fname" value="<?=ucwords($adata->fname)?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 sd">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="mname">Middle Name</label>
                                                            <input type="text" class="form-control-plaintext" id="mname"
                                                                name="mname" value="<?=ucwords($adata->mname)?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 sd">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="lname">Last Name</label>
                                                            <input type="text" class="form-control-plaintext" id="lname"
                                                                name="lname" value="<?=ucwords($adata->lname)?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row clearfix">
                                                    <div class="col-sm-4 sd">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="dob">Date of Birth</label>
                                                            <input class="form-control-plaintext" id="dob" name="dob"
                                                                value="<?=ucwords($adata->dob)?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 sd">
                                                        <label class="fieldlabels text-uppercase font-weight-bold"
                                                            for="gender">Gender</label>
                                                        <input class="form-control-plaintext"
                                                            value="<?=ucwords($adata->gender)?>">
                                                    </div>
                                                    <div class="col-sm-4 sd">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="phone_no">Phone Number</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                id="phone_no" name="phone_no"
                                                                value="<?=ucwords($adata->phone_no)?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row clearfix">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="email">Email</label>
                                                            <input type="email" class="form-control-plaintext"
                                                                id="email" name="email"
                                                                value="<?=ucwords($adata->email)?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="fieldlabels text-uppercase font-weight-bold"
                                                                for="curr_loc">CURRENT LOCATION (Eg. Town or
                                                                City)</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                id="curr_loc" name="curr_loc"
                                                                value="<?=ucwords($adata->curr_loc)?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="header mt-5 text-uppercase font-weight-bold">
                                                <h2><strong>ACADEMIC </strong> CREDENTIALS <small>Enter your academic
                                                        infomation</small> </h2>
                                            </div>
                                            <div class="body">
                                                <!-- <div class="row clearfix"> -->
                                                <!-- <div class="col-md-12 col-lg-12 col-sm-12"> -->
                                                <div
                                                    class="col-md-12 col-lg-12 col-sm-12 text-uppercase font-weight-bold">
                                                    <label for="fieldlabels input-folder-1 mt-3">Curriculum Vitae
                                                        (CV)</label>
                                                    <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->cv);?>"
                                                        class="btn bg1 btn-sm btn-block">
                                                        <i class="zmdi zmdi-download"></i>
                                                    </a>
                                                </div>
                                                <!-- </div> -->
                                                <hr><br>
                                                <div class="row clearfix">
                                                    <!-- <div class="col-md-12 col-lg-12 col-sm-12"> -->
                                                    <div class="col-md-4 col-lg-4 col-sm-4">
                                                        <div class="form-group text-uppercase font-weight-bold">
                                                            <label for="fieldlabels f_degree">First Degree
                                                                qualification</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                name="f_degree" id="f_degree"
                                                                value="<?=ucwords($adata->f_degree)?>">
                                                            <!-- <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->f_degree);?>" class="btn btn-sm btn-block">
                                                <i class="zmdi zmdi-download"></i>
                                            </a> -->
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 col-lg-4 col-sm-4 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">FIRST DEGREE
                                                            CERTIFICATE </label>
                                                        <!-- <input type="text" class="form-control-plaintext" id="curr_loc" name="curr_loc" value="<?=ucwords($adata->f_degree_cert)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->f_degree_cert);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="col-md-4 col-lg-4 col-sm-4 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">FIRST DEGREE
                                                            transcript </label>
                                                        <!-- <input type="text" class="form-control-plaintext" id="curr_loc" name="curr_loc" value="<?=ucwords($adata->f_degree_trans)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->f_degree_trans);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <hr><br>
                                                <div class="row clearfix">
                                                    <!-- <div class="col-md-6 col-lg-6 col-sm-6"> -->
                                                    <?php if(!empty($adata->s_degree)):?>
                                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                                        <div class="form-group font-weight-bold">
                                                            <label for="fieldlabels s_degree">SECOND DEGREE
                                                                QUALIFICATION (eg. M.Phil/MSc/M.Ed. Teacher
                                                                Education)</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                value="<?=ucwords((($adata->s_degree == '')?'Not Given':$adata->s_degree))?>">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 mb-4 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels">Status of your second degree*</label>
                                                        <input type="text" class="form-control-plaintext"
                                                            value="<?=ucwords((($adata->sec_degree_status == '')?'Not Given':$adata->sec_degree_status))?>">

                                                    </div>
                                                    <?php endif;?>
                                                </div>
                                                <hr>
                                                <div class="row clearfix">
                                                    <?php if($adata->sec_degree_status == 'COMPLETED'): ?>
                                                    <?php if(!empty($adata->sec_deg_cert)){ ?>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">SECOND DEGREE
                                                            CERTIFICATE </label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->sec_deg_cert)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->sec_deg_cert);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if(!empty($adata->sec_degree_trans)){ ?>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">SECOND DEGREE
                                                            TRANSCRIPT </label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->sec_degree_trans)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->sec_degree_trans);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php elseif($adata->sec_degree_status == 'ONGOING'): ?>
                                                    <?php if(!empty($adata->detail_result)){ ?>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">DETAILED
                                                            RESULTS</label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->detail_result)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->detail_result);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <?php } ?>
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                    <?php if(!empty($adata->othercertname)): ?>
                                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                                        <div class="form-group font-weight-bold">
                                                            <label for="fieldlabels s_degree">OTHER
                                                                QUALIFICATION</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                value="<?=ucwords((($adata->othercertname == '')?'Not Given':$adata->othercertname))?>">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">OTHER QUALIFICATION
                                                            CERTIFICATE </label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->othercert)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->othercert);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if(!empty($adata->t_degree)){ ?>
                                                <hr>
                                                <div class="row clearfix">
                                                    <!-- <div class="col-md-6 col-lg-6 col-sm-6"> -->
                                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                                        <div class="form-group font-weight-bold">
                                                            <label for="fieldlabels s_degree">PhD QUALIFICATION (eg.
                                                                PhD. Teacher Education)</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                value="<?=ucwords((($adata->t_degree == '')?'Not Given':$adata->s_degree))?>">
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 mb-4 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels">Status of your PhD*</label>
                                                        <input type="text" class="form-control-plaintext"
                                                            value="<?=ucwords((($adata->t_degree_status == '')?'Not Given':$adata->sec_degree_status))?>">

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row clearfix">
                                                    <?php if($adata->t_degree_status == 'COMPLETED'): ?>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">PhD CERTIFICATE
                                                        </label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->t_deg_cert)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->t_deg_cert);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">PhD TRANSCRIPT
                                                        </label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->t_degree_trans)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->t_degree_trans);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <?php elseif($adata->t_degree_status == 'ONGOING'): ?>
                                                    <div
                                                        class="col-md-6 col-lg-6 col-sm-6 text-uppercase font-weight-bold">
                                                        <label for="fieldlabels input-folder-3 mt-3">PhD DETAILED
                                                            RESULTS</label>
                                                        <!-- <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->tb_detail_result)?>"> -->
                                                        <a href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->tb_detail_result);?>"
                                                            class="btn bg1 btn-sm btn-block">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </a>
                                                    </div>
                                                    <?php else: ?>
                                                    <?php endif; ?>
                                                </div>
                                                <?php }?>
                                                <hr><br>
                                                <div class="row clearfix">
                                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                                        <div class="form-group text-uppercase font-weight-bold">
                                                            <label for="fieldlabels course_sel">COURSE OF
                                                                INTEREST</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                value="<?=ucwords($adata->title)?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                                        <div class="form-group text-uppercase font-weight-bold">
                                                            <label for="fieldlabels study_cen1">PREFERRED STUDY
                                                                CENTRE</label>
                                                            <input type="text" class="form-control-plaintext"
                                                                value="<?=ucwords($adata->centre_name)?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- <div class="row clearfix">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="fieldlabels study_cen1">PREFERRED STUDY CENTRE A</label>
                                            <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->study_cen1)?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="fieldlabels study_cen2">PREFERRED STUDY CENTRE B</label>
                                            <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->study_cen2)?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="fieldlabels study_cen3">PREFERRED STUDY CENTRE C</label>
                                            <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->study_cen3)?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-3">
                                        <div class="form-group">
                                            <label for="fieldlabels study_cen4">PREFERRED STUDY CENTRE D</label>
                                            <input type="text" class="form-control-plaintext" value="<?=ucwords($adata->study_cen4)?>">
                                        </div>
                                    </div>
                                    
                                </div> -->
                                                <div class="col-sm-12 mt-5 mb-5">
                                                    <button type="submit" onclick="print()"
                                                        class="btn btn-primary btn-block d-print-none btn-round">
                                                        <i class="zmdi zmdi-print"></i> Print</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane body" id="friends">
                                <div class="row clearfix file_manager">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->cv);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">Curriculum Vitae</p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->f_degree_cert);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">First Degree Certificate</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->f_degree_trans);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">First Degree Transcript</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($adata->othercertname): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->othercert);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">Other Qualification Certificate</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($adata->sec_degree_status == 'COMPLETED'): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->sec_deg_cert);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">Second Degree Certificate</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->sec_degree_trans);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">Second Degree Transcript</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php else: ?>

                                    <?php if(!empty($adata->detail_result)): ?>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->detail_result);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">Details of Second Degree Result</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif;?>
                                    <?php if($adata->t_degree_status == 'COMPLETED'): ?>
                                    <?php if(!empty($adata->t_deg_cert)):?>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->t_deg_cert);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">PhD Certificate</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->t_degree_trans);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">PhD Transcript</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php elseif($adata->t_degree_status == 'ONGOING'): ?>
                                    <?php if(!empty($adata->tb_detail_result)):?>
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <div class="card">
                                            <div class="file">
                                                <a
                                                    href="<?php echo URLROOT; ?>/download.php?<?php echo basename($adata->tb_detail_result);?>">
                                                    <div class="hover">
                                                        <button type="button"
                                                            class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                                            <i class="zmdi zmdi-download"></i>
                                                        </button>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="file-name">
                                                        <p class="m-b-5 text-muted">Detail of PhD Result</p>
                                                        <!-- <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small> -->
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <?php endif;?>
                                </div>
                                <!-- <input type="submit" name="submit" id="submit" class="btn btn-block mt-4 btn-primary" value="UPDATE"/> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
  }
 }

 public function modal_status(){
  if(isset($_POST['app_id'])){
    $conlog = $this->userModel->counsel_log($_POST['app_id']);
    $conlog1 = $this->userModel->counsel_log($_POST['app_id']);
    // var_dump($conlog);
    // die();
    foreach($conlog as $adata){}
    ?>
    <div class="modal fade right status_modal" id="status_modal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" style="border-radius: 10px 10px;">
                <div class="modal-header" style="height:70px; background-color: #1c2473;">
                    <h4 class="text-white" style="margin-top:-10px;">Application Stages </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal1()">
                        <span aria-hidden="true" class="text-white">x</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <div class="body">
                        <div role="tabpanel" class="tab-pane" id="timeline">
                            <ul class="cbp_tmtimeline">
                                <li>
                                    <time class="cbp_tmtime"><span
                                            class="hidden"><?php echo $adata->actdate; ?></span></time>
                                    <div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div>
                                    <div class="cbp_tmlabel">
                                        <h2><a href="javascript:void(0);"></a>Applied For Counselling</h2>
                                        <p>Council Needed: <?php echo $adata->council_needed; ?>

                                        </p>
                                    </div>
                                </li>
                                <?php 
                    if(!empty($conlog1)){
                      foreach($conlog1 as $s_data){?>
                                <li>
                                    <time class="cbp_tmtime"><span><?php echo $s_data->sub_date; ?></span></time>
                                    <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-thumb-up"></i></div>
                                    <div class="cbp_tmlabel">
                                        <h2><a href="javascript:void(0);">
                                                <?php echo (($s_data->state == 2)?'YOU REASSIGNED TO :'.$s_data->fullname:(($s_data->state == 3)?'PROGRESS REPORT GIVEN':(($s_data->state == 1)?'ASSIGNED TO :'.$s_data->fullname:'YOU COMPLETED')));?></a>
                                        </h2>
                                        <p><?=$s_data->comments;?></p>
                                    </div>
                                </li>
                                <?php }
                      }
                       
                        ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
  }
 }

 public function modal_status_staff(){
    if(isset($_POST['app_id'])){
      $conlog = $this->userModel->counsel_log_staff($_POST['app_id']);
      $conlog1 = $this->userModel->counsel_log_staff($_POST['app_id']);
      // var_dump($conlog);
      // die();
      foreach($conlog as $adata){}
      ?>
      <div class="modal fade right status_modal" id="status_modal" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel" aria-hidden="true">
  
          <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
              <div class="modal-content" style="border-radius: 10px 10px;">
                  <div class="modal-header" style="height:70px; background-color: #1c2473;">
                      <h4 class="text-white" style="margin-top:-10px;">Application Stages </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal1()">
                          <span aria-hidden="true" class="text-white">x</span>
                      </button>
                  </div>
                  <div class="modal-body bg-light">
                      <div class="body">
                          <div role="tabpanel" class="tab-pane" id="timeline">
                              <ul class="cbp_tmtimeline">
                                  <li>
                                      <time class="cbp_tmtime"><span
                                              class="hidden"><?php echo $adata->actdate; ?></span></time>
                                      <div class="cbp_tmicon"><i class="zmdi zmdi-account"></i></div>
                                      <div class="cbp_tmlabel">
                                          <h2><a href="javascript:void(0);"></a>Applied For Counselling</h2>
                                          <p>Council Needed: <?php echo $adata->council_needed; ?>
  
                                          </p>
                                      </div>
                                  </li>
                                  <?php 
                      if(!empty($conlog1)){
                        foreach($conlog1 as $s_data){?>
                                  <li>
                                      <time class="cbp_tmtime"><span><?php echo $s_data->sub_date; ?></span></time>
                                      <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-thumb-up"></i></div>
                                      <div class="cbp_tmlabel">
                                          <h2><a href="javascript:void(0);">
                                                  <?php echo (($s_data->state == 2)?'YOU REASSIGNED TO :'.$s_data->fullname:(($s_data->state == 3)?'PROGRESS REPORT GIVEN':(($s_data->state == 1)?'ASSIGNED TO :'.$s_data->fullname:'YOU COMPLETED')));?></a>
                                          </h2>
                                          <p><?=$s_data->comments;?></p>
                                      </div>
                                  </li>
                                  <?php }
                        }
                         
                          ?>
                              </ul>
                          </div>
                      </div>
                  </div>
  
              </div>
          </div>
      </div>
      <?php
    }
   }

}
?>

    <script>
    function closeModal1() {
        jQuery('#status_modal').modal('hide');
        setTimeout(function() {
            jQuery('#status_modal').remove();
            jQuery('.modal_backdrop').remove();
        }, 300);
    }

    $('#status_modal').on('hidden.bs.modal', function() {
        setTimeout(function() {
            jQuery('#status_modal').remove();
            jQuery('.modal_backdrop').remove();
        }, 300);
    });

    function closeModal() {
        jQuery('#deptdata').modal('hide');
        setTimeout(function() {
            jQuery('#deptdata').remove();
            jQuery('.modal_backdrop').remove();
        }, 300);
    }

    $('#deptdata').on('hidden.bs.modal', function() {
        setTimeout(function() {
            jQuery('#deptdata').remove();
            jQuery('.modal_backdrop').remove();
        }, 300);
    });

    $(document).ready(function() {
        $('.update_establishment').on('submit', function(event) {
            event.preventDefault();
            if ($('#expected').val() == '') {
                Swal.fire({
                    icon: 'error',
                    //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                    html: '<span class="text-danger">Please enter expected value</span>',
                    showConfirmButton: false,
                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Custom image',
                    width: 300,
                    timer: 3000
                });
            } else {
                Swal.fire({
                    icon: 'info',
                    html: '<span class="text-danger font-weight-bold"> Are you sure you want to update?</span>',
                    showConfirmButton: true,
                    showCancelButton: true,
                    imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Custom image',
                    width: 500,
                    confirmButtonText: 'Yes!'
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            url: "<?php echo URLROOT; ?>/users/update_establishment",
                            method: "POST",
                            data: $('.update_establishment').serialize(),
                            success: function(data) {
                                console.log(data);
                                var response = JSON.parse(data);
                                console.log(response.status);
                                if (response.status == 'success') {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!!!',
                                        html: '<span class="text-danger">' +
                                            response.message + '</span>',
                                        showConfirmButton: false,
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Custom image',
                                        width: 300,
                                        timer: 3000
                                    }).then(function() {
                                        location.reload();
                                    });
                                    $('#sub_form').html(data);
                                } else if (response.status == 'error') {
                                    Swal.fire({
                                        icon: 'error',
                                        //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
                                        html: '<span class="text-danger">' +
                                            response.message + '</span>',
                                        showConfirmButton: false,
                                        imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                                        imageWidth: 100,
                                        imageHeight: 100,
                                        imageAlt: 'Custom image',
                                        width: 300,
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