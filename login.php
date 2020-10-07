<?php
session_start();
if (isset($_SESSION['UNAME'])) 
{
  header('location:Home1');
  
}
else
{
?>




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ElitesRank : Login</title>
  <link rel = "icon" href ="yo.png" type = "image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css'>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Handlee|Josefin+Sans:300,600&amp;display=swap'><link rel="stylesheet" href="login3.css">
<style> .form-control{ font-family:Arial; } </style>
</head>
<body>
  
  
<!-- partial:index.partial.html -->
<div class="bg"><br>
  <div class="bg1"></div>

<div class="container" style="position:static;">
  
  <div class="card-wrap">
    <div class="card border-0 shadow card--welcome is-show" id="welcome">
      <div class="card-body">
      <div style="padding: 2px;">
      <img src="pic.png" style="width: 190px;height: 60px;" >
    <br><br>
    </div>
        <p>Welcome!!! to the login page</p><!-- welcome to login page -->
        <div class="btn-wrap"><a class="btn btn-lg btn-register js-btn" data-target="register">SIGN UP</a><a class="btn btn-lg btn-login js-btn" data-target="login">SIGN IN</a><br>
          <!---this is for signup from different social account----
          <p>Or Start With</p>
          
          <div class="logrow">
            <div class="logrow-in">
          <a class="btn btn-lg btn-sh "><i class="fab fa-google"></i></a><br>
        </div>
          <div class="logrow-in">
          <a class="btn btn-lg btn-sh "><i class="fab fa-facebook"></i></a>
        </div>
        </div>
        ------>
        </div>

      </div>
    </div>

    <!------------------------------sign up---------------------------------------------------->
    <div class="card border-0 shadow card--register" id="register">
      <div class="card-body">
        <div style="padding: 2px;">
      <img src="pic.png" style="width: 190px;height: 60px;" >

    </div>
        <h2 class="card-title">Create Account</h2>
        
<form action="registration.php" method = "post">
 <div class="form-group">
  <input  class="form-control"  type="text" placeholder="Enter User Name" name="name" id="nm" required>
 </div>
 <div class="form-group">
  <input class="form-control"  type="email" placeholder="Enter Email" name="email" id="em" required>
</div>
 <div class="form-group">
  <input class="form-control" type="password"  id="e_pass"  onkeyup='check();'   name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" name="psw" required />
  </div>
<div class="form-group">
   <input class="form-control" type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm Password" name="psw-repeat"  required />
      </div>
      <div class="form-group">
      <input type="checkbox" onclick="myFunction()">Show Password
      <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    <p>By creating an account you agree <br>to our <a href="terms.php" style="color:blue">Terms & Privacy</a>.</p>
          </div>

          
          <button type = "submit" class="btn btn-lg">SIGN UP</button>
        </form>
      </div>
      <button class="btn btn-back js-btn" data-target="welcome"><i class="fas fa-angle-left"></i></button>
    </div>



    <!------------------------------login---------------------------------------------------->


    <div class="card border-0 shadow card--login" id="login">
      <div class="card-body">
        <div style="padding: 2px;">
      <img src="pic.png" style="width: 190px;height: 60px;" >

    </div><br>
        <h2 class="card-title">Welcome Back!</h2>
        
        <form action = "validation.php" method ="post">
          <div class="form-group">
            <input  class="form-control"   type="email" placeholder="Enter Your Email" name="email" required>
          </div>
          <div class="form-group">
            <input class="form-control" type="password" placeholder="Enter Password" name="pass" id="myInput" required>
          </div>
           <div class="form-group">
          <input type="checkbox" onclick="myFunction21()">Show Password
          <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
          <div><a href="forgotPassword" style="color:blue;">Forgot password?</a></div>
          
        </div>

          <button type="submit" name="submit" class="btn btn-lg">SIGN IN</button>
        </form>
      </div>
      <button class="btn btn-back js-btn" data-target="welcome"><i class="fas fa-angle-left"></i></button>
    </div>
  </div>
</div>





<!-- partial -->
  <script  src="login.js"></script>
  <script>
function myFunction()
 {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction21()
 {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
var check = function() {
  if (document.getElementById('e_pass').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('confirm_password').style.color = 'green';
    
  } else {
    document.getElementById('confirm_password').style.color = 'red';
    
  }
}
</script>

</body>
</html>
<?php
}
?>



