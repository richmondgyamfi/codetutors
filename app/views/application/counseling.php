<!DOCTYPE html>
<html class="no-js " lang="en">
    <head>
    <title>COLLEGE OF DISTANCE EDUCATION</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="icon" href="<?php echo URLROOT ?>/public/images/ucclogo1.png" type="image/x-icon">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-header">
                            <h3><img src="<?php echo URLROOT ?>/public/images/ucclogo1.png" width="auto" height="50" alt=""> Counseling Unit CoDE</h3>
                        </div>
                        <form action="counseling.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cantype">Select Counseling Type</label>
                                    <select name="cantype" class="form-control" id="cantype">
                                        <option value="">Select Counseling Type...</option>
                                        <option value="ACADEMIC/EDUCATIONAL">ACADEMIC/EDUCATIONAL</option>
                                        <option value="SOCIAL">SOCIAL/PERSONAL</option>
                                        <option value="CARRIER">CARRIER</option>
                                        <option value="OTHERS">OTHERS</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cantype">Phone Number</label>
                                    <input type="text" name="phone_no" id="phone_no" class="form-control" placeholder="Phone Number...">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Your Email...">
                                </div>
                            </div>
                        <div class="card-footer">
                            <div class="row">
                                <button class="btn btn-primary col-md-6" type="submit">Request</button>
                                <button class="btn btn-danger col-md-6">Cancel</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </body>
    <footer>
    <script src="<?php echo URLROOT ?>/public/js/bootstrap.min.js"></script>
    </footer>
</html>