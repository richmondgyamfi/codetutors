<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>COLLEGE OF DISTANCE EDUCATION</title>
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/ucclogo1.png" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/dropzone/dropzone.css">
    <!--<link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/bootstrap-select/css/bootstrap-select.css"/>-->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/morrisjs/morris.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/main.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/timeline.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/blog.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/color_skins.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/sweetalert2.css">
    <style>
        .bs-placeholder {
            display: none;
        }

        .btn-simple {
            display: none;
        }

        .funkyradio div {
            clear: both;
            overflow: hidden;
        }

        .funkyradio label {
            width: 100%;
            border-radius: 3px;
            border: 1px solid #D1D3D4;
            font-weight: normal;
        }

        .funkyradio input[type="radio"]:empty,
        .funkyradio input[type="checkbox"]:empty {
            display: none;
        }

        .funkyradio input[type="radio"]:empty~label,
        .funkyradio input[type="checkbox"]:empty~label {
            position: relative;
            line-height: 2.5em;
            text-indent: 3.25em;
            margin-top: 2em;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .funkyradio input[type="radio"]:empty~label:before,
        .funkyradio input[type="checkbox"]:empty~label:before {
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            content: '';
            width: 2.5em;
            background: #D1D3D4;
            border-radius: 3px 0 0 3px;
        }

        .funkyradio input[type="radio"]:hover:not(:checked)~label,
        .funkyradio input[type="checkbox"]:hover:not(:checked)~label {
            color: #888;
        }

        .funkyradio input[type="radio"]:hover:not(:checked)~label:before,
        .funkyradio input[type="checkbox"]:hover:not(:checked)~label:before {
            content: '\2714';
            text-indent: .9em;
            color: #C2C2C2;
        }

        .funkyradio input[type="radio"]:checked~label,
        .funkyradio input[type="checkbox"]:checked~label {
            color: #777;
        }

        .funkyradio input[type="radio"]:checked~label:before,
        .funkyradio input[type="checkbox"]:checked~label:before {
            content: '\2714';
            text-indent: .9em;
            color: #333;
            background-color: #ccc;
        }

        .funkyradio input[type="radio"]:focus~label:before,
        .funkyradio input[type="checkbox"]:focus~label:before {
            box-shadow: 0 0 0 3px #999;
        }

        .funkyradio-default input[type="radio"]:checked~label:before,
        .funkyradio-default input[type="checkbox"]:checked~label:before {
            color: #333;
            background-color: #ccc;
        }

        .funkyradio-primary input[type="radio"]:checked~label:before,
        .funkyradio-primary input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #337ab7;
        }

        .funkyradio-success input[type="radio"]:checked~label:before,
        .funkyradio-success input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #5cb85c;
        }

        .funkyradio-danger input[type="radio"]:checked~label:before,
        .funkyradio-danger input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #d9534f;
        }

        .funkyradio-warning input[type="radio"]:checked~label:before,
        .funkyradio-warning input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #f0ad4e;
        }

        .funkyradio-info input[type="radio"]:checked~label:before,
        .funkyradio-info input[type="checkbox"]:checked~label:before {
            color: #fff;
            background-color: #5bc0de;
        }
    </style>
</head>

<body class="theme-cyan authentication sidebar-collapse">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="48" height="48" alt="Compass"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-translate">
                <h6><a class="" href="javascript:void(0);"><img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="30" alt="Compass"><span class="m-l-10 text-white"><?php echo (($_SERVER['HTTP_HOST'] == 'counselor.ucc.edu.gh') ? 'UCC COUNSELORS' : 'COLLEGE OF DISTANCE EDUCATION
                            COURSE TUTORS APPLICATION') ?></span></a></h6>
                <!-- <a class="text-white" href="#" title="" target="_blank">Topup</a> -->

            </div>
            <div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT ?>/index.php">BACK TO HOMEPAGE</a>
                        <?php if(!isset($_SESSION['centre'])):?>
                            <?php if (isset($_SESSION['phone_no'])) : ?>
                            <a class="nav-link" href="<?php echo URLROOT ?>/users/logout1.php">LOGOUT</a>
                        <?php endif; ?>
                        <?php endif; ?>
                        </li>

                </ul>
            </div>
        </div>
    </nav>