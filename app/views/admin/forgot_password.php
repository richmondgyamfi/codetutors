<?php
include APPROOT.'/views/includes/head.php';
?>

<body class="theme-cyan authentication sidebar-collapse">
<!-- End Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <a class="text-primary" href="#" title="">IOE TOPUP</a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.staffportal.ucc.edu.gh">Staff Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.osis.ucc.edu.gh">UCOSIS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.xpay.ucc.edu.gh">Xpay</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.ucc.edu.gh">UCC Website</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(<?php echo URLROOT ?>/public/images/uccbg.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="" action="">
                    <div class="header">
                        <div class="logo-container">
                            <img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="40" alt="">
                        </div>
                        <h5>Forgot Password?</h5>
                        <span>Enter your e-mail address below to reset your password.</span>
                    </div>
                    <div class="content">
                        <div class="input-group input-lg">
                            <input type="text" class="form-control" placeholder="Enter UCC Email">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <a href="index.html" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">SUBMIT</a>
                        <h6 class="m-t-20"><a href="<?php echo URLROOT; ?>/users/login" class="link">Go Back</a></h6>
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
                    <!-- <li><a href="#">About Us</a></li> -->
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
</script>
</body>
</html>