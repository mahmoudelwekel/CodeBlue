<?php

include "../dbinfo.php";
$q=$_GET['q'];

$cn=mysqli_connect(Host,UN,PW,DBname);
$rslt=mysqli_query($cn,"call userannouncement($q)");
if($rslt->num_rows!=null)
    {
    while ($arr = mysqli_fetch_array($rslt)) {

        $cont = $arr[1];
        if (strlen($arr[1]) > 15)
        {
            $cont=substr($arr[1],0,12);
            $cont.='...';
        }
        echo '<a class="dropdown-item d-flex justify-content-start" data-toggle="modal" data-target="#exampleModal" onclick="openAnnouncments('.$arr[0].')">';
        if ($arr[2] == 1)
            echo '<i class="fas fa-envelope-open text-success mr-3"></i>';
        else echo '<i class="fas fa-envelope text-danger mr-3"></i>';
        echo $cont . '</a>';
    }
    echo "<a class='history' href='announcementhistory.php'>History</a>";
}
    else echo 'No announcment yet';
?>