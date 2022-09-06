<?php //require("resources/Secure.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $config['application_code_name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="public/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="public/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="public/css/ucc_coll_inst.css" rel="stylesheet"/>
    <link href="public/css/reg_css.css" rel="stylesheet"/>
    <link href="public/css/printPage.css" rel="stylesheet"/>
    <link href="public/smoke.js-master/smoke.css" rel="stylesheet"/>
    
    <!-- DataTable CSS -->
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/> 
    <script src="public/smoke.js-master/smoke.js" type="text/javascript"></script> 
    <script src="public/jquery/jquery-3.2.1.min.js"></script> 
    <script src="public/js/score_sheet.js"></script>
    <script src="public/js/score_sheet_coll.js"></script>
    <script src="public/js/app_casis.js"></script> 
    
    
    <!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   
       
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>-->
   <script src="public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

   <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-22318036-11"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-22318036-11');
    </script>


    <style type="text/css">
        @media print{
        .rmvIcon{ display:none; }
        }

        .app_footer{
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #006;
            color: white;
            text-align: center;
            height:35px;
            position: fixed;
            padding-bottom:8px;
            padding-top:8px;
            font-size:11px;
        }
        
        @media only screen and (max-device-width: 480px) {  
            .app_footer{
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #006;
                color: white;
                text-align: center;
                height:35px;
                position: fixed;
                padding-bottom:8px;
                padding-top:8px;
                font-size:8px;
            }
        }
    </style>   
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color:#39F;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?php echo $config['application_code_name']; ?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php if($_SESSION['USER_ROLE'] == 3){ ?> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                College Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Admissions&A=1">Admitted Applicants</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Admissions&S=1">Enrolled Students</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=views/admissions/applicant_details">Search Admitted Applicant</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Admissions&M=1">Print Matriculation List</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Registration&Mounted=1">Mounted Electives </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Registration&Courses=1">Mounted Courses </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=views/registration/reg_ini">Registration </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=views/registration/reg_ini_resit">Resit Registration </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="/load/index.php" target="_blank">Load Student Photos</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Assessment Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Assessment&CAS=1">Assessment Sheets</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Assessment&STA=1">Completed Sheets Stats </a></li>
                                
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Finance Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Finance">Approve Students</a></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Blockstudent">Block Students Results</a></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Result_broadsheet">Results Broadsheet</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Students Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Students&filter=name">Search Student</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=views/students/change_password">Change Portal Password</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=views/students/stud_transcript">Unofficial Transcript</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Students">CGPA List</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if($_SESSION['USER_ROLE'] == 5){ ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Vice Principal<span class="caret"></span>
                            </a>
                            
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Admissions&A=1">Admitted Applicants</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Registration&Mounted=1">Mounted Electives </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Accounts&C=1">Create Account </a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Common Statistics<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Statistics&PL100=1">Progression Stats (L100 - L200)</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            Documents Menu<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="public/casis-manual.pdf" target="_blank">User Manual</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a class="dropdown-item" href="public/bed_course_structure.pdf" target="_blank">Course Structure</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a class="dropdown-item" href="public/second.pdf" target="_blank">Course Structure for Year two, Semester Two</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a class="dropdown-item" href="public/third.pdf" target="_blank">Course Structure for Year Three, Semester Two</a></li>
                            <li role="separator" class="divider"></li>
                            
                        </ul>
                    </li>                        
                </ul>

                <?php if($_SESSION['USER_ROLE'] == 1){ ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                System Admin<span class="caret"></span>
                            </a>
                        
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=controllers/Admissions&A=1">Admitted Applicants</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Admissions&S=1">Enrolled Students</a></li>
                                 <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Accounts&C=1">Create Account </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="dropdown-item" href="index.php?page=controllers/Accounts&S=1">Search Account </a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>

                <?php if($_SESSION['USER_ROLE'] == 7){ ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            
                            
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                               Publish Result Menu<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- <li><a class="dropdown-item" href="index.php?page=controllers/Finance">Approve Students</a></li> -->
                                <li><a class="dropdown-item" href="index.php?page=controllers/Blockstudent">Block Students Results</a></li>
                                                                <li><a class="dropdown-item" href="index.php?page=controllers/Result_broadsheet">Results Broadsheet</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } ?>
            
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-user"></i>
                            <?php echo $_SESSION['USER_FULLNAME']; ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">            
                            <li><a href="index.php?page=views/main/change_password">Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.php?page=controllers/Logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
        
    <br/>
    <br/>
    <br/>
    <br/>
