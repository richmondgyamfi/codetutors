<?php require("resources/config.php"); ?>
<?php require("templates/header.php"); ?>
<?php 
if (!empty($sdata)) {
    foreach ($sdata as $key) {
    }
    foreach ($sessiondata as $session) {
    }
}

// $getprogrm = getProg();
// $getLev = getLevel();

?>
<style type="text/css">
.float-right{float:right!important}
@media print {
  .d-print-none {
    display: none !important;
  }
  .d-print-inline {
    display: inline !important;
  }
  .d-print-inline-block {
    display: inline-block !important;
  }
  .d-print-block {
    display: block !important;
  }
  .d-print-table {
    display: table !important;
  }
  .d-print-table-row {
    display: table-row !important;
  }
  .d-print-table-cell {
    display: table-cell !important;
  }
  .d-print-flex {
    display: -ms-flexbox !important;
    display: flex !important;
  }
  .d-print-inline-flex {
    display: -ms-inline-flexbox !important;
    display: inline-flex !important;
  }
}
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal d-print-none" action="index.php?page=controllers/Students" method="post">
                <div class="row">
                    <div class="col-lg-6 row">
                        <label for="prog_name" class="col-lg-3 control-label">Select Program : </label>
                        <div class="col-lg-9">
                            <select name="prog_name" class="form-control">
                                <option value="">Select Program</option>
                                <?php 
                                    foreach ($getProg as $getprogrmData) {
                                ?>
                                <option value="<?=$getprogrmData['progid'];?>"><?=$getprogrmData['long_name'];?></option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 row">
                        <label for="regno" class="col-lg-3 control-label">Level : </label>
                        <div class="col-lg-9">
                            <select name="level" class="form-control">
                                <option value="">Select Level</option>
                                <?php 
                                    foreach ($getLevel as $getlevelData) {
                                ?>
                                <option value="<?=$getlevelData['level'];?>"><?=$getlevelData['level'];?></option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="submit" name="SEARCH_STUDS" value="SEARCH" class="btn btn-primary" />
                    </div>
                </div>
            </form>
            
            <hr>
            <?php 
                foreach ($getstudsquery1 as $resultsData1) {

                }
             ?>
                <h3 class="text-uppercase"><?=!empty($_POST['level'])?'CGPA of Level '.$_POST['level']. ' '. $resultsData1['long_name'].' students.':''?></h3>
            <hr>
                <table class="table d-print-block table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Registration Number</th>
                            <th>Student Name</th>
                            <th>CGPA</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                             
                        foreach ($getstudsquery as $resultsData) {
                        ?>
                        <tr class="text-monospace font-weight-bold">
                            <td nowrap="nowrap"><?php echo $resultsData['regno'] ?></td>
                            <td><?php echo $resultsData['Name'] ?> </td>
                            <td class="text-center text-danger"><?php echo $resultsData['cgpa_raw'] ?></td>
                            <td><?php echo $resultsData['class'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>
<?php require("templates/footer.php"); ?>
