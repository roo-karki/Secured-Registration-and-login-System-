<?php
/*||"<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please check your inputs, All fields are required</div>";
*/
   $result = "";
   if (isset($_POST['submit'])) {
     # code...
    include("database/mysqldb.php");
    //data
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    //validate paswword
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
     
    //reCaptcha
    $secretKey = "6LfJ7TEgAAAAAA_dUrAutvI4Ek0fPCsBUshMSkFh";
      $responseKey = $_POST['g-recaptcha-response'];
      $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

    $response = file_get_contents($url);
    $response = json_decode($response);
   // var_dump($response);
 if ($lastname == "" || $firstname == "" || $username == "" || $email == "" || $password == "" || $cpassword == "") {
   # code...
  $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Please check your inputs, All fields are required</div>";
 }
 else{
   if (!preg_match("/^[a-zA-Z'. -]+$/", $lastname) || !preg_match("/^[a-zA-Z'. -]+$/", $firstname)) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Last Name or First Name should contain only letters <strong>e.g Roshan</strong></div>";

   }
   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>You entered an Invalid Email Format! <br> <strong>Your email should be in this format e.g roshan@gmail.com</strong></div>";
   }
  
   elseif ($password != $cpassword) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your password does not match!</div>";
   }
    else {
        $check_query = mysqli_query($con, "SELECT * FROM users where username ='$username'");
        $rowCount = mysqli_num_rows($check_query);
            if ($rowCount > 0) {
              $result = "<div class='alert alert-danger alert-dismissible'>
               <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>The entered Username is already exist!</div>";

            }

   elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 ) {
     # code...
    $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character <strong> e.g Roshan@1#3</strong></div>";

   }
  

   
  else{
  $sql = $con->query("SELECT id FROM users WHERE email = '$email'");
 if ($sql->num_rows > 0) {
   # code...
  $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email already exists in the database</div>";

 }
 elseif (!$response->success) {
   # code...
   $result = "<div class='alert alert-danger alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Check the box, to ensure your not a robot.</div>";

 }
else{

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$sql = $con->query("INSERT INTO users (lastname, firstname, username, email, password) VALUES ('$lastname', '$firstname', '$username','$email', '$hashedPassword')");

$result = "<div class='alert alert-success alert-dismissible'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>User registered successfully.</div>";
  }

   }

 }
}

   }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://kit.fontawesome.com/1c2c2462bf.js" crossorigin="anonymous"></script>
</head>
<body class="reg">
<div class="container">
<form class="form-horizontal" id="validateForm" method="post">
<h1><b>Registration Form</b></h1>
<fieldset>
  <div class="form-group">
                  <label class="col-md-12 control-label" for="textinput">
                      <?php echo $result; ?>
                  </label>

              </div>
  <!-- last Name input-->
  <div class="">

   <div class="">
  <div class="">
   <!--   <label class=""><p class=""><strong>Last Name</strong></p></label> -->
    <input id="lastname" type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){echo htmlentities ($_POST['lastname']);}?>"
    class="form-control mb-4" placeholder="Last Name">
     <br>
  </div>
  <!-- First Name input-->
  <div class="">
    <!--  <label style="float: left;" class="mb-2"><p class="support-p"><strong>First Name</strong></p></label> -->
    <input id="firstname" type="text" name="firstname" value="<?php if(isset($_POST['firstname'])){echo htmlentities ($_POST['firstname']);}?>"
    class="form-control mb-4" placeholder="First Name">
    <br>
  </div>
</div>
<!-- User Name input-->
<div class="">
     <!--  <label style="float: left;" class="mb-2"><p class="support-p"><strong>User Name</strong></p></label> -->
    <input id="username" type="text" name="username" value="<?php if(isset($_POST['username'])){echo htmlentities ($_POST['username']);}?>"
    class="form-control mb-4" placeholder="Username">
     <br>
   </div>
 </div>

<!-- Email input-->
<div class="form-row">
  <div class="">
    <!--  <label style="float: left;" class="mb-2"><p class="support-p"><strong>Email Address</strong></p></label> -->
    <input id ="email" type="text" name="email" value="<?php if(isset($_POST['email'])){echo htmlentities ($_POST['email']);}?>"
     class="form-control mb-4" placeholder="Email Address">
     <br>
   </div>

<!-- Password input-->
<div class="">
  <div class="">
    <!--  <label style="float: left;" class="mb-3"><p class="support-p"><strong>Password</strong></p></label>
     -->
    <input id="password" class="form-control input-md"
name="password" type="password"
placeholder="Password" >
<span class="show-pass" onclick="toggle()">
<i class="far fa-eye" id="eye" onclick="myFunction(this)"></i>
</span>
      <br>
    </div>

<div class="">
   <!--  <label style="float: left;" class="mb-3"><p class="support-p"><strong>Confirm Password:</strong></p></label> -->
    <input id="cpassword" type="password" name="cpassword" class="form-control mb-4" placeholder="Confirm Password">
    
       <br>
       </div>

 

<div id="popover-password">
<p><span id="result"></span></p>
<div class="progress">
<div id="password-strength"
class="progress-bar"
role="progressbar"
aria-valuenow="40"
aria-valuemin="0"
aria-valuemax="100"
style="width:0%">
</div>
</div>
<ul class="list-unstyled">

<li class="">
<span class="one-number">
<i class="fas fa-circle" aria-hidden="true"></i>
&nbsp;Number (0-9)
</span>
</li>
<li class="">
<span class="low-upper-case">
<i class="fas fa-circle" aria-hidden="true"></i>
&nbsp;Lowercase &amp; Uppercase
</span>
</li>
<li class="">
<span class="eight-character">
<i class="fas fa-circle" aria-hidden="true"></i>
&nbsp;Atleast 8 Character
</span>
</li>
<li class="">
<span class="one-special-char">
<i class="fas fa-circle" aria-hidden="true"></i>
&nbsp;Special Character (!@#$%^&*)
</span>
</li>
</ul>
</div>
</div>
</div>

<!-- Captcha -->
<div class="g-recaptcha"  data-sitekey="6LfJ7TEgAAAAACAKys0dF7PXcjwlZMGFP8G-WBXG"></div>
<br>

<!-- Button -->
<div class="form-group">
  <button class="btn login-btn btn-block" name="submit" type="submit"> Register</button>

</div>
<div class="ex-account text-center">
<p>Already have an account? Login
<a href="login.php" style="color:#95c1e6;">here</a>
</p>
<div class="divider"></div>
</div>
</fieldset>
</form>
</div>
<script src="app.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>