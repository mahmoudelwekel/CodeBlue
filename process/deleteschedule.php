<?php
if(!empty($_GET['sid']))
{
    $sid=$_GET['sid'];
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    if(mysqli_query($cn,"delete from codeblue_schedule  where id='$sid'"))
        header("location:../schedule.php");
    else    echo mysqli_error($cn);
}
else header("location:../editschedule.php?error=1");