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
<link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
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
    .bs-placeholder{
    display: none;
}
.btn-simple{
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

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
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

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
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

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}

@media print{
	*{
		/* background: transparent !important; */
		color: #000 !important;
		/* box-shadow: none !important;
		text-shadow: none !important; */
		margin: 2px !important;
		padding: 0px !important;
		outline: 0px !important;
		font-size: 15px !important;
		border: 0px !important;
	}
	.imh{
		width: auto;
		height: auto;
	}
    .check{
        display: block !important;
    }
	.sd{
	float: right !important;
	position: relative !important;
  width: 30% !important;
	margin-left: 20px !important;
	}
    .sd1{
	float: right !important;
	position: relative !important;
  width: 20% !important;
	margin-left: 5px !important;
	}
    table {
    border-collapse: collapse;
    /*border-width: 1px 0 0 1px !important;*/
	}
	th{
		height: 40px;
		font-weight: bold !important;
        color: white !important;
	}
	table,th, td {
		/*display: none;*/
        border: 1px solid black !important;
        border-width: 0 1px 1px 0 !important;
		padding: 1px !important;
		font-size: 12px !important;
    }
    .mrt{
      margin-top: 100px !important;
    }
    .bg1{
        background-color: #D2D2D2;
    }
    .em1, .em{
	float: right !important;
	position: relative !important;
    width: 40% !important;
	margin-left: 20px !important;
	}
    .mm{
    float: right !important;
	position: relative !important;
    width: 40% !important;
	margin-left: 20px !important;
    }
    .fieldlabels{
        font-weight: bold !important;
    }
    .v-tit{
        text-transform: uppercase;
        background-color: #eee !important;
        width: 100% !important;
        height: auto !important;
    }
	table {
    border-collapse: collapse;
    /*border-width: 1px 0 0 1px !important;*/
	}
	th{
		height: 40px;
		font-weight: bold !important;
	}
	table,th, td {
		/*display: none;*/
        border: 1px solid black !important;
        border-width: 0 1px 1px 0 !important;
		padding: 1px !important;
		font-size: 17px !important;
    }
	input,textarea{
		font-size: 12px !important;
		/*float: right !important;*/
	}
	h1{
		font-size: 25px !important;
	}
	.hd{
		font-size: 20px !important;
	}
    .hd1{
		font-size: 25px !important;
	}
    h2{
		font-size: 15px !important;
    }
	.print-container,.print-container *{
		visibility: visible !important;
	}
	.print-container{
		position: absolute !important;
		left: 0px !important;
    width: 100% !important;
	}
}

.theme-cyan .navbar{
  background:linear-gradient(45deg, #1c2473, #1d2473) !important;
}

.txt{
  color: #1c2473 !important;
}
</style>
</head>

<body class="theme-cyan">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30">
          <img class="zmdi-hc-spin" src="<?php echo URLROOT; ?>/public/images/ucclogo1.png" width="48" height="48" alt="Compass">
        </div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>