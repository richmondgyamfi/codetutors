<?php 
include APPROOT.'/views/includes/head.php';
include APPROOT.'/views/includes/nav.php';
include APPROOT.'/views/includes/sidenav.php';
?>

<section class="content file_manager">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
            <?php var_dump($data['total_app']);?>
                <h2>File Manager
                <small class="text-muted">Welcome to Compass</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <button class="btn btn-primary btn-icon btn-round hidden-sm-down float-right m-l-10" type="button">
                    <i class="zmdi zmdi-upload"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Compass</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="#">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Document_2017.doc</p>
                                <small>Size: 42KB <span class="date text-muted">Nov 02, 2017</span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="#">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-chart"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Report2016.xls</p>
                                <small>Size: 68KB <span class="date text-muted">Dec 12, 2016</span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="#">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-chart"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Report2016.xls</p>
                                <small>Size: 68KB <span class="date text-muted">Dec 12, 2016</span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="#">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-chart"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Report2016.xls</p>
                                <small>Size: 68KB <span class="date text-muted">Dec 12, 2016</span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="#">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-chart"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Report2016.xls</p>
                                <small>Size: 68KB <span class="date text-muted">Dec 12, 2016</span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                    <div class="file">
                        <a href="#">
                            <div class="hover">
                                <button type="button" class="btn btn-icon btn-icon-mini btn-round btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </button>
                            </div>
                            <div class="icon">
                                <i class="zmdi zmdi-file-text"></i>
                            </div>
                            <div class="file-name">
                                <p class="m-b-5 text-muted">Document_2017.doc</p>
                                <small>Size: 89KB <span class="date text-muted">Dec 15, 2017</span></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
include APPROOT."/views/includes/footer.php";
?>