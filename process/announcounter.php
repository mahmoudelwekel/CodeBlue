<?php

include "../dbinfo.php";
$q=$_GET['q'];

$cn=mysqli_connect(Host,UN,PW,DBname);
$rslt=mysqli_query($cn,"select getnewannouncount($q)");
if($rslt->num_rows==1)
{
    $arr = mysqli_fetch_array($rslt);
    if($arr[0]>0)
        echo "<span class=\"fa-layers-counter fa-lg\" style=\"background:Tomato\">$arr[0]</span>";
}
?>