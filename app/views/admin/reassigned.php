<?php 
include APPROOT.'/views/includes/head.php';
include APPROOT.'/views/includes/nav.php';
include APPROOT.'/views/includes/sidenav.php';

$condata = $data['counsel_users'];
?>
<style>
#sno {border-style: solid;
  border-color: #d5d5d5;}
#sno:hover {background-color: #d5d5d5;}

#comments {border-style: solid;
  border-color: #d5d5d5;}
#comments:hover {background-color: #d5d5d5;}
</style>

<section class="content d-print-none">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            <?php //var_dump($data['total_app']);?>
                <h2>All Applicants
                <small class="text-muted">Welcome! <?=$_SESSION['fullname']?></small>
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
                                        <th>Applicants Fullname</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Counseling Type</th>
                                        <th>Staff Assigned</th>
                                        <th>Status</th>
                                        <th>Date Submitted</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data['total_app'] as $data_con){ ?>
                                    <tr>
                                        <td><?php echo strtoupper($data_con->sname);?></td>
                                        <td><?php echo $data_con->phone_no?></td>
                                        <td><?php echo strtoupper($data_con->email);?></td>
                                        <td><?php echo strtoupper($data_con->council_needed);?></td>
                                        <td><?php echo strtoupper(!empty($data_con->received_by)?$data_con->received_by:'Awaiting To Be received');?></td>
                                        
                                        <td>
                                        <a href="#" onclick="promo_statushr(<?php echo $data_con->id;?>)" class="badge <?=(($data_con->status == 1)?'badge-success':(($data_con->status == 2)?'badge-info':(($data_con->status == 3)?'badge-warning':'badge-danger')))?>" title="View Status">
                                        <?=(($data_con->status == 0)?'Pending':(($data_con->status == 1)?'Assigned':(($data_con->status == 2)?'Refered':(($data_con->status == 3)?'Counseling Ongoing':(($data_con->status == 4)?'Completed':'')))))?>
                                        <?=$data_con->status?>    
                                    </a>
                                        </td>
                                        <td><?php echo $data_con->sub_date?></td>
                                        <td>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" 
                                        data-toggle="modal" data-original-title="Appointed/Not Appointed" data-target="#appoint" title="Appointed/Not Appointed" data-id="<?php echo $data_con->id;?>">
                                            <i class="zmdi zmdi-plus"></i>
                                        </a>
                                        </td>
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
include APPROOT."/views/includes/footer.php";
?>


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
        <div class="col-md-12 col-lg-12 col-sm-12" id="radio1">
            <label for="centre_coor" class="font-weight-bold text-uppercase">Select Status</label>
            <select class="pb-2 d-block" style="width:100%;" onchange="showDiv(this)" id="radio1" name="radio1">
                <option value="" selected disabled>Select Action on Article</option>
                <option value="2">Refer</option>
                <option value="3">Progress Report</option>
                <option value="4">Completed</option>
            </select>
        </div>
        <div id="ongo" style="display:none;">
        <div class="form-group">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <label for="sno" class="font-weight-bold text-uppercase">Staff Number </label>
                <select class="pb-2 d-block" style="width:100%;" onchange="showDiv(this)" id="sno" name="sno">
                    <option value="" selected disabled>Select Staff Number</option>
                    <?php foreach($condata as $data1){ ?>
                    <option value="<?php echo $data1->username;?>"><?php echo strtoupper($data1->fullname);?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        </div>
        <div class="form-group">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <label for="comments" class="font-weight-bold text-uppercase">Comment </label>
                <textarea class="textarea_editor form-control" name="comments" id="comments" placeholder="Type Comments Here ..."></textarea>
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

<script>
    function promo_statushr(id){
        var data = id;
        jQuery.ajax({
        url : "<?php echo URLROOT; ?>/modal/modal_status.php",
        method : "post",
        // data : "promo_id="+data+','+'1',
        data : "app_id="+data,
        success : function(data){
            jQuery('body').append(data);
            jQuery('.status_modal').modal('toggle');
        },
        error : function(){
            alert("Something went wrong");
        }
        });
    }

    $("#approve").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var promo_id = button.data('id');
        // var promo_stage = button.data('entry');

        var modal = $(this);
        modal.find('.modal-body #promo_id').val(promo_id);
        // modal.find('.modal-body #promo_stage').val(promo_stage);
    });

    $("#appoint").on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var promo_id1 = button.data('id');
        // var promo_stage = button.data('entry');

        var modal = $(this);
        modal.find('.modal-body #promo_id1').val(promo_id1);
        // modal.find('.modal-body #promo_stage').val(promo_stage);
    });

    function showDiv(select){
        if(select.value == 2){
        var stval = document.getElementById('ongo').style.display = "block";
            // alert('select');
        }else if(select.value == 3){
        var stval = document.getElementById('ongo').style.display = "none";
            // alert('select1');
        }
    }


$(document).ready(function(){
    $('#appt_dis').on('submit',function(event){
      event.preventDefault();
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
        }).then(function(result){
        if (result.value) {
        $.ajax({
          url:"<?php echo URLROOT; ?>/users/counselup",
          method:"POST",
          data:$('#appt_dis').serialize(),
          success:function(data)
          {
            console.log(data);
            var response = JSON.parse(data);
            console.log(response.status);
                if(response.status == 'success'){
                Swal.fire({
                title: 'Success!!!',
                html: '<span class="text-danger">'+response.message+'</span>',
                showConfirmButton: false,
                width: 300,
                imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
                imageWidth: 100,
                imageHeight: 100,
                imageAlt: 'Loading image',
                timer: 3000
                }).then(function(){
                    location.reload();
                });
                }else if(response.status == 'error'){
                Swal.fire({
                title: 'Oooops!!!',
                html: '<span class="text-danger">'+response.message+'</span>',
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
      
    
    });
});

</script>