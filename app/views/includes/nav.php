<!-- Top Bar -->
<nav class="navbar d-print-none">
    <div class="col-12">        
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo URLROOT; ?>/index.php"><img src="<?php echo URLROOT; ?>/public/images/ucclogo1.png" 
            width="30" alt="Compass"><span class="m-l-10 txt"><?php if($_SESSION['role'] == 1){?> CoDE EXAMINERS <?php }elseif($_SESSION['role'] == 2){?>CoDE COUNSELORs  <?php }else{ ?> CoDE TUTION <?php } ?> </span></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>            
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="javascript:void(0);" class="mega-menu" data-toggle="modal" 
            data-original-title="password_reset" data-target="#resetpassword" title="Reset Password">
                <i class="zmdi zmdi-key"></i>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0);" class="mega-menu" data-toggle="modal" 
            data-original-title="create_user" data-target="#createuser" title="Create User">
                <i class="zmdi zmdi-account-o"></i>
            </a>
        </li>
            <!-- <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu dropdown-menu-right slideDown">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <div class="menu-info">
                                    <h4>4 Sales made</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 22 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> Deleted account</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> Changed name</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 2 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Commented your post</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 4 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-refresh"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Updated status</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-blue"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings Updated</h4>
                                    <p> <i class="zmdi zmdi-time"></i> Yesterday </p>
                                </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li> -->
            <li>
                <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            </li>
            <li>
            <?php if($_SESSION['role'] == 1): ?>
                <a href="<?php echo URLROOT; ?>/code_examiners/logout.php" class="mega-menu" data-close="true" title="Sign out"><i class="zmdi zmdi-power"></i></a>
            <?php elseif($_SESSION['role'] == 2): ?>
                    <a href="<?php echo URLROOT; ?>/users/logout.php" class="mega-menu" data-close="true" title="Sign out"><i class="zmdi zmdi-power"></i></a>
            <?php else: ?>
                    <a href="<?php echo URLROOT; ?>/users/logout.php" class="mega-menu" data-close="true" title="Sign out"><i class="zmdi zmdi-power"></i></a>
            <?php endif; ?>
            </li>
            <!--<li><a href="<?php echo URLROOT; ?>/users/logout.php" class="mega-menu" data-close="true"><i class="zmdi zmdi-power mr-3"></i></a></li>-->
        </ul>
    </div>
</nav>

<div class="modal fade right" id="resetpassword" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-scrollable" role="document">
    <div class="modal-content" style="border-radius: 10px 10px;">
      <div class="modal-header" style="background-color: #1c2473;">
        <h5 class="modal-title text-white p-2">Reset Password</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
    <form method="POST" class="resetpass" id="resetpass">
        <div class="clearfix">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="old_password">Current Password</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="new_password">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="repeat_password">Confirm New Password</label>
                <input type="password" class="form-control" id="repeat_password" name="repeat_password">
            </div>
        </div>
        </div>
        <div class="row mb-4 mt-5">
        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
            <button class="btn btn-primary btn-round btn-block mx-auto" type="submit">
            Reset</button>
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


<div class="modal fade right" id="createuser" tabindex="-1" role="dialog" aria-labelledby="approval_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content" style="border-radius: 10px 10px;">
      <div class="modal-header" style="background-color: #1c2473;">
        <h5 class="modal-title text-white p-2">Create User</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
    <form method="POST" class="create_u" id="create_u">
        <div class="clearfix">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="fullname">Fullname</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="uname">Username</label>
                <input type="text" class="form-control" id="uname" name="uname">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="form-group">
                <label class="fieldlabels text-uppercase font-weight-bold" for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        </div>
        <div class="row mb-4 mt-5">
        <div class="col-md-6 col-lg-6 col-sm-6 mx-auto">
            <button class="btn btn-primary btn-round btn-block mx-auto" type="submit">
            Create User</button>
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
