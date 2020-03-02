<?php
if (isset($_POST["un"])&&isset($_POST["pw"]))
{
    $un=$_POST["un"];
    $pw=$_POST["pw"];
    include "../dbinfo.php";
    $cn=mysqli_connect(Host,UN,PW,DBname);

    $rslt=mysqli_query($cn,"select check_login('$un','$pw')");
    $arr=mysqli_fetch_array($rslt);

    if ($arr[0]=='2')
    {
        if (isset($_POST["remember"]))
        {

            if ($_POST["remember"]=='on')
            {
                setcookie("usercookie",$un,time()+(86400 * 30),"/");
                setcookie("passcookie",$pw,time()+(86400 * 30),"/");
            }
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //session_start();
        $res1=mysqli_query($cn,"select id from users where user_name='$un'");
        $arr1=mysqli_fetch_array($res1);
        $_SESSION["uid"]=$arr1[0];
        $_SESSION["role"]="user";

        header("location:../index.php");

    }
    ELSE if ($arr["0"]=='1')
    {
        if (isset($_POST["remember"]))
        {
            if ($_POST["remember"]=='on')
            {
                setcookie("usercookie",$un,time()+(86400 * 30),"/");
                setcookie("passcookie",$pw,time()+(86400 * 30),"/");
            }
        }
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        //session_start();
        $res1=mysqli_query($cn,"select id from users where user_name='$un' ");
        $arr1=mysqli_fetch_array($res1);
        $_SESSION["uid"]=$arr1[0];
        $_SESSION["role"]="admin";

        header("location:../index.php");

    }
    else if ($arr["0"]=='3')
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["error"]="your email is pennding please wait until admin accept it";
        header("location:../login.php");
    }

    else
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["error"]="invalid username or password";
        header("location:../login.php");

    }


}
else  header("location:../login.php?error=inv");