<?php require("resources/config.php"); ?>
<?php require("templates/header.php"); ?>
<?php 
if (!empty($sdata)) {
    foreach ($sdata as $key) {
    }
    foreach ($sessiondata as $session) {
    }
}

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
        <div class="col-lg-12">
            <form class="form-horizontal d-print-none" action="index.php?page=controllers/Students" method="post">
                <div class="form-group">
                    <label for="regno" class="col-lg-2 control-label">Registration No.</label>
                    <div class="col-lg-8">
                        <input type="text" name="regno" class="form-control" value="<?php echo $regno ?? ''; ?>" placeholder="Registration Number" />
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" name="SEARCH_STUD" value="SEARCH" class="btn btn-primary" />
                    </div>
                </div>
            </form>
            
            <hr/>

            <?php if(isset($init) && $init == 1){ ?>
                <div class="col-12 float-right">
                    <button onclick="print()" data-toggle="tooltip" data-placement="top" class="d-print-none float-right btn btn-primary">
                        Print
                    </button>
                </div>
                <table class="d-print-block">
                    <tr>
                        <th style="text-align: left;">NAME </th>
                        <th>&nbsp;&nbsp;</th>
                        <td> <?php
                            echo empty($key['stud_name'])?'':$key['stud_name'];
                        ?> </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">INDEX NO. </th>
                        <th>&nbsp;&nbsp;</th>
                        <td><?php
                            echo empty($key['regno'])?'':$key['regno'];
                        ?> </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">PROGRAMME </th>
                        <th>&nbsp;&nbsp;</th>
                        <td> <?php
                            echo empty($key['prog_name'])?'':$key['prog_name'];
                        ?> </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">MAJOR </th>
                        <th>&nbsp;&nbsp;</th>
                        <td> <?php
                            echo empty($key['major_name'])?'':$key['major_name'];
                        ?> </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">LEVEL </th>
                        <th>&nbsp;&nbsp;</th>
                        <td> <?php
                            echo empty($key['level'])?'':$key['level'];
                        ?> </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">CGPA </th>
                        <th>&nbsp;&nbsp;</th>
                        <td>
                        <?php 
                        $session1 = $session['session'];
                            echo empty(getCGPA($regno, $session1)['gpa'])?'':getCGPA($regno, $session1)['gpa'];
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align: left;">COLLEGE </th>
                        <th>&nbsp;&nbsp;</th>
                        <td> <?php
                            echo empty($key['college'])?'':$key['college'];
                        ?> </td>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <?php foreach ($sessiondata as $session) { ?>
                <table class="table d-print-block table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="5"><?php
                        echo $session = $session['session']; ?></th>
                        </tr>
                        <tr>
                            <th>CODE</th>
                            <th>TITLE</th>
                            <th class="text-center">CR</th>
                            <th class="text-center">GR</th>
                            <th class="text-center">GP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $getstResults = getStudentResultsData($regno, $session); ?>
                        <?php 
                        // var_dump($sdata);
                        // var_dump($getstResults[0]); 
                        // echo "<br>";
                        // $countdata = count($getstResults[0]);
                        // // echo "<br>";
                        // echo "<br>";
                        // echo "<br>";
                        //     for ($i=0; $i < $countdata; $i++) { 
                        //         var_dump($getstResults[$i]);
                        //         echo $getstResults[$i];
                        //         echo "<br>";
                        // echo "<br>";
                        //          echo "string";
                            
                            foreach ($getstResults as $resultsData) {
                                 // var_dump($resultsData);
                                 // echo "string";
                                 // echo "<br>";
                                 // echo "<br>";
                        ?>
                        <?php if($resultsData['resit'] == 1):?>
                                <tr class="text-danger text-monospace font-weight-bold">
                                    <td><?php echo $resultsData['code'] ?></td>
                                    <td><?php echo $resultsData['title'] ?> &nbsp;*</td>
                                    <td class="text-center"><?php echo $resultsData['cr'] ?></td>
                                    <td class="text-center"><?php echo $resultsData['gd'] ?></td>
                                    <td class="text-center"><?php echo $resultsData['gp'] ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td><?php echo $resultsData['code'] ?></td>
                                    <td><?php echo $resultsData['title'] ?> &nbsp;*</td>
                                    <td class="text-center"><?php echo $resultsData['cr'] ?></td>
                                    <td class="text-center"><?php echo $resultsData['gd'] ?></td>
                                    <td class="text-center"><?php echo $resultsData['gp'] ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2" style="text-align: left;">
                        <?php echo 'GPA = '.getGPA($regno, $session)['gpa']; ?>
                        <?php echo 'CGPA = '.getCGPA($regno, $session)['gpa']; ?>
                            </th>
                            <th class="text-center">
                        <?php echo 'GPA = '.getGPA($regno, $session)['tcr']; ?></th>
                            <th>&nbsp;</th>
                            <th class="text-center">
                        <?php echo 'GPA = '.getGPA($regno, $session)['tgp']; ?></th>
                        </tr>
                    </tfoot>
                </table>
                <?php } ?>
            <?php } ?>

            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>
<?php require("templates/footer.php"); ?>
