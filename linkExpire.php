<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en" class="forgot">
<head>
    <meta charset="UTF-8">
    <title>Password Expired</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="not">
    <div class="new">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="linkExpire.php" method="POST" autocomplete="" class="square">
                    <h2 class="text-center" style="color:red;">Password Expired </h2>
                    <p class="text-center">Enter your email address</p>
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
                        <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" id="word" type="submit" name="check-email" value="Continue">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>