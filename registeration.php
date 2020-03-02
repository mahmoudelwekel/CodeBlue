
<html>
	<head>
		<title>Registeration</title>
    <meta charset="utf-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    
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
    
    <div style="width:100%;" class="d-flex justify-content-center">
    <form method="post" action="process/regist.php">
  <div class="form-group">
    <input type="text" class="form-control form-control-lg" id="un" name="un" aria-describedby="emailHelp" placeholder="User Name" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control form-control-lg " id="pw" name="pw" placeholder="Password" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control form-control-lg" id="cpw" name="cpw" placeholder="Confirm Password" required>
  </div>
  <div class="form-group">
    <input type="text" class="form-control form-control-lg" id="nm" name="nm" placeholder="Name" required>
  </div>
  <div class="form-group">
    <input type="email" class="form-control form-control-lg" id="em" name="em" placeholder="E-mail" required>
  </div>
        <div class="form-group form-check d-flex" style="padding-left: 20%">
            <input type="checkbox" class="form-check-input" onclick="shwp()" >
            <label class="form-check-label" >Show Password</label>
        </div>
  </div>
  
  
  
  
    <div style="width:100%;" class="d-flex justify-content-center">

  <button type="submit" class="btn btn-primary" onclick="return validate()">Register</button>
</form>
    </div>
    
    
    
    
    
    
    </div>
    </div>
    </div>
    
   
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>

        function  validate() {
            debugger;
            var x = document.getElementById("pw");
            var y = document.getElementById("cpw");
            if(x.value!=y.value)

            {
                x.classList.add("btn-danger");
                y.classList.add("btn-danger");
                return false;
            }
            else return true;
        }


        function shwp() {
            debugger
            var x = document.getElementById("pw");
            var y = document.getElementById("cpw");
            if (x.type == "password") {
                x.type = "text";
                y.type = "text";
            }

            else {
                x.type = "password";
                y.type = "password";
            }

        }
    </script>
</body>
</html>