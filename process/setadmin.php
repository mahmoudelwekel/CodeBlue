<?php
if (isset($_GET["uid"])) $cnm=$_GET["uid"];
else header("location: ../users.php?error=inv");


include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
mysqli_query($cn,"update users set role='admin' where id=$cnm");
if( mysqli_error($cn)) echo mysqli_error($cn) ;

else header("location:../users.php");