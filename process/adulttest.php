<?php

$q='insert into code_blue_adult_test values (NULL,';
$pagerarr=array();
$iphonearr=array();

if(isset($_POST['feed']))$feed=$_POST['feed'];
else $feed=" ";
for($i=1;$i<19;$i++)
{
    if(isset($_POST['pager'.$i]))
    { $q.="1,";$pagerarr[$i]=1;}
    else {$q.="0,";$pagerarr[$i]=0;}
}
for($i=1;$i<19;$i++)
{
    if(isset($_POST['iphone'.$i]))
    {$q.="1,";$iphonearr[$i]=1;}
    else{ $q.="0,";$iphonearr[$i]=0;}
}
$q.= '\''.date("Y-m-d H:i:s")."','$feed');";

$message= "<html>
<head>
    <script defer src=\"https://use.fontawesome.com/releases/v5.4.2/js/all.js\" integrity=\"sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN\" crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\" integrity=\"sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb\" crossorigin=\"anonymous\"></link>
</head>

<div style=\"width:100%;margin-top: 50px\" class=\" container  \">
        <div class=\"form-group\">

                <h3 style=\"text-align: left\">
                    CODE BLUE TEST: PAGING SYSTEM / IPHONE (ADULT TEAM)
                </h3>
                <div class=\"row\">
                    <div class=\"col-xs-12\">
                        <div class=\"box\">
                            <!-- /.box-header -->
                            <div class=\"box-body\">
                                <table id=\"example2\" class=\"table table-bordered table-hover\">
                                    <thead style=\"background-color: #B7E4FF\">
                                    <tr>
                                        <th  style=\"text-align: center\">Holders</th>
                                        <th colspan=\"2\" style=\"text-align: center\">Responded</th>
                                        <th colspan=\"2\" style=\"text-align: center\">Informed Helpdesk
                                            They Received No Bleep/Message
                                        </th>
                                        <th colspan=\"2\" style=\"text-align: center\">No Response At All</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td style=\"width: 25%\">Senior Medical Resident / Medical Assistant Consultant (Team Leader)</td>
                                            <td>

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager1\" id=\"pager1\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone1\" id=\"iphone1\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager2\" id=\"pager2\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone2\" id=\"iphone2\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager3\" id=\"pager3\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone3\" id=\"iphone3\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"width: 25%\">Floor Medical Resident On- Call</td>
                                            <td>

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager4\" id=\"pager4\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone4\" id=\"iphone4\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager5\" id=\"pager5\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone5\" id=\"iphone5\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager6\" id=\"pager6\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone6\" id=\"iphone6\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"width: 25%\">Assistant Consultant Anesthetist On-Call</td>
                                            <td>

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager7\" id=\"pager7\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone7\" id=\"iphone7\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager8\" id=\"pager8\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone8\" id=\"iphone8\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager9\" id=\"pager9\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone9\" id=\"iphone9\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"width: 25%\">Respiratory Therapist</td>
                                            <td>

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager10\" id=\"pager10\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone10\" id=\"iphone10\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager11\" id=\"pager11\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone11\" id=\"iphone11\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager12\" id=\"pager12\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone12\" id=\"iphone12\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"width: 25%\">CCU Nurse</td>
                                            <td>

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager13\" id=\"pager13\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone13\" id=\"iphone13\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager14\" id=\"pager14\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone14\" id=\"iphone14\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager15\" id=\"pager15\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone15\" id=\"iphone15\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=\"width: 25%\">Main Hospital Nurse Bleep Holder</td>
                                            <td>

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager16\" id=\"pager16\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone16\" id=\"iphone16\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager17\" id=\"pager17\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone17\" id=\"iphone17\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                            <td style=\"width: 12.5%\">

                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"pager18\" id=\"pager18\" value=\"1\">
                                                        Pager
                                                    </label>

                                            </td>
                                            <td style=\"width: 12.5%\">
                                                    <label class=\"form-check-label\">
                                                        <input type=\"checkbox\" class=\"\" name=\"iphone18\" id=\"iphone18\" value=\"2\">
                                                        IPhone
                                                    </label>
                                            </td>
                                        </tr>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <div class=\"form-group\">
                <label for=\"staticEmail\" class=\" col-form-label\">FeedBack</label>

                <input class=\"form-control\" id=\"feed\" name=\"feed\" placeholder=\"Feedback\" type=\"text\" >
                </div>
    </form>
</div>";
$message.= "<script> debugger; document.getElementById('feed').value='$feed'; \n";

for($i=1;$i<19;$i++)
{
    if($pagerarr[$i]==1)$message.= "document.getElementById('pager$i').checked='checked';\n";
    if($iphonearr[$i]==1)$message.= "document.getElementById('iphone$i').checked='checked';\n";
}

$message.= "</script>";
//echo $message;


if(isset($_POST['mail'])) $to=$_POST['mail'];
else $to = "mmabubay@kfmc.med.sa";
$subject = "Code blue live form";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Codeblue' . "\r\n";
$earr=array('falselham@kfmc.med.sa','falajmi@kfmc.med.sa','jalonezi@kfmc.med.sa','amafaqihi@kfmc.med.sa','bmousa@kfmc.med.sa','slhussain@kfmc.med.sa','nmella@kfmc.med.sa');
for($i=1;$i<8;$i++)
{
    if(isset($_POST["e$i"]))
    {
        if($t==false)
        {
            $headers .= 'Cc: ';
            $headers.=$earr[$i-1];
            $t=true;
        }
        else
        {
            $headers.=",";
            $headers.=$earr[$i-1];
        }
    }

}
$headers .= "\r\n";mail($to,$subject,$message,$headers);

include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);
if(!mysqli_query($cn , $q))
    echo mysqli_error($cn);
else  header("location:../testadult.php");

