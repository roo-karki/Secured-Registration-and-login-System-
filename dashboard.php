<?php
include('session.php');
?>



<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body >
<h1><a href = "logout.php" class="btn btn-danger" style="float:right;display: inline; margin:18px;margin-top: -175px;">Logout</a></h1>
<h2 style="text-align:center; margin-top:200px;">Welcome <?php echo $login_session; ?> to online community. </h2>



</body>
</html>