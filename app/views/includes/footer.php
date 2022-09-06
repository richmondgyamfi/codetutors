<!-- Jquery Core Js --> 
<script src="<?php echo URLROOT ?>/public/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="<?php echo URLROOT ?>/public/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->
<script src="<?php echo URLROOT ?>/public/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js -->

<script src="<?php echo URLROOT ?>/public/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="<?php echo URLROOT ?>/public/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="<?php echo URLROOT ?>/public/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->
<script src="<?php echo URLROOT ?>/public/bundles/countTo.bundle.js"></script> <!-- Jquery CountTo Plugin Js -->
<script src="<?php echo URLROOT ?>/public/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="<?php echo URLROOT ?>/public/bundles/datatablescripts.bundle.js"></script> <!-- Sparkline Plugin Js -->

<script src="<?php echo URLROOT ?>/public/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo URLROOT ?>/public/js/pages/tables/jquery-datatable.js"></script> <!-- Sparkline Plugin Js -->
<script src="<?php echo URLROOT ?>/public/js/pages/index.js"></script>
<script src="<?php echo URLROOT ?>/public/js/pages/charts/jquery-knob.js"></script>
<script src="<?php echo URLROOT ?>/public/js/bootstrap-datepicker.js"></script>
<script src="<?php echo URLROOT ?>/public/js/sweetalert2.js"></script>
<!-- <script src="<?php echo URLROOT ?>/public/js/fileinput.js"></script> -->

<script>
$(document).ready(function(){
    $('#resetpass').on('submit',function(event){
      event.preventDefault();
      if ($('#old_password').val() == '') {
        Swal.fire({
            icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">Please enter your old password</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            });
      }else if ($('#new_password').val() == ''){
        Swal.fire({
            icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">Please enter your new password</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            });
    }else if ($('#repeat_password').val() == ''){
        Swal.fire({
            icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">Repeat new password</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            });
    }
    else{
        Swal.fire({
            icon: 'info',
            html: '<span class="text-danger font-weight-bold"> Are you sure you want to reset your password?</span>',
            showConfirmButton: true,
            showCancelButton: true,
            imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Custom image',
            width: 500,
            confirmButtonText: 'Yes!'
        }).then(function(result){
        if (result.value) {
        $.ajax({
          url:"<?php echo URLROOT; ?>/users/resetpassword.php",
          method:"POST",
          data:$('#resetpass').serialize(),
          success:function(data)
          {
            console.log(data);
            var response = JSON.parse(data);
            console.log(response.status);
            if(response.status == 'success'){
              Swal.fire({
                icon: 'success',
              title: 'Success!!!',
              html: '<span class="text-danger">'+response.message+'</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            }).then(function(){
                location.reload();
            });
        //   $('#sub_form').html(data);
            }else if(response.status == 'error'){
              Swal.fire({
                icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">'+response.message+'</span>',
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


$(document).ready(function(){
    $('#create_u').on('submit',function(event){
      event.preventDefault();
      if ($('#fullname').val() == '') {
        Swal.fire({
            icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">Please enter fullname of user</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            });
      }else if ($('#uname').val() == ''){
        Swal.fire({
            icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">Please enter username</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            });
    }else if ($('#password').val() == ''){
        Swal.fire({
            icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">Please enter users password</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            });
    }
    else{
        Swal.fire({
            icon: 'info',
            html: '<span class="text-danger font-weight-bold"> Are you sure you want to create this user?</span>',
            showConfirmButton: true,
            showCancelButton: true,
            imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Custom image',
            width: 500,
            confirmButtonText: 'Yes!'
        }).then(function(result){
        if (result.value) {
        $.ajax({
          url:"<?php echo URLROOT; ?>/users/createuser.php",
          method:"POST",
          data:$('#create_u').serialize(),
          success:function(data)
          {
            console.log(data);
            var response = JSON.parse(data);
            console.log(response.status);
            if(response.status == 'success'){
              Swal.fire({
                icon: 'success',
              title: 'Success!!!',
              html: '<span class="text-danger">'+response.message+'</span>',
              showConfirmButton: false,
              imageUrl: '<?php echo URLROOT ?>/public/images/ucclogo1.png',
              imageWidth: 100,
              imageHeight: 100,
              imageAlt: 'Custom image',
              width: 300,
              timer: 3000
            }).then(function(){
                location.reload();
            });
        //   $('#sub_form').html(data);
            }else if(response.status == 'error'){
              Swal.fire({
                icon: 'error',
            //   title: '<span class="text-danger font-weight-bold">Error!!!</span>',
              html: '<span class="text-danger">'+response.message+'</span>',
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