<?php
session_start();
if (isset($_SESSION["uid"]))
{
    header("location: index.php");
}
if(isset($_COOKIE['usercookie'])and isset($_COOKIE['passcookie']))
{
    $ucookie=$_COOKIE['usercookie'];
    $pcookie=$_COOKIE['passcookie'];
}
else
{
    $ucookie='';
    $pcookie='';
}
?>


<html>
	<head>
		<title>Code-Blue</title>
    <meta charset="utf-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    
<script src="bootstrap\jquery-3.1.1.min.js" ></script>
    <script src="bootstrap\popper.min.js" ></script>
    <script src="bootstrap\bootstrap.min.js"></script>
<script defer src="bootstrap\fontawesome-all.min.js" ></script>
    <link rel="stylesheet" href="bootstrap\bootstrap.min.css" ></link>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"></link>
	</head>
	
	<body  style=" background-image:url(img/DeathtoStock_Wired3.jpg);background-repeat: no-repeat;background-size: 100% 100%;">
    
    <div class="container">
    <div class="row d-flex justify-content-center">
    <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-6 my-lg-5 pb-5" style="background-color:white;opacity:.8;">
    
    <div style="width:100%;">
    <img class=" float-right mb-4" src="img/kfmc_logo.png" width="55%" style="margin-top: 10px" alt=""/>
    </div>

    <div style="width:100%; margin-bottom:200px;" class="d-flex justify-content-center">
    <img  src="img/Codeblue_blue-writnig.png"  height="40" alt=""/>
    </div>
        <?php
            if(isset($_SESSION['error']))
            { echo "<div class='d-flex justify-content-center mb-4 alert alert-danger' role='alert'>".$_SESSION['error']."</div>";
            unset($_SESSION['error']); }

?>
    <div style="width:100%;" class="d-flex justify-content-center">
    <form method="post" action="process/login_proc.php">
  <div class="form-group">
    <input type="text" class="form-control form-control-lg" id="un" name="un" value="<?php echo $ucookie?>" aria-describedby="emailHelp" placeholder="User Name" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control form-control-lg" id="pw" name="pw" value="<?php echo $pcookie?>" placeholder="Password" required>
  </div>

  </div>
  
  
    <div style="width:100%;" class="d-flex justify-content-center">

  <!--<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Forget Password</label>
  </div> -->
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="remember" name="remember">
    <label class="form-check-label" for="exampleCheck1">Remember ME</label>
      <br>
    <input type="checkbox" class="form-check-input" onclick="shwp()" >
    <label class="form-check-label" >Show Password</label>
  </div>

  </div>
  
  
    <div style="width:100%;" class="d-flex justify-content-center">

  
  <button type="submit" class="btn btn-primary">Login</button>
  </form>

  </div>
  
  
    <div style="width:100%;" class="d-flex justify-content-center">
  <form>

  <a href="registeration.php"  style="margin: 10px" class="btn btn-primary">Registeration</a>
</form>
    </div>
    
    
    
    
    
    
    </div>
    </div>
    </div>
    
   
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        function shwp() {
            debugger
            var x=document.getElementById("pw");
            if(x.type=="password")
            {
                x.type="text";}

            else
            {x.type="password";}
        }


    </script>
</body>
</html>
