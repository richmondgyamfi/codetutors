<?php require("resources/config.php"); ?>
<?php require("templates/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
             <form class="form-horizontal" action="index.php?page=controllers/Blockstudent" method="post">
                <div class="form-group">
                    <label for="regno" class="col-lg-2 control-label">Academic Year/Semeter:</label>
                    <div class="col-lg-8">
                    	<select name="acasession" class="form-control">
                    	    <option value="">Academic Year</option>
                    	    <?php foreach($acyrs as $academicyr => $acyrs):?>
                    	    <option value="<?=$acyrs['accademicsession'].'-'.$acyrs['new1'].'/'.$acyrs['new'].' '.$acyrs['semester']?>"><?=$acyrs['new1'].'/'.$acyrs['new'].' '.$acyrs['semester']?></option>
                    	    <?php endforeach; ?>

                    	</select>
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" name="SEARCH_ACCYR" value="SEARCH" class="btn btn-primary" />
                    </div>
                </div>
            </form>
            <!--<form class="form-horizontal" action="index.php?page=controllers/Blockstudent" method="post">
                <div class="form-group">
                    <label for="regno" class="col-lg-2 control-label">Registration No.</label>
                    <div class="col-lg-8">
                        <input type="text" name="regno" class="form-control" value="<?php echo $regno ?? ''; ?>" placeholder="Registration Number" />
                    </div>
                    <div class="col-lg-2">
                        <input type="submit" name="SEARCH_STUD" value="SEARCH" class="btn btn-primary" />
                    </div>
                </div>
            </form>-->
            
            <hr/>
           <center><font size='+2' color='red'> Please Note that all students results are blocked by default</font><center>
            <hr/>
            
           

            

            <?php if(isset($errors) && count($errors) > 0){ ?>
            <script type="text/javascript">
                var errors = <?php echo json_encode($errors); ?>;
                smoke.alert(errors.toString(), function (e){
                },
                {
                    ok: "Ok",
                    cancel: "Cancel",
                    classname: "custom-class"});
                
                </script>
            <?php } ?>

            <?php if(isset($init) && $init == 1 && !empty($approval_list)){ ?>
            <h2><?=(!empty($dataex)?$dataex:'')?></h2>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Regno</th>
                            <th>Name</th>
                            <th class="text-center">Approved?</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($approval_list as $key => $item): ?>
                            <tr>
                                <form action="index.php?page=controllers/Blockstudent" method="post">
                                    <input type="hidden" name="studid" value="<?php echo $item['studid']; ?>">
                                    <?php if($item['flag'] == 0 || $item['flag'] == 1): ?>
                                        <input type="hidden" name="allow" value="approve">
                                    <?php else: ?>
                                        <input type="hidden" name="allow" value="disapprove">
                                    <?php endif; ?>
				    <input type="hidden" name="acasession" value="<?=$acasession1?>">
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td><?php echo $item['regno']; ?></td>
                                    <td><?php echo $item['student_name']; ?></td>
                                    <td class="text-center">
                                        <?php if($item['flag'] == 0 || $item['flag'] == 1): ?>
                                            <i class="glyphicon glyphicon-thumbs-down text-danger"></i>
                                        <?php else: ?>
                                            <i class="glyphicon glyphicon-thumbs-up text-success"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($item['flag'] == 0 || $item['flag'] == 1): ?>
                                            <input type="submit" value="PUBLISH" class="btn btn-sm btn-success" name="TOGGLER">
                                        <?php else: ?>
                                            <input type="submit" value="BLOCK" class="btn btn-sm btn-danger" name="TOGGLER">
                                        <?php endif; ?>
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php }else{ ?>
            <h3><marquee>No Record Found</marquee></h3>
<?php }?>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>
<?php require("templates/footer.php"); ?>
