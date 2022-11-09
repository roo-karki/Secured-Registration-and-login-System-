<?php
include('database/mysqldb.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($con,"select firstname from users where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['firstname'];

if(!isset($_SESSION['login_user'])){
header("location:login.php");

die();
}
?>

