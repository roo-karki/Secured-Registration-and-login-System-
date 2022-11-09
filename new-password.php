<?php require_once "controllerUserData.php"; ?>


<!DOCTYPE html>
<html lang="en" class="forgot">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="not">
    <div class="new">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off" class="square">
                    <h2 class="text-center">New Password</h2>
                    <p style="background-color:  #b4e4bf;color:#086308;padding:3px 1px 4px 2px;border-radius:4px; width: 256px !important;">Please create a new password that you don't use on any other site.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class='alert alert-danger alert-dismissible'>
    <a href='' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>
     <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
  </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" id="word" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>