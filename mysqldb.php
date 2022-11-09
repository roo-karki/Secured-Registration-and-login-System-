<?php

$con = new mysqli('localhost:3307','root','','cyber_security');
if (!$con) {
  echo "Not connected to the database".mysqli_error($con);
  // code...
}
 ?>
