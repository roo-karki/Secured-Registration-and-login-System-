<?php
session_start();
$result = "";
if (isset($_POST['submit'])) {
# code...
include("database/mysqldb.php");
// username and password sent from form
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']); 
$sql = mysqli_query($con, "SELECT * FROM users where username = '$username'");
$count = mysqli_num_rows($sql);
// If result matched $username and $password, table row must be 1 row
if($count > 0) {
$fetch = mysqli_fetch_assoc($sql);
$hashpassword = $fetch["password"];
if (password_verify($password, $hashpassword)) {
            //check for password expiration
            // if you want to change the change month to second
            date_default_timezone_set("Asia/Kathmandu");
            $sql1 = "SELECT TIMESTAMPDIFF (MONTH, date, NOW()) AS tdif FROM users where username = '$username'";
            $result = $con->prepare($sql1);
            $result->execute();
            $result->store_result();
            $result->bind_result($tdif);
            $result->fetch();
            if ($tdif >= 2) {
                header('Location: linkExpire.php');
                exit();
            } else {
               $_SESSION['login_user'] = $username;
              header("location: dashboard.php");}


      }

}
 
else {
$result = "<div class='res'>
    Incorrect Login credentials </div>";
}
}?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

</head>
<body class="log">
<!-- partial:index.partial.html -->
<section class='login' id='login'>
 
  <div class='head'>
  <h1 class='company'>Login</h1>
  
  </div>
  <?php echo $result; ?>
  <div class='form'>

    <form action="" method="post">
      
  <input type="text" placeholder='Username' class='text' name="username" required><br>
  <input type="password" placeholder='Password' class='password' name="password"><br>
  <button class="btn-login" id='do-login' type="submit" name="submit" >login</button>
  <a href="forgotPassword.php" class='forgot1'>Forgot?</a>
    </form>
  </div>
</section>

<!-- partial -->
  <script  src="app.js"></script>

</body>
</html>
