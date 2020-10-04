<?php
 
 session_start();
    include("conn.php");
	require_once "functions.php";

 
	if (isset($_GET['email']) && isset($_GET['token'])) {


		$email = $_GET['email'];
		$token = $_GET['token'];
		$sql ="SELECT * FROM `nw` WHERE
			`Email`='$email' AND `token`='$token'
		";
        $run= mysqli_query($con,$sql);

		if (mysqli_num_rows($run) > 0) {
            
        $_SESSION['email']=$email;
?>






<!DOCTYPE html>
<html>
<head>
<title>ElitesRank : Forgot Password</title>
<link rel = "icon" href ="yo.png" type = "image/x-icon">
<link rel="stylesheet" type="text/css" href="forgot.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");



myInput.onkeyup = function() {
  
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

<script >
var check = function() {
  if (document.getElementById('psw').value ==document.getElementById('confirm_password').value)
  {
    document.getElementById('confirm_password').style.color = 'green';
    
  } else {
    document.getElementById('confirm_password').style.color = 'red';
    
  }
}
</script>



<body>
<div class="bg"><br>
  <div class="bg1"></div>
</div>
<form action="forgotverify2" method="post" >
  <div class="container">
    <div class="logo" style="padding: 2px;">
      <img src="pic.png" >

    </div> 
   <hr>
    <h2 style="text-align: center;color: #00c4ff ">Reset Password</h2>
  
    
    
    

    <input class="ef" type="password" id="psw"  onkeyup='check();' name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter New Password" required>

    
    <input class="ef" type="password" id="confirm_password"  onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Confirm New Password" name="psw-repeat" required>
    <input type="checkbox" onclick="myFunction()">Show Password
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
</script>
    
      <button type="submit" name="submit" class="signupbtn">Submit</button>
    </div>
    
  
</form>

</body>
</html>
<?php
      $con->query("UPDATE `nw` SET `token`=''
				WHERE `Email`='$email'
			");  }
            else{
            session_destroy();}
            
    }

?>      