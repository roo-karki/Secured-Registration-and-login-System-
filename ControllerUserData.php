<?php 
session_start();
require "database/mysqldb.php";
$email = "";
$name = "";
$errors = array();


    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if ($run_query) {
                //send opt in email with phpmailer
                  $_SESSION['code'] = $code;
                  $_SESSION['mail'] = $email;
                  require "Mail/phpmailer/PHPMailerAutoload.php";
                  $mail = new PHPMailer;

                  $mail->isSMTP();
                  $mail->Host = 'smtp.gmail.com';
                  $mail->Port = 587;
                  $mail->SMTPAuth = true;
                  $mail->SMTPSecure = 'tls';
                  // set your gmail to username and exact password
                  $mail->Username = 'karkiroshan@ismt.edu.np';
                  $mail->Password = '9862936163rk';
                  // send by email
                  $mail->setFrom('karkiroshan@ismt.edu.np', 'OTP Verification');
                  // get email from input
                  $mail->addAddress($_POST["email"]);
                  //$mail->addReplyTo('abc@gmail.com');
                  $mail->isHTML(true);
                  $mail->Subject = "Your verify code";
                  $mail->Body = "<p>Dear user, </p> <h3>Your verify OTP code is $code <br></h3>
                      <br><br>
                      <p>With regards,</p>
                      <b>Roshan karki</b>";

                  if (!$mail->send()) {
                      ?>
                      <script>
                          alert("<?php echo "Register Failed, Invalid Email "?>");
                      </script>
                      <?php
                  } 
                  else {
                      ?>
                      <script>
                          alert("<?php echo "Successfully, OTP sent to " . $email ?>");
                          window.location.replace('reset-code.php');

                      </script>
                      <?php 
                  }
              }
          }
          else
          {
            $errors['email-error'] = "You've entered incorrect Email!";
          }
      }

    //if user click check reset otp button 
      if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    } 


    //if user click change password button
   if(isset($_POST['change-password'])){
$_SESSION['info'] = "";
$password = mysqli_real_escape_string($con, $_POST['password']);
$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
//validate paswword
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

$email = $_SESSION['email']; //getting this email using session

if($password == "" || $cpassword == ""){
$errors['password'] = "Fields cannot be empty";
}else{
    if ($password != $cpassword) {
        $errors['password'] = "Password and Confirm password don't match!";
    }
    elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8){
        $errors['password'] = "Password must be 8 characters in length with atleast one uppercase and lowercase letter, one numeric and special character e.g Passw0rd#";
    }
    else{
        $sql = $con->query("SELECT password FROM users WHERE email = '$email'");

            if ($sql->num_rows > 0) {
                # code...
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {

                    $errors['password'] = "This is old password. ";

                }
                else{
                    $code = 0;

                    $encpass = password_hash($password, PASSWORD_BCRYPT);
                    $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
                    $run_query = mysqli_query($con, $update_pass);
                    if($run_query){
                    $info = "Your password changed. Now you can login with your new password.";
                    $_SESSION['info'] = $info;
                    header('Location: password-changed.php');
                    }else{
                    $errors['db-error'] = "Failed to change your password!";
                    }
                }
    }

}
}}
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login.php');
    }
?>