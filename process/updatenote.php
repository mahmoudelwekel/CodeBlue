<?php
if (isset($_POST["not"])) $cnm=$_POST["not"];
else header("location:../superadmin.php");


include  "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
session_start();
$aid=$_SESSION['uid'];
$cnm=mysqli_real_escape_string($cn,$cnm);
mysqli_query($cn,"update users set note='$cnm' where id='$aid'");
if( mysqli_error($cn)) echo mysqli_error($cn) ;

else header("location:../superadmins.php");