<?php if(empty($_GET['sid']))
{
    header("location:schedule.php");
}
else
    include "header.php";
?>

<?php include "adminonly.php";?>
<?php
$sid=$_GET['sid'];
$cn1 = mysqli_connect(Host, UN, PW, DBname);
$qry1 = mysqli_query($cn1 , "select DISTINCT u.name,s.* from users u join codeblue_schedule s on(u.id=s.emp_id) where s.id='$sid'");
$arr=mysqli_fetch_array($qry1);

    ?>

<div class=" d-flex justify-content-center my-5">
    <form id="form" style="min-width:50%;" method="post" action="process/updateschedule.php" >
        <div class="box-body">
            <div class="form-group" style="text-align: left">
                <div class="form-group">
                    <label>UserName</label>
                    <input class="form-control " readonly  value="<?php echo $arr[0]?>" type="text">
                    <input   value="<?php echo $arr[1]?>" id="emp" name="emp" type="hidden">
                </div>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="form-control  "  value="<?php echo $arr[2]?>" id="d" name="d" type="date">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">From</label>
                <input class="form-control  " value="<?php echo $arr[3]?>"  placeholder="From" id="f" name="f" type="time">
                </div>

            <div class="form-group">    
                <label for="exampleInputPassword1">To</label>
                <input class="form-control " value="<?php echo $arr[4]?>"  placeholder="To" name="t" id="t" type="time">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" >
            <button type="submit" name="submit" class="btn btn-success">Update</button>
            <a href="process/deleteschedule.php?sid=<?php echo $sid;?>" class="btn btn-danger">delete</a>
        </div>
    </form>

</div>
