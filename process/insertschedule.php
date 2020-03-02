<?php
if(isset($_POST['emp'])and isset($_POST['f'])and isset($_POST['t'])and isset($_POST['d']))
{
    $emp=$_POST['emp'];
    $f=$_POST['f'];
    $t=$_POST['t'];
    $d=$_POST['d'];
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    if(mysqli_query($cn,"insert into codeblue_schedule values(NULL,'$d','$f','$t','$emp')"))
        header("location:../schedule.php");
    else    echo mysqli_error($cn);

}
else header("location:../newschedule.php?error=1");