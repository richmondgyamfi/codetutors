<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar d-print-none">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="javascript:void(0);"><img src="<?php echo URLROOT; ?>/public/images/avatar3.png" alt="User"></a></div>
                    <div class="detail">
                        <h4><?=$_SESSION['fullname']?></h4>
                        <small>(M.D.)</small>                        
                    </div>
                    <!-- <a href="events.html" title="Events"><i class="zmdi zmdi-calendar"></i></a>
                    <a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="contact.html" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a>
                    <a href="chat.html" title="Chat App"><i class="zmdi zmdi-comments"></i></a>-->
            <?php if($_SESSION['role'] == 1): ?>
                    <a href="<?php echo URLROOT; ?>/code_examiners/logout.php" title="Sign out"><i class="zmdi zmdi-power"></i></a>
            <?php elseif($_SESSION['role'] == 2 || $_SESSION['role'] == 3): ?>
                    <a href="<?php echo URLROOT; ?>/users/logout.php" class="mega-menu" data-close="true" title="Sign out"><i class="zmdi zmdi-power"></i></a>
            <?php else: ?>
                    <a href="<?php echo URLROOT; ?>/users/logout.php" title="Sign out"><i class="zmdi zmdi-power"></i></a>
            <?php endif; ?>
                </div>
            </li>
            <li class="header">MAIN</li>
            <?php if($_SESSION['role'] == 1): ?>
                <li><a href="<?php echo URLROOT; ?>/code_examiners/admin_page.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Applications</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo URLROOT; ?>/code_examiners/all_applicants.php">All Applicants</a></li>
                        <li><a href="<?php echo URLROOT; ?>/code_examiners/report.php">Report</a></li>
                        <!-- <li><a href="book-appointment.html">Selected Applicants</a></li> -->
                    </ul>
                </li>
            <?php elseif($_SESSION['role'] == 2 ): ?>
                <li><a href="<?php echo URLROOT; ?>/admin_page.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Counseling </span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo URLROOT; ?>/counseling_stud.php">All Applicants (Students)</a></li>
                        <li><a href="<?php echo URLROOT; ?>/counseling_staff.php">All Applicants (Staff)</a></li>
                        <li><a href="<?php echo URLROOT; ?>/received_stud.php">Assigned Students</a></li>
                        <li><a href="<?php echo URLROOT; ?>/received_staff.php">Assigned Staff</a></li>
                        <li><a href="<?php echo URLROOT; ?>/allassigned_stud.php">Applicants Assigned (Students)</a></li>
                        <li><a href="<?php echo URLROOT; ?>/allassigned_staff.php">Applicants Assigned (Staff)</a></li>
                        <!-- <li><a href="<?php echo URLROOT; ?>/reassigned.php">Reassigned Students</a></li> -->
                        <!--<li><a href="<?php echo URLROOT; ?>/report.php">Report</a></li>-->
                        <!-- <li><a href="book-appointment.html">Selected Applicants</a></li> -->
                    </ul>
                </li>
            <?php elseif($_SESSION['role'] == 3): ?>
                <li><a href="<?php echo URLROOT; ?>/admin_page.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Counseling </span> </a>
                    <ul class="ml-menu">
                        <!-- <li><a href="<?php echo URLROOT; ?>/counseling_stud.php">All Applicants</a></li> -->
                        <li><a href="<?php echo URLROOT; ?>/received_stud.php">Assigned Students</a></li>
                        <li><a href="<?php echo URLROOT; ?>/received_staff.php">Assigned Staff</a></li>
                        <!-- <li><a href="<?php echo URLROOT; ?>/reassigned.php">Reassigned Students</a></li> -->
                        <!--<li><a href="<?php echo URLROOT; ?>/report.php">Report</a></li>-->
                        <!-- <li><a href="book-appointment.html">Selected Applicants</a></li> -->
                    </ul>
                </li>
                <?php elseif($_SESSION['role'] == 4): ?>
                <li><a href="<?php echo URLROOT; ?>/admin_page.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Counseling </span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo URLROOT; ?>/counseling_stud.php">All Applicants (Students)</a></li>
                        <li><a href="<?php echo URLROOT; ?>/counseling_staff.php">All Applicants (Staff)</a></li>
                        <li><a href="<?php echo URLROOT; ?>/allassigned_stud.php">Applicants Assigned (Students)</a></li>
                        <li><a href="<?php echo URLROOT; ?>/allassigned_staff.php">Applicants Assigned (Staff)</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?php echo URLROOT; ?>/admin_page.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>            
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-account-o"></i><span>Applications</span> </a>
                    <ul class="ml-menu">
                        <li><a href="<?php echo URLROOT; ?>/all_applicants.php">All Applicants</a></li>
                        <li><a href="<?php echo URLROOT; ?>/report.php">Report</a></li>
                        <!-- <li><a href="book-appointment.html">Selected Applicants</a></li> -->
                    </ul>
                </li>
            <?php endif; ?>
            
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar d-print-none">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#chat"><i class="zmdi zmdi-comments"></i></a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity">Activity</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active slideRight" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                        </li>                   
                        <li data-theme="blue">
                            <div class="blue"></div>
                        </li>
                        <li data-theme="cyan" class="active">
                            <div class="cyan"></div>                    
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>                    
                        </li>
                    </ul>                    
                </div>
                <div class="card">
                    <h6>Left Menu</h6>
                    <ul class="list-unstyled theme-light-dark">
                        <li>
                            <div class="t-light btn btn-default btn-simple btn-round">Light</div>
                        </li>
                        <li>
                            <div class="t-dark btn btn-default btn-round">Dark</div>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1">Report Panel Usage</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox2" type="checkbox" checked="">
                                <label for="checkbox2">Email Redirect</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox3" type="checkbox" checked="">
                                <label for="checkbox3">Notifications</label>
                            </div>                        
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox4" type="checkbox" checked="">
                                <label for="checkbox4">Auto Updates</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <h6>Account Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <div class="checkbox">
                                <input id="checkbox5" type="checkbox" checked="">
                                <label for="checkbox5">Offline</label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox">
                                <input id="checkbox6" type="checkbox" checked="">
                                <label for="checkbox6">Location Permission</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>                
        </div>       
        <div class="tab-pane right_chat pullUp" id="chat">
            <div class="slim_scroll">
                <div class="card">
                    <div class="search">                        
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Recent</h6>
                    <ul class="list-unstyled">
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia</span>
                                        <span class="message">There are many variations of passages of Lorem Ipsum available</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson</span>
                                        <span class="message">All the Lorem Ipsum generators on the</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="offline">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Isabella</span>
                                        <span class="message">Contrary to popular belief, Lorem Ipsum</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="me">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">John</span>
                                        <span class="message">It is a long established fact that a reader</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>
                        <li class="online">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander</span>
                                        <span class="message">Richard McClintock, a Latin professor</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>                            
                        </li>                        
                    </ul>
                </div>
                <div class="card">
                    <h6>Contacts</h6>
                    <ul class="list-unstyled">
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar10.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar6.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar7.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar8.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar9.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar4.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="online inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="offline inlineblock">
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="<?php echo URLROOT; ?>/public/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane slideRight" id="activity">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Recent Activity</h6>
                    <ul class="list-unstyled activity">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="zmdi zmdi-cake bg-blue"></i>                    
                                <div class="info">
                                    <h4>Admin Birthday</h4>                    
                                    <small>Will be Jan 01</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="zmdi zmdi-file-text bg-red"></i>
                                <div class="info">
                                    <h4>Heart Surgeries</h4>                    
                                    <small>Will be Jan 02</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="zmdi zmdi-account-box-phone bg-green"></i>
                                <div class="info">
                                    <h4>Medical Treatment</h4>                    
                                    <small>Will be Jan 12</small>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="zmdi zmdi-email bg-amber"></i>
                                <div class="info">
                                    <h4>New Email</h4>
                                    <small>Will be Jan 18</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <h6>Project Status</h6>
                    <div class="progress-container progress-primary">
                        <span class="progress-badge">Heart Surgeries</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100" style="width: 86%;">
                                <span class="progress-value">86%</span>
                            </div>
                        </div>                        
                        <ul class="list-unstyled team-info">
                            <li class="m-r-15"><small>Team</small></li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar2.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar3.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar4.jpg" alt="Avatar">
                            </li>                            
                        </ul>
                    </div>
                    <div class="progress-container">
                        <span class="progress-badge">Medical</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                <span class="progress-value">45%</span>
                            </div>
                        </div>
                        <ul class="list-unstyled team-info">
                            <li class="m-r-15"><small>Team</small></li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar10.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar9.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar8.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar7.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar6.jpg" alt="Avatar">
                            </li>
                        </ul>
                    </div>
                    <div class="progress-container progress-warning">
                        <span class="progress-badge">Pharmacy</span>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">
                                <span class="progress-value">29%</span>
                            </div>
                        </div>
                        <ul class="list-unstyled team-info">
                            <li class="m-r-15"><small>Team</small></li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar5.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar2.jpg" alt="Avatar">
                            </li>
                            <li>
                                <img src="<?php echo URLROOT; ?>/public/images/xs/avatar7.jpg" alt="Avatar">
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>