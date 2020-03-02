<?php
session_start();
if(!isset($_SESSION['uid']) and !isset($_SESSION['role']))
{
    header("location:login.php");
}
include "dbinfo.php";

if ($_SESSION['role']=='admin')
{
    $cn2=mysqli_connect(Host,UN,PW,DBname);
    $rslt2=mysqli_query($cn2,"select count(1) from users where role='pendding'");
    $arr2=mysqli_fetch_array($rslt2);
    $newusers=$arr2[0];
}
?>
<html>
<head>
    <title>Code-Blue</title>
    <meta charset="utf-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/all.js" integrity="sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"></link>
    <style>
        .dropdown-item{
            white-space: normal;
            width:320px;
            border-bottom:1px solid #CDCACA;
        }

        .clip-polygon {
            -webkit-clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
            clip-path: polygon(50% 0%, 100% 38%, 82% 100%, 18% 100%, 0% 38%);
        }
    </style>

</head>


<body onload="timercount()">
	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
    $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
    </script>

    
    <div style=" background-image:url(img/top1.jpg);  background-repeat: no-repeat;background-size: 100% 100%;">
	<div class="container">
    <div class="row">
    <div class=" col-sm-12 col-md-6">
      <div class="btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group m-2" role="group" aria-label="First group">
    <div class="dropdown show">
  <a  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="fa-layers fa-fw  fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Notifications">
    <i class="fas fa-bell" style="color:rgb(37,75,156);" onclick="showAnnouncments()"></i>
        <div id="announcounter">
            </div>
  </span>
  </a>

  <div class="dropdown-menu" id="announmenu" aria-labelledby="dropdownMenuLink" style="z-index: 90000 !important; max-height:400px;overflow:auto;" >
aa
  </div>
</div>
        <span class="fa-layers fa-fw  fa-2x mx-1" data-toggle="tooltip" data-placement="bottom" title="Admin Profile">
        <div>
          <?php if ($_SESSION['role']=='admin' and $newusers>0) echo '<span class="fa-layers-counter fa-lg" style="background:Tomato">'.$newusers.'</span>'; ?>
        </div>
        <a href="superadmin.php"><i class="fas fa-user " style="color:rgb(37,75,156);"></i>
        </a></span>
        <span data-toggle="tooltip" data-placement="bottom" title="Contact Us"><a href="#" data-toggle="modal" id="phoneinfo"  data-target="#exampleModal2"><i class="fas fa-phone-square fa-2x mx-1" style="color:rgb(37,75,156);" ></i></a></span>
    <a href="process/logout.php" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="fas fa-sign-out-alt fa-2x mx-1" style="color:rgb(37,75,156);"  ></i></a>


  </div>
  <?php /*if($_SESSION['role']=='admin') */echo'
    <form method="get" action="search.php">
  <div class=" input-group py-1 border-dark"  >
      <span class=" input-group-btn  ">
        <button onclick="submit()" class=" btn btn-light " type="button"><i class="fas fa-search"></i></button>
      </span>
      <input type="text" name="q" class="form-control border-0 bg-light my-0 py-0" placeholder="Search for..." aria-label="Search for...">
    </div></form>';?>

</div>
    </div>
    <div class=" col-sm-12 col-md-6 ">
      <img class="" src="img/kfmc_logo.png" width="70%" style="margin: 15px"  alt=""/>
    </div>
    <div class=" col-12 d-flex justify-content-center">
        <nav class="navbar navbar-expand-md navbar-dark sticky-top font-weight-bold mb-2  " style="background-color:transparent;"  >
    <div class="container">
    <button class="navbar-toggler navbar-toggler-right border-0 " type="button" data-toggle="collapse" data-target="#navbar16">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbar16">
        <ul class="navbar-nav mr-auto ">
            <li  class="nav-item active"> <a id="hm" class="nav-link" style="color: rgb(37,75,156)" href="index.php">Home</a> </li>
     <!--       <li  class="nav-item"> <a id="st" class="nav-link" style="color: rgb(37,75,156)"  href="statistics.php">Statistcs</a> </li>-->
            <li  class="nav-item"> <a class="nav-link" id="sc" style="color: rgb(37,75,156)" href="schedule.php">Schedule</a> </li>
          <!--  <li  class="nav-item"> <a class="nav-link" href="process/logout.php">Logout</a> </li> -->
            <li class="nav-item "> <a class="nav-link" id="cb" style="color: rgb(37,75,156)" href="codeblue.php">Code Blue</a> </li>
        </ul>
      </div>
    </div>
  </nav>
    </div>
  	</div>
    </div>
    </div>
    
    <div class="modal fade" style="margin-top: 7%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Announcment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

      <div class="modal-body" id="announbody">
        ...
      </div>

    </div>
  </div>
</div>

<div class="modal fade" style="margin-top: 7%;" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">phone number</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>

    </div>
  </div>
</div>
    <script>

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});



        function announcount() {
            var xhttp;
            str=<?php echo $_SESSION['uid']?>;
            if (str == "") {
                document.getElementById("announcounter").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("announcounter").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "process/announcounter.php?q="+str, true);
            xhttp.send();
        }

        function timercount(){
            // do whatever you like here
            announcount();
            setInterval(announcount, 3000);
        }



        function openAnnouncments(str) {
            debugger;
            var xhttp;
            if (str == "") {
                document.getElementById("announbody").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("announbody").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "process/openannoun.php?q="+str, true);
            xhttp.send();
            announcount();
        }

        function showAnnouncments() {
            debugger;
            var xhttp;
            str=<?php echo $_SESSION['uid']?>;
            if (str == "") {
                document.getElementById("announmenu").innerHTML = "";
                return;
            }
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("announmenu").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "process/getannoun.php?q="+str, true);
            xhttp.send();
            announcount();
        }



    </script>