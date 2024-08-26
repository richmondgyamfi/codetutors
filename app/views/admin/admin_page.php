<?php 
include APPROOT.'/views/includes/head.php';
include APPROOT.'/views/includes/nav.php';
include APPROOT.'/views/includes/sidenav.php';
// include APPROOT.'/views/includes/chat.php';
foreach($data['total_app'] as $totals){}
?>
<!-- Main Content -->
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            <?php //var_dump($data['total_app']);?>
                <h2>
                <?php if($_SESSION['role'] == 2 || $_SESSION['role'] == 3): ?>
                    <?=(($_SESSION['role'] == '3')?'':(($_SESSION['role'] == '2')?'ADMIN':''))?> Counseling 
                    <?php endif; ?>
                    Dashboard : <?=$_SESSION['centre'] ?>
                <small class="text-muted">Welcome! <?=$_SESSION['fullname']?>
                <?php 
                    //  var_dump($data['total_cen']);
                    //  echo 'jdnsknjsnad';
                     ?></small>
                </h2>
            </div>
            <!-- <div class="col-lg-5 col-md-6 col-sm-12">                
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Compass</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>                
            </div> -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-sm-12">
                <div class="card">                   
                    <?php if($_SESSION['role'] == 2 || $_SESSION['role'] == 3): ?>
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div class="body">
                                <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($data['allcounsel_stud']))?count($data['allcounsel_stud']):'0')?>" data-speed="1000" data-fresh-interval="1">
                                <?=((!empty($data['allcounsel_stud']))?count($data['allcounsel_stud']):'0')?></h2>
                                <p class="text-muted">Total Applied</p>
                                <span id="linecustom1">1,4,2,6,5,7,5,8,5,2</span>
                            </div>
                        </div>                        
                        <!-- <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div class="body">
                                <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($data['counsel_studapp']))?count($data['counsel_studapp']):'0')?>" data-speed="1000" data-fresh-interval="1">
                                <?=((!empty($data['counsel_studapp']))?count($data['counsel_studapp']):'0')?>
                                </h2>
                                <p class="text-muted ">Newly Applied</p>
                                <span id="linecustom6">2,9,5,5,8,5,4,2,6</span>
                            </div>
                        </div> -->
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div class="body">
                                <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($data['counselreceived']))?count($data['counselreceived']):'0')?>" data-speed="1000" data-fresh-interval="1">
                                <?=((!empty($data['counselreceived']))?count($data['counselreceived']):'0')?>
                                </h2>
                                <p class="text-muted ">Total Assigned</p>
                                <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div class="body">
                                <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($data['counselreceived']))?count($data['counselreceived']):'0')?>" data-speed="1000" data-fresh-interval="1">
                                <?=((!empty($data['counselreceived']))?count($data['counselreceived']):'0')?>
                                </h2>
                                <p class="text-muted">Awaiting Applicants</p>
                                <span id="linecustom3">1,5,3,6,6,3,6,8,4,7</span>
                            </div>
                        </div>
                    </div><br><hr><br>
                    <div class="row clearfix">
                        
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div class="body">
                                <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($data['counsel_completed']))?count($data['counsel_completed']):'0')?>" data-speed="1000" data-fresh-interval="1">
                                <?=((!empty($data['counsel_completed']))?count($data['counsel_completed']):'0')?>
                                </h2>
                                <p class="text-muted">Total Completed</p>
                                <span id="linecustom4">1,5,3,6,6,3,6,8,4,7</span>
                            </div>
                        </div>
                        <?php foreach($data['counsels_stat'] as $counsels_stat): ?>
                        <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                            <div class="body">
                                <h2 class="number count-to m-t-0" data-from="0" data-to="<?=$counsels_stat->totalno?>" data-speed="1000" data-fresh-interval="1">
                                <?=$counsels_stat->totalno?></h2>
                                <p class="text-muted">Number of Students Counseled by: <br><b><?=$counsels_stat->fullname?></b></p>
                                <!-- <span id="linecustom5">1,5,3,6,6,3,6,8,4,7</span> -->
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php else: ?>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($totals->total_ap))?$totals->total_ap:'0')?>" data-speed="1000" data-fresh-interval="1">
                                    <?=((!empty($totals->total_ap))?$totals->total_ap:'0')?></h2>
                                    <p class="text-muted">Total Applicant</p>
                                    <span id="linecustom1">1,4,2,6,5,7,5,8,5,2</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($totals->new_ap))?$totals->new_ap:'0')?>" data-speed="1000" data-fresh-interval="1">
                                    <?=((!empty($totals->new_ap))?$totals->new_ap:'0')?>
                                    </h2>
                                    <p class="text-muted ">New Applicants</p>
                                    <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                <div class="body">
                                    <h2 class="number count-to m-t-0" data-from="0" data-to="<?=count($data['com_app'])?>" data-speed="1000" data-fresh-interval="1">
                                    <?=count($data['com_app'])?>
                                    </h2>
                                    <p class="text-muted ">Awaiting Applicants</p>
                                    <span id="linecustom6">2,9,5,5,8,5,4,2,6</span>
                                </div>
                            </div>
                            </div><br><hr><br>
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <div class="body">
                                        <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($totals->selected_ap))?$totals->selected_ap:'0')?>" data-speed="1000" data-fresh-interval="1">
                                        <?=((!empty($totals->selected_ap))?$totals->selected_ap:'0')?>
                                        </h2>
                                        <p class="text-muted">Selected Applicants</p>
                                        <span id="linecustom3">1,5,3,6,6,3,6,8,4,7</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <div class="body">
                                        <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($totals->rejected_ap))?$totals->rejected_ap:'0')?>" data-speed="1000" data-fresh-interval="1">
                                        <?=((!empty($totals->rejected_ap))?$totals->rejected_ap:'0')?>
                                        </h2>
                                        <p class="text-muted">Rejected Applicant</p>
                                        <span id="linecustom4">1,5,3,6,6,3,6,8,4,7</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                                    <div class="body">
                                        <h2 class="number count-to m-t-0" data-from="0" data-to="<?=((!empty($totals->appointed_ap))?$totals->appointed_ap:'0')?>" data-speed="1000" data-fresh-interval="1">
                                        <?=((!empty($totals->appointed_ap))?$totals->appointed_ap:'0')?></h2>
                                        <p class="text-muted">Appointed Applicant</p>
                                        <span id="linecustom5">1,5,3,6,6,3,6,8,4,7</span>
                                    </div>
                                </div>
                                
                            </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Patients</strong> Status</h2>
                        <ul class="header-dropdown">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right slideUp float-right">
                                    <li><a href="javascript:void(0);">Edit</a></li>
                                    <li><a href="javascript:void(0);">Delete</a></li>
                                    <li><a href="javascript:void(0);">Report</a></li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <p class="float-md-right">
                            <span class="badge badge-success">3 Admit</span>
                            <span class="badge badge-default">2 Discharge</span>
                        </p>
                        <div class="table-responsive table_middel">
                            <table class="table m-b-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Patients</th>
                                        <th>Adress</th>
                                        <th>START Date</th>
                                        <th>END Date</th>
                                        <th>Priority</th>
                                        <th>Progress</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="<?php echo URLROOT; ?>/public/images/xs/avatar3.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span>John</span></td>
                                        <td><span class="text-info">70 Bowman St. South Windsor, CT 06074</span></td>
                                        <td>Sept 13, 2017</td>
                                        <td>Sept 16, 2017</td>
                                        <td><span class="badge badge-warning">MEDIUM</span></td>
                                        <td><div class="progress m-b-0 m-t-10">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"> <span class="sr-only">40% Complete</span> </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-success">Admit</span></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><img src="<?php echo URLROOT; ?>/public/images/xs/avatar1.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span>Jack Bird</span></td>
                                        <td><span class="text-info">123 6th St. Melbourne, FL 32904</span></td>
                                        <td>Sept 13, 2017</td>
                                        <td>Sept 22, 2017</td>
                                        <td><span class="badge badge-warning">MEDIUM</span></td>
                                        <td><div class="progress m-b-0 m-t-10">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> <span class="sr-only">100% Complete</span> </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-default">Discharge</span></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><img src="<?php echo URLROOT; ?>/public/images/xs/avatar4.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span>Dean Otto</span></td>
                                        <td><span class="text-info">123 6th St. Melbourne, FL 32904</span></td>
                                        <td>Sept 13, 2017</td>
                                        <td>Sept 23, 2017</td>
                                        <td><span class="badge badge-warning">MEDIUM</span></td>
                                        <td><div class="progress m-b-0 m-t-10">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;"> <span class="sr-only">15% Complete</span> </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-success">Admit</span></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><img src="<?php echo URLROOT; ?>/public/images/xs/avatar2.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span>Jack Bird</span></td>
                                        <td><span class="text-info">4 Shirley Ave. West Chicago, IL 60185</span></td>
                                        <td>Sept 17, 2017</td>
                                        <td>Sept 16, 2017</td>
                                        <td><span class="badge badge-success">LOW</span></td>
                                        <td><div class="progress m-b-0 m-t-10">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"> <span class="sr-only">100% Complete</span> </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-default">Discharge</span></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td><img src="<?php echo URLROOT; ?>/public/images/xs/avatar5.jpg" class="rounded-circle width30 m-r-15" alt="profile-image"><span>Hughe L.</span></td>
                                        <td><span class="text-info">4 Shirley Ave. West Chicago, IL 60185</span></td>
                                        <td>Sept 18, 2017</td>
                                        <td>Sept 18, 2017</td>
                                        <td><span class="badge badge-danger">HIGH</span></td>
                                        <td><div class="progress m-b-0 m-t-10">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"> <span class="sr-only">85% Complete</span> </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-success">Admit</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>                            
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>
<?php 
include APPROOT."/views/includes/footer.php";
?>