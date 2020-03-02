<?php include 'header.php' ;
include "adminonly.php";
?>


<section class="container" >
    <h1 style="text-align: left">
        Users
    </h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Role </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include "dbinfo.php";
                        $cn1=mysqli_connect(Host,UN,PW,DBname);
                        $q=$_GET['q'];
                        $rslt1=mysqli_query($cn1,"select * from users where user_name like '%$q%'");
                        while($arr1=mysqli_fetch_array($rslt1))
                        {
                            $cnm=$arr1[0];

                            ?>
                            <tr>
                                <td><?php echo "$arr1[0]"; ?></td>
                                <td><?php echo "$arr1[1]"; ?></td>
                                <td><?php echo "$arr1[3]"; ?></td>

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



