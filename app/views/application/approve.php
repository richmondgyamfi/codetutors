<?php require("resources/config.php"); ?>
<?php require("templates/header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="index.php?page=controllers/Finance" method="post">
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

            <?php if(isset($init) && $init == 1){ ?>
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
                                <form action="index.php?page=controllers/Finance" method="post">
                                    <input type="hidden" name="studid" value="<?php echo $item['studid']; ?>">
                                    <?php if($item['allow'] == 0): ?>
                                        <input type="hidden" name="allow" value="approve">
                                    <?php else: ?>
                                        <input type="hidden" name="allow" value="disapprove">
                                    <?php endif; ?>
                                    
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td><?php echo $item['regno']; ?></td>
                                    <td><?php echo $item['student_name']; ?></td>
                                    <td class="text-center">
                                        <?php if($item['allow'] == 0): ?>
                                            <i class="glyphicon glyphicon-thumbs-down text-danger"></i>
                                        <?php else: ?>
                                            <i class="glyphicon glyphicon-thumbs-up text-success"></i>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($item['allow'] == 0): ?>
                                            <input type="submit" value="APPROVE" class="btn btn-sm btn-success" name="TOGGLER">
                                        <?php else: ?>
                                            <input type="submit" value="DISAPPROVE" class="btn btn-sm btn-danger" name="TOGGLER">
                                        <?php endif; ?>
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>

            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>
<?php require("templates/footer.php"); ?>
