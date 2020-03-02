<?php include "header.php";
if(!empty($_GET['m'])and !empty($_GET['y']))
    {
        $m=$_GET['m'];
        $y=$_GET['y'];
    }
else
    {
        $m=date('m');
        $y=date('Y');
    }

    $cn=mysqli_connect(Host,UN,PW,DBname);
    $res=mysqli_query($cn,"select DISTINCT u.name from users u join codeblue_schedule s on(u.id=s.emp_id)");
   // $arr=array();
    $i=0;
    while ($ar=mysqli_fetch_array($res))
    {$arr[$i][0]=$ar[0];$i++;
   // echo $ar[0];
    }
    $arc= count($arr);

    $x= cal_days_in_month(CAL_GREGORIAN,$m,$y);

    for($i=1;$i<=$x;$i++)
    {
        $day = "$y-$m-$i";
        $newDate = date("l-d", strtotime($day));
        for($j=0;$j<$arc;$j++) {
            $name=$arr[$j][0];
            $rslt=mysqli_query($cn,"select t_from,t_to from codeblue_schedule where t_day='$y-$m-$i' and emp_id=(select id from users where name='$name');");
            if($fromto=mysqli_fetch_array($rslt))
                $arr[$j][$i]="$fromto[0]-$fromto[1]";
            else $arr[$j][$i]="off";
        }
    }
   // var_dump($arr);

?>
<section class="content">
    <div class="row ">
        <div style="padding-left: 10%;width: 90%" >

            <div class="box my-3 ">
                <form method="get" action="schedule.php" class="form-inline d-flex">
                    <input class="form-control col-md-2"  placeholder="Month" id="m" name="m" type="text">
                    <input class="form-control col-md-2 mx-2"  placeholder="Year" name="y" id="y" type="text">
                    <input class="btn btn-primary"     value="change date" type="submit">
                <a class="btn btn-success ml-auto"  href="newschedule.php">Add new time to schedule</a>
                </form>
                <!-- /.box-header -->                    
                </div>

            <div class="box-body col-md-offset-2">
                    <table id="example2" class="table table-bordered table-hover">
                        <?php
                            for($i=0;$i<$x;$i++) {
                                if ($i == 0)
                                    echo "<thead><tr>
                                            <td>date</td>";
                                else if ($i == 1) echo "<tbody><tr>";
                               else echo "<tr>";
                                $day = "$y-$m-$i";
                                $newDate = date("l-d", strtotime($day));

                              if($i>0) echo "<td>$newDate</td>";
                                for ($j = 0; $j < $arc; $j++) {
                                    $pr = $arr[$j][$i];

                                    if($pr!="off" and $i>0)
                                    {
                                        $name=$arr[$j][0];
                                        $getid=mysqli_query($cn,"select id from codeblue_schedule where t_day='$y-$m-$i' and emp_id=(select id from users where name='$name');");
                                        $sid=mysqli_fetch_array($getid)[0];
                                       if($_SESSION['role']=='admin') echo "<td><a href='editschedule.php?sid=$sid'>$pr</a></td>";
                                       else echo "<td>$pr</td>";
                                    }
                                    else echo "<td>$pr</td>";
                                }
                                if ($i == 0)
                                    echo "</thead>";
                                else if ($i == 1) echo "</tbody>";

                                echo "</tr>";

                            }
                        ?>
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
</section>

<script>
    $("#sc").css("color"," rgb(0,123,255)");

</script>

<?php include "footer.php"?>
