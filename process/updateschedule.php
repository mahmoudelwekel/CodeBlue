<?php
if(isset($_POST['emp'])and isset($_POST['f'])and isset($_POST['t'])and isset($_POST['d']))
{
    $emp=$_POST['emp'];
    $f=$_POST['f'];
    $t=$_POST['t'];
    $d=$_POST['d'];
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    if(mysqli_query($cn,"update codeblue_schedule set t_day='$d',t_from='$f',t_to='$t'  where id='$emp'"))
        header("location:../schedule.php");
    else    echo mysqli_error($cn);

}
else header("location:../editschedule.php?error=1");