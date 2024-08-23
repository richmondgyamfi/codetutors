<?php 
include APPROOT.'/views/includes/head.php';
include APPROOT.'/views/includes/nav.php';
include APPROOT.'/views/includes/sidenav.php';
?>

<section class="content">
    <div class="block-header d-print-none">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <?php //var_dump($data['total_app']);?>
                <h2>Report Page
                    <small class="text-muted">Welcome! <?=$_SESSION['fullname']?></small>
                </h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12 col-sm-12 d-none d-print-block">
            <h1 class="hd1 text-center">UNIVERSITY OF CAPE COAST </h1>
            <h1 class="hd1 text-center">INSTITUTE OF EDUCATION </h1>
            <h2 class="hd1 text-center">TUTORS RECRUITMENT LIST </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header d-print-none">
                        <h2><strong class="txt"> REPORT</strong> PAGE </h2>
                    </div>
                    <div class="row d-print-none">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="<?php echo URLROOT; ?>/code_examiners/report.php" method="post"
                                class="form-inline">
                                <?php //var_dump($_POST['degree_status']) ?>
                                <!-- <div class="content row"> -->
                                <!-- <div class="input-group input-lg col-md-12"> -->
                                <label for="degree_status">Select a search option</label>
                                <select class="form-control show-tick" id="degree_status" name="degree_status">
                                    <option value="">- Second Degree Status -</option>
                                    <option value="2">SELECTED</option>
                                    <option value="3">REJECTED</option>
                                    <!--<option value="3">APPOINTED</option>
                            <option value="4">NOT APPOINTED</option>-->
                                </select>
                                <!-- </div> -->
                                <!-- <div class="col-md-4"> -->
                                <button type="submit" class="btn btn-round btn-md waves-effect waves-light"
                                    style="background-color:#1c2473;">
                                    SEARCH</button>
                                <!-- </div> -->
                                <!-- </div> -->
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <?php if(isset($data['total_srh'])){
                    ?>
                        <h2><strong class="txt">
                                <?=(($_POST['degree_status'] == 1)?'SELECTED APPLICANTS':
                        (($_POST['degree_status'] == 2)?'REJECTED APPLICANTS':
                        (($_POST['degree_status'] == 3)?'APPOINTED APPLICANTS':
                        (($_POST['degree_status'] == 1)?'NOT APPOINTED APPLICANTS':'')))) ?>
                            </strong> LIST </h2>
                        <?php } ?>
                        <ul class="header-dropdown d-print-none">
                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                        class="zmdi zmdi-more"></i> </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="javascript:void(0);" onclick="print()">Print Report</a></li>
                                    <li>
                                        <a href="javascript:void(0);" utton
                                            onclick="exportTableToExcel('buss', 'codetutors-data')">Export to
                                            EXCEL</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="remove">
                                <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                            </li>
                        </ul>
                    </div>
                    <?php if(isset($data['total_srh'])):
                    ?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="buss">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Applicants Fullname</th>
                                        <th>Phone Number</th>
                                        <th>Current Location</th>
                                        <th>Course</th>
                                        <th>Centre</th>
                                        <th>Gender</th>
                                        <th>Staff No.</th>
                                        <th>Level</th>
                                        <th>Marked Before</th>
                                        <th>Marking Center</th>
                                        <th>Examiner Type</th>
                                        <th>Bank Name & Branch</th>
                                        <th>Bank Account Name & Number</th>
                                        <th>Ghana Card No.</th>
                                        <th>Date Applied</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; 
                                    foreach($data['total_srh'] as $data){ ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo strtoupper($data->fname.' '.$data->mname.' '.$data->lname);?>
                                        </td>
                                        <td><?php echo $data->phone_no?></td>
                                        <td><?php echo strtoupper($data->curr_loc);?></td>
                                        <td><?php echo strtoupper($data->course);?></td>
                                        <td><?php echo strtoupper($data->centre);?></td>
                                        <td><?php echo strtoupper($data->gender);?></td>
                                        <td>
                                            <?php echo $data->staffno?>
                                        </td>
                                        <td><?php echo $data->level?></td>
                                        <td><?php echo $data->marked?></td>
                                        <td><?php echo $data->marking_centre?></td>
                                        <td><?php echo $data->examiner_type?></td>
                                        <td><?php echo $data->bankname.' '.$data->branch?></td>
                                        <td><?php echo $data->acc_name.' '.$data->acc_no?></td>
                                        <td><?php echo $data->ghcard_no?></td>
                                        <td><?php echo $data->dateapplied?></td>
                                        <td><span
                                                class="badge <?=((($data->status == 2) || ($data->status == 4))?'badge-danger':'badge-success')?> ">
                                                <?=(($data->status == 1)?'Applied':(($data->status == 2)?'Selected':(($data->status == 3)?'Rejected':(($data->status == 4)?'Appointed':(($data->status == 5)?'Not Appointed':(($data->status == 0)?'Yet To Apply':''))))))?></span>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="container">
                        <marquee direction="right" behavior="alternate">
                            <p>Please select a search option</p>
                        </marquee>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include APPROOT."/views/includes/footer.php";
?>

<script>
function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
</script>