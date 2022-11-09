
<?php require_once "controllerUserData.php"; ?>


<!DOCTYPE html>
<html lang="en" class="forgot">
<head>
    <meta charset="UTF-8">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="not">
    <div class="new">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="reset-code.php" method="POST" autocomplete="off" class="square">
                    <h2 class="text-center">Code Verification</h2>
                    
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
                        <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" id="word" type="submit" name="check-reset-otp" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>