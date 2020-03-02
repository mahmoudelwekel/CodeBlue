<?php include 'header.php' ;
include  'adminonly.php';?>


<section class="container" >
    <h1 class="my-4" style="text-align: center">
        Users Pending
    </h1>
    <div class="row">
        <div style="padding-left: 10%;width: 90%">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body ">
                    <table id="example2" class="table table-responsive-md table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Role </th>
                            <th style="text-align: center">Accept </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                       // include "dbinfo.php";
                        $cn1=mysqli_connect(Host,UN,PW,DBname);

                        $rslt1=mysqli_query($cn1,"select * from users WHERE role = 'pendding'");
                        while($arr1=mysqli_fetch_array($rslt1))
                        {
                            $cnm=$arr1[0];

                            ?>
                            <tr>
                                <td><?php echo "$arr1[1]"; ?></td>
                                <td><?php echo "$arr1[2]"; ?></td>
                                <td><?php echo "$arr1[3]"; ?></td>
                                <td><?php echo "<i class=\"fa fa-edit\"></i> <a  href='process/accept.php?cnm=$cnm'>accept</a>"; ?></td>

                            </tr>
                        <?php }?>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>

</div>



