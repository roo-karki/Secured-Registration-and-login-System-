<?php require_once "controllerUserData.php"; ?>
<?php
if($_SESSION['info'] == false){
    header('Location: login.php');  
}
?>

<!DOCTYPE html>
<html lang="en" class="forgot">
<head>
    <meta charset="UTF-8">
    <title>Password Changed Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="not">
    <div class="new">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login.php" method="POST" class="square">
                    <div class="form-group">
                        <input class="form-control button" id="word" type="submit" name="login-now" value="Login Now">
                        <br>
                        <button class="form-control button" ><a href="login.php"  id="word"></a>Back to Home</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>