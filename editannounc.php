<?php  include 'header.php';
if (!isset($_GET["cnm"]));
else $anm=$_GET["cnm"];
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Edit
    </h1>
</section>

<!-- Main content -->
<section class="content " style="height:710px">
    <!-- left column -->
    <div class="col-md-10 col-lg-offset-1">
        <!-- general form elements -->
        <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <form id="form" method="post"   enctype="multipart/form-data" action="process/editannouncproc.php" >
                <div class="box-body">
                    <div class="form-group">
                        <label for="cid">Number</label>
                        <input readonly value="<?php echo $anm; ?>" class="form-control" id="cid" name="cid"  >
                    </div>
                    <div class="form-group">
                        <label for="anm">Announcment</label>
                        <input  class="form-control" id="cat" name="cat" placeholder="Announcment" required>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <input type="file" id="img" name="img" style="float: left" accept="image/*">
            </form>
        </div>
    </div>
</div>
</section>

<!-- /.box -->

