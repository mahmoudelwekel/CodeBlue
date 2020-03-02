

<?php  include 'header.php';
include "adminonly.php"; ?>



<section class="content container">
    <div class="row ">
        <div style="padding-left: 10%;width: 90%" >

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body col-md-offset-2 my-5">
                    <table id="example2" class="table table-responsive-md table-bordered table-hover ">
                        <thead>
                        <tr>

                            <th style="text-align: center">Announcment </th>
                            <th style="text-align: center">Image </th>
                            <th style="text-align: center">Date </th>
                            <th style="text-align: center">Show </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        // include "dbinfo.php";
                        $cn1=mysqli_connect(Host,UN,PW,DBname);
                        $uid = $_SESSION['uid'];
                        $rslt1=mysqli_query($cn1,"call getannouncementhistory ($uid) ");
                        while($arr1=mysqli_fetch_array($rslt1))
                        {
                            $cnm=$arr1[0];

                            ?>
                            <tr>

                                <td style="text-align: center"><?php echo "$arr1[0]"; ?></td>
                                <td  style="text-align: center"><IMG STYLE="Width:100px;" SRC=" <?php echo "$arr1[1]"; ?>"></td>
                                <td  style="text-align: center"><?php echo "$arr1[2]"; ?></td>

                                <td  style="text-align: center"><?php echo "<i class=\"fa fa-edit\"></i> <a href='$arr1[1]'>Tab Here</a>";?></td>


                            </tr>
                        <?php }?>
                        </tfoot>
                    </table>
                    <div id="myModal" class="modal">

                        <!-- The Close Button -->
                        <span class="close">&times;</span>

                        <!-- Modal Content (The Image) -->
                        <img class="modal-content" id="img01">

                        <!-- Modal Caption (Image Text) -->
                        <div id="caption"></div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section><?php include "footer.php";?>

