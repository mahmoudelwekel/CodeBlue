<?php
include "../dbinfo.php";
$cn=mysqli_connect(Host,UN,PW,DBname);

if (isset($_POST["operator"])&&isset($_POST["age"])&&isset($_POST["hospital"])&&isset($_POST["floor"])&&isset($_POST["place"])&&isset($_POST["cbno"])&&isset($_POST["mail"])) {
    $n1 = $_POST["operator"];
    $n2 = $_POST["age"];
    $n3 = $_POST["hospital"];
    $n4 = $_POST["floor"];
    $n5 = $_POST["place"];
    $n6 = $_POST["cbno"];
    if(isset($_POST["feed"])) $n7=$_POST["feed"];
    else $n7=" ";

    $message = "<html>
<head>
    <script defer src=\"https://use.fontawesome.com/releases/v5.4.2/js/all.js\" integrity=\"sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN\" crossorigin=\"anonymous\"></script>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\" integrity=\"sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb\" crossorigin=\"anonymous\"></link>
</head>
<body>
<div style=\"width:100%;margin-top: 50px\" class=\" container col-md-5 \">
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">Code blue operator</label>

            <input class=\"form-control\" id=\"operator\" name=\"operator\" placeholder=\"Code blue operator\"  aria-describedby=\"emailHelp\">
        </div>
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">Is it Adult or Pediatric (Pediatric= 14 years or less)</label>
            <div class=\"form-check\">
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"age\" id=\"age1\"  value=\"1\">
                    Adult
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"age\" id=\"age2\" value=\"2\">
                    Pediatric
                </label>
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">Which Hospital?</label>
            <div class=\"form-check\">
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"hospital\" id=\"hospital1\" value=\"1\">
                    Main
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"hospital\" id=\"hospital2\" value=\"2\">
                    Pediatric/Children
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"hospital\" id=\"hospital3\" value=\"3\">
                    Maternity
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"hospital\" id=\"hospital4\" value=\"4\">
                    Rehabilitation/Rehab
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"hospital\" id=\"hospital5\" value=\"5\">
                    Ambulatory/New OPD
                </label>
            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">Which Floor</label>
            <div class=\"form-check\">
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor1\" value=\"1\">
                    Basement
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor2\" value=\"2\">
                    Ground
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor3\" value=\"3\">
                    1st
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor4\" value=\"4\">
                    2nd
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor5\" value=\"5\">
                    3rd
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor6\" value=\"6\">
                    4th
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor7\" value=\"7\">
                    5th
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor\" id=\"floor8\" value=\"8\">
                    6th
                </label>
                <label class=\"form-check-label\">
                    <input type=\"radio\" class=\"\" name=\"floor9\" id=\"floor\" value=\"9\">
                    7th
                </label>

            </div>
        </div>
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">Where?</label>
            <input class=\"form-control \" id=\"place\" name=\"place\" placeholder=\"Where? (Ward/Unit/clinic/Office/Other)\" aria-describedby=\"emailHelp\">
        </div>
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">Location Code</label>

            <input class=\"form-control \" id=\"loc\" name=\"loc\" placeholder=\"\" aria-describedby=\"emailHelp\">

        </div>
        <div class=\"form-group\">
            <label for=\"staticEmail\" class=\" col-form-label\">FeedBack</label>

            <input class=\"form-control\" id=\"feed\" name=\"feed\" placeholder=\"Feedback\" type=\"text\" >
        </div>

        <div style=\"width:100%;\" class=\"d-flex justify-content-center\">

</div>

<script type='application/javascript'>
    
    document.getElementById('operator').value='$n1';
    document.getElementById('age$n2').checked='checked';
    document.getElementById('hospital$n3').checked='checked';
    document.getElementById('floor$n4').checked='checked';
    document.getElementById('place').value='$n5';
    document.getElementById('loc').value='$n6';
    document.getElementById('feed').value='$n7';
    
</script>

</body>
</html>";


    $to = $_POST["mail"];


    $subject = "Code blue live form";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Codeblue' . "\r\n";
    $t=false;
    $earr=array('falselham@kfmc.med.sa','jalonezi@kfmc.med.sa','amafaqihi@kfmc.med.sa','nmella@kfmc.med.sa');
    for($i=1;$i<5;$i++)
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
    $headers .= "\r\n";

    mail($to,$subject,$message,$headers);

  if(!mysqli_query($cn , "insert into code_blue_live values (null,'$n1','$n2','$n3','$n4','$n5','$n6',CURRENT_TIMESTAMP,'$n7' )"))
       echo mysqli_error($cn);
    else  header("location:../life.php");
}
else   header("location:../.php?error=invalid");

