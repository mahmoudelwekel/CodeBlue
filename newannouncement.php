<?php  include 'header.php'; ?>

<?php include "adminonly.php";?>
<div class="container">
<form id="form" method="post" enctype="multipart/form-data"  action="process/announc1proces.php" >
    <div class="box-body">
        <div class="form-group" style="text-align: left">
        </div>
        <div class="form-group" style="text-align: left">

        <input  class="form-control col-md-6" id="uid" name="uid" placeholder=" Announcment title" required>
        </div>
            <div class="form-group" style="text-align: left">


            <input type="file" id="img" name="img" style="float: left" accept="image/*">
            </div>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer" >
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
    </div>
</form>

</div>