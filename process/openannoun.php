<?php

include "../dbinfo.php";
$q=$_GET['q'];

$cn=mysqli_connect(Host,UN,PW,DBname);
$rslt=mysqli_query($cn,"call viewannouncement($q)");
if($rslt->num_rows==1)
{
     $arr = mysqli_fetch_array($rslt);

        echo "<h5>$arr[1]</h5><br><img style='width: 400px;margin: 20px' src='$arr[4]'> <br><h6>announcment date:$arr[3]</h6>";
}
else echo 'Error announcment not found';
?>