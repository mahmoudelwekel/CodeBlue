<?php  include 'header.php'; ?>

<?php include "adminonly.php";?>
<div class="d-flex justify-content-center my-5">
    <form id="form" style="min-width:50%;" method="post" action="process/insertschedule.php" >
        <div class="box-body">
            <div class="form-group" style="text-align: left">
                <div class="form-group">
                    <label>UserName</label>
                    <select class="form-control custom-select" id="emp" name="emp">
                        <?php
                        include "dbinfo.php";
                        $cn1 = mysqli_connect(Host, UN, PW, DBname);
                        $qry1 = mysqli_query($cn1 , "select id,name from users where role!='pendding'");
                        while ($arr1=mysqli_fetch_array($qry1)) {
                            $cbid = $arr1[0];
                            $cbtxt = $arr1[1];
                            ?>
                            <option value="<?php echo $cbid?>"><?php echo $cbtxt?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="form-control  "  id="d" name="d" type="date">
            </div>

            <div class="form-group">
                <label>From</label>
                <input class="form-control "  placeholder="From" id="f" name="f" type="time">
            </div>

            <div class="form-group">
                <label>To</label>
                <input class="form-control "  placeholder="To" name="t" id="t" type="time">
            </div>
            </div>
<!-- /.box-body -->
<div class="box-footer" >
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
</div>
</form>

</div>