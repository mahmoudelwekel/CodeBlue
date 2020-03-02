<?php
if (isset($_POST["uid"])) {
    $cnm=$_POST["uid"];
    include "../dbinfo.php";
    $cn = mysqli_connect(Host, UN, PW, DBname);
    if ( mysqli_error($cn)) echo mysqli_error($cn) ;
    if  ($_FILES["img"]["size"] >0 )
    {
        $img_name ="../img/$cnm" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="img/$cnm" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        move_uploaded_file($_FILES["img"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "insert into announcment (content,img) value('$cnm','$img_name1')");
        echo mysqli_error($cn);
        header("location:../announcement.php");
    }
    else   $qry = mysqli_query($cn , "insert into announcment (content,img) value('$cnm','def.png')");

}
else header("location:../newannouncement.php?error=inv");