<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);

if (isset($_POST["un"])&&isset($_POST["pw"])&&isset($_POST["nm"])&&isset($_POST["em"]))
{
    $un=$_POST["un"];
    $pw=$_POST["pw"];
    $nm=$_POST["nm"];
    $em=$_POST["em"];

    $qry = mysqli_query($cn , "call newuser('$un','$pw','$nm','$em');");
    $res = mysqli_fetch_array($qry);
    if($res[0]=='1')
    {
        header("location: ../login.php");
    }
    else   header("location:../register.php?error=invalid");
}
else   header("location:../register.php?error=invalid");
?>