<?php
if (isset($_GET["cnm"])) $cnm=$_GET["cnm"];
else header("location:../viewmcat.php?error=inv");


include  "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
mysqli_query($cn,"call acceptuser('$cnm');");
if( mysqli_error($cn)) echo mysqli_error($cn) ;

else header("location:../users.php");