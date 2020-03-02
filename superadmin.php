<?php include 'header.php';
include "adminonly.php";?>

<div class="container">

<div class="row" style="color:rgb(29,84,105);">

<div class="col-sm-12 col-md-6 d-flex align-items-start flex-column p-5">

<div style="border:10px solid rgb(25,78,96);color:rgb(25,78,96);" class="p-5 ml-3">
<i class="fas fa-user fa-10x"></i>
</div>
    <?php
      //  include 'dbinfo.php';
        $cn=mysqli_connect(Host,UN,PW,DBname);
        $uid=$_SESSION['uid'];
        $res1=mysqli_query($cn,"select user_name,note,name,email from users where id='$uid'");
        $arr1=mysqli_fetch_array($res1);
        $res2=mysqli_query($cn,"call admincount()");
        $arr2=mysqli_fetch_array($res2);

        ?>

<div class="text-center pt-3">
<h1 class="text-muted"><?php echo $arr1[2]?></h1>
<h2 class="text-muted"><?php echo $arr1[3]?></h2>
<h2 class="text-muted"><?php echo $arr1[0]?></h2>
</div>

<div class="text-center p-3 mt-5">
    <a href="#" class="h2">Code Blue live</a><br>
    <a href="#" class="h2">Code Blue test</a><br>
    <a href="announcement.php" class="h2">Announcment</a><br>
    <a href="newemployee.php" class="h2">New Employee</a><span class="badge" style="background:Tomato"><?php if($newusers>0) echo $newusers?></span>
    <br>
    <a href="users.php" class="h2">Users</a><br>
</div>



</div>
<div class="col-sm-12 col-md-6 d-flex align-items-end flex-column p-5">

<div class="row rounded-circle" style=background-color:rgb(111,185,214);">
<div class="col-6 p-5 text-center" style="border-right:5px solid rgb(32,90,114);">
<h4>Adults</h4>
<p style="font-size:100px;font-weight:bold"><?php echo $arr2[0]?></p>
</div>
<div class="col-6 p-5 text-center">
    <p style="font-size:100px;font-weight:bold"><?php echo $arr2[1]?></p>
    <h4>Pedia</h4>
</div>
</div>

<form method="post" action="process/updatenote.php">
<div class="text-center mt-5 p-4">
    <div class="form-group">
    <textarea id="not" name="not" class="form-control" placeholder="Notes"><?php echo $arr1[1];?></textarea>
    </div>
    <input class="form-control btn btn-primary" type="submit" value="update note">
</div>
</form>
</div>

</div>

</div>
