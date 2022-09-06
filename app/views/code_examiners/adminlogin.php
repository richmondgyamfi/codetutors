<?php 
include APPROOT.'/views/includes/shrheader2.php';
?>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(<?php echo URLROOT; ?>/public/images/uccbg.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="<?php echo URLROOT; ?>/code_examiners/login.php">
                    <div class="header">
                        <div class="logo-container">
                            <img src="<?php echo URLROOT; ?>/public/images/ucclogo1.png" width="40" alt="">
                        </div>
						<?php //echo password_hash('123456', PASSWORD_DEFAULT);?>
                        <h5>Log in</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group input-lg">
                            <input type="text" class="form-control" name="username" placeholder="Enter User Name">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <span class="<?=((!empty($data['usernameError']))?'bg-danger p-1':''); ?>">
							<?=((!empty($data['usernameError']))?$data['usernameError']:''); ?>
						</span>
                        <div class="input-group input-lg">
                            <input type="password" placeholder="Password" name="password" class="form-control" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                        <span class="<?=((!empty($data['passwordError']))?'bg-danger p-1':''); ?>">
							<?=((!empty($data['passwordError']))?$data['passwordError']:''); ?>
						</span>
                    </div>
                    <div class="footer text-center">
                        <button id="submit" type="submit" value="submit" class="btn btn-round btn-lg btn-block waves-effect waves-light" 
                        style="background-color:#1c2473;">SIGN IN</button>
                        <!-- <a id="submit" type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">SIGN IN</a> -->
                        <!-- <h6 class="m-t-20"><a href="<?php echo URLROOT; ?>/pages/password_reset" class="link">Forgot Password?</a></h6> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by <a href="#" target="_blank">UCC MIS</a></span>
            </div>
        </div>
    </footer>
</div>

<?php 
include APPROOT."/views/includes/footer.php";
?>

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>