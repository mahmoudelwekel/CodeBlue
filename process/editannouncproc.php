<?php
if (isset($_POST["cid"])&&isset($_POST["cat"]))
{
    $aid=$_POST["cid"];
    $anm=$_POST["cat"];
    include "../dbinfo.php";
    $cn=mysqli_connect(Host,UN,PW,DBname);
    if  ($_FILES["img"]["size"] >0 )
    {
        $img_name ="../img/$cnm" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        $img_name1 ="img/$cnm" . date("Ymdhis").".".pathinfo($_FILES["img"]["name"],PATHINFO_EXTENSION  );
        move_uploaded_file($_FILES["img"]["tmp_name"] , $img_name);
        $qry = mysqli_query($cn , "update announcment set content='$cnm',img='$img_name1',announ_date=CURRENT_TIMESTAMP where id=$aid ");
        echo mysqli_error($cn);
//        header("location:");
    }
    mysqli_query($cn,"update announcment set content='$anm' where id='$aid'");
    if( mysqli_error($cn)) echo mysqli_error($cn) ;

    else  header("location:../announcement.php");
}
else header("location:../editannounc.php?error=inv");