<?php 
include APPROOT.'/views/includes/head.php';
include APPROOT.'/views/includes/nav.php';
include APPROOT.'/views/includes/sidenav.php';
?>

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
                                        <th>Date Submitted</th>
                                        <th>Students Fullname</th>
                                        <th>Registration No</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Counseling Type</th>
                                        <th>Staff Assigned</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data['total_app'] as $data){ ?>
                                    <tr>
                                        <td><?php echo $data->sub_date?></td>
                                        <td><?php echo strtoupper($data->sname);?></td>
                                        <td nowrap="nowrap"><?php echo strtoupper($data->regno);?></td>
                                        <td><?php echo $data->phone_no?></td>
                                        <td><?php echo strtoupper($data->email);?></td>
                                        <td><?php echo strtoupper($data->council_needed);?></td>
                                        <td><?php echo strtoupper(!empty($data->received_by)?$data->received_by:'Awaiting To Be received');?></td>
                                        
                                        <td><span class="badge <?=((($data->status == 1) || ($data->status == 2))?'badge-danger':'badge-success')?> ">
                                        <?=(($data->status == 0)?'Pending':(($data->status == 1)?'Received by':(($data->status == 2)?'Refered to':(($data->status == 3)?'Completed':''))))?></span></td>
                                        <td>
                                        <?php if($data->status == 0) { ?>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" 
                                        data-toggle="modal" data-original-title="Receive Counseling Applicant" data-target="#approve" title="Receive Counseling Applicant" data-id="<?php echo $data->id;?>">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <?php }elseif($data->status == 1) { ?>
                                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-round" 
                                        data-toggle="modal" data-original-title="Appointed/Not Appointed" data-target="#appoint" title="Appointed/Not Appointed" data-id="<?php echo $data->id;?>">
                                            <i class="zmdi zmdi-plus"></i>
                                        </a>
                                        <?php } ?>
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

<div class="modal fade right" id="approve" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content" style="border-radius: 10px 10px;">
      <div class="modal-header" style="background-color: #1c2473;">
        <h5 class="modal-title text-white p-2">Receive Counseling Applicant</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
    <form method="POST" class="uploadfileapproval">
        <!-- <input type="hidden" name="promoid" id="promoid" value="<?php echo $_POST['promo_id'];?>"> -->
        <!-- <input type="hidden" name="stage_office" id="stage_office" value="<?php echo $office_id;?>"> -->
        <input type="hidden" name="promo_id" id="promo_id">
        <!-- <input type="hidden" name="promo_stage" id="promo_stage"> -->
        <div class="clearfix">
        <div class="funkyradio row">
            <div class="funkyradio-primary col-md-12 col-lg-12 col-sm-12">
                <input type="radio" name="radio" class="radio" id="radio1" value="1" />
                <label for="radio1">Receive</label>
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
                <input type="radio" name="radio1" class="radio" id="radio3" value="3" />
                <label for="radio3">Appointed</label>
            </div>
            <div class="funkyradio-primary col-md-6 col-lg-6 col-sm-6">
                <input type="radio" name="radio1" class="radio" id="radio4" value="4"/>
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

<script>
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


    $(document).ready(function(){
    $('.uploadfileapproval').on('submit',function(event){
      event.preventDefault();
      if(document.getElementById("radio1").checked == false && document.getElementById("radio2").checked == false){
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
      }else{
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
          url:"<?php echo URLROOT; ?>/users/councilact",
          method:"POST",
          data:$('.uploadfileapproval').serialize(),
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
      }
    
    });
});


$(document).ready(function(){
    $('#appt_dis').on('submit',function(event){
      event.preventDefault();
      if(document.getElementById("radio3").checked == false && document.getElementById("radio4").checked == false){
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
      }else{
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
          url:"<?php echo URLROOT; ?>/users/tut_action1",
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
      }
    
    });
});

function assessor(id){
    var data = id;
    console.log(data);
    jQuery.ajax({
    url : "<?php echo URLROOT; ?>/modal/es_modal.php",
    method : "post",
    data : "app_id="+data,
    success : function(data){
    jQuery('body').append(data);
    jQuery('#deptdata').modal('toggle');
        
    },
    error : function(){
        alert("Something went wrong");
    }
    });
}
</script>