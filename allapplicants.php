<?php
include APPROOT.'/views/includes/adminhead1.php';
include APPROOT.'/views/includes/adminnav.php';
if(!empty($data['statdata'])){
foreach($data['statdata'] as $allstats){}
}

?>

    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php if(!empty($data['p_error'])): ?>
            <div class="alert <?=(($data['t_error'] == 'error')?'alert-danger':'alert-success')?> alert-dismissible fade show" role="alert">
                <?=$data['p_error'];?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>
                <div class="table-container">
                    <div class="t-header"><?php //var_dump($data['allapp']);?>ALL APPLICANTS</div>
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Reference No</th>
                                    <!--<th>Product Name</th>-->
                                    <th>Student Name</th>
                                    <th>Parent Name & Number</th>
                                    <th>Sex</th>
                                    <th>BirthDate</th>
                                    <th>Class Applied</th>
                                    <th>Campus</th>
                                    <th>Status</th>
                                    <th>Date Applied</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($data['allapp'])): 
                                foreach($data['allapp'] as $prod): ?>
                                <tr>
                                    <td><?=$prod->refno ?></td>
                                    <!--<td><img src="<?=URLROOT.'/assets/img/products/'.$prod->itemimg ?>" width='30' height='30'> <?=$prod->productname ?></td>-->
                                    <td class="text-uppercase"><?=$prod->studname ?></td>
                                    <td class="text-uppercase"><?=$prod->g_fname1.' '.$prod->g_lname1.' - '.$prod->g_homephone1 ?></td>
                                    <td><?=$prod->c_sex ?></td>
                                    <td><?=$prod->c_dob ?></td>
                                    <td><?=$prod->c_class ?></td>
                                    <td><?=$prod->c_campus ?></td>
                                    <td class="<?=$prod->status == 1 ? 'text-primary':'text-danger' ?>"><?=$prod->status == 1 ? 'Applied':'' ?></td>
                                    <td><?=$prod->dateposted.' At '.$prod->timeposted ?></td>
                                    <td>
                                    <?php if($_SESSION['role'] == 1):?>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appoint" data-entry="<?php echo $prod->studname;?>" data-id="<?php echo $prod->id;?>">
                                           Action
                                        </button>
                                    <?php elseif($_SESSION['role'] == 2 || $_SESSION['role'] == 3 || $_SESSION['role'] == 4):?>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#appoint" data-entry="<?php echo $prod->studname;?>" data-id="<?php echo $prod->id;?>">
                                          Action
                                        </button>
                                    <?php endif;?>
                                    <a type="button" class="btn btn-danger btn-sm" href="applicantdata.php?<?php echo $prod->serial;?>">
                                        View Form
                                    </a>
                                    <!-- <button class="btn btn-danger btn-sm">Delete</button> -->
                                    
                                    <!--<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewform" data-entry="<?php echo $prod->itmid;?>" data-id="<?php echo $prod->itmid;?>">
                                        View/Print Form 
                                    </button>-->
                                    </td>                                    
                                </tr>
                                <?php endforeach; 
                                endif;?>										
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->
    <div class="modal fade" id="appoint" tabindex="-1" role="dialog" aria-labelledby="customModalTwoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header form-inline">
                    <h5 class="modal-title" id="customModalTwoLabel">Perform Action For <input type="text" class="form-control-plaintext text-white text-uppercase" id="itemname"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="allapplicants.php" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="studid" id="studid">
                    <div class="form-group">
                        <!-- <p>Category</p> -->
                        <label for="file">Action</label>
                        <select class="form-control selectpicker" required name="status" id="status" required="">
                            <option disabled selected value="">Select Status...</option>
                            <?php if($_SESSION['role'] == 1):?>
                            <option value="0">Release Form</option>
                            <?php elseif($_SESSION['role'] == 2 || $_SESSION['role'] == 3 || $_SESSION['role'] == 4):?>
                            <option value="2">Admit</option>
                            <option value="3">Reject Applicant</option>
                            <?php endif;?>
                        </select>
                    </div>
                    <!--<div class="form-group">
                        <label for="file">Upload Picture</label>
                        <input type="file" name="pic" required id="file" class="form-control">
                    </div>-->
                </div>
                <div class="modal-footer custom">
                    
                    <div class="left-side">
                        <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="submit" class="btn btn-link success">Update</button>
                    </div>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- *************
        ************ Main container end *************
    ************* -->

<?php 
include APPROOT."/views/includes/adminfooter1.php";
?>
<script>
    $("#appoint").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var studid = button.data('id');
        var promo_stage = button.data('entry');

        var modal = $(this);
        modal.find('.modal-body #studid').val(studid);
        modal.find('.modal-header #itemname').val(promo_stage);
    });
</script>
