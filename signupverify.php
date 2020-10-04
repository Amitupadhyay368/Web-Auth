<?php
session_start();
  include("conn.php");
if(isset($_GET['UID']))
{
  $email=$_SESSION['EMAIL'];
  $uid=$_GET['UID'];
  $q="SELECT * FROM `nw` WHERE `UID`= '$uid' AND `verified`= 0";
  $run =mysqli_query($con,$q);
  $row = mysqli_num_rows($run);
  if($row>0)
  {
    $up="UPDATE `nw` SET `verified` = 1 WHERE `UID` = '$uid'";
    $run2=mysqli_query($con,$up);
    if($run2==true)
    {


?>


<!DOCTYPE html>
<html>
<head>
    <title>verify</title>
    <link rel = "icon" href ="yo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  
     <style >
  *{
  padding: 0%;
  margin :0 ;
  box-sizing: border-box;

  font-family: Arial, Helvetica, sans-serif;

}
body{

  height: 100vh;
  background-size: auto;
  box-sizing: border-box;
  font-family:sans-serif; 
}

.page{
  height: 100vh;
}


.middle {
  position: absolute;
  top: 48%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}


  


.glow {
  font-family: cursive;
  font-size: 80px;
  color: #fff;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #00c4ff, 0 0 40px #00c4ff, 0 0 50px #00c4ff, 0 0 60px #00c4ff, 0 0 70px #00c4ff;
  }
  
  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #99e7ff, 0 0 40px #99e7ff, 0 0 50px #99e7ff, 0 0 60px #99e7ff, 0 0 70px #99e7ff, 0 0 80px #99e7ff;
  }
}

.niche{
   position: fixed;
    bottom: 0;
    width: 100%;
  
  bottom: 0;
}


</style>
</head>
<body>
  <div class="page">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00c4ff" fill-opacity="1" d="M0,0L48,42.7C96,85,192,171,288,176C384,181,480,107,576,106.7C672,107,768,181,864,218.7C960,256,1056,256,1152,224C1248,192,1344,128,1392,96L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>

    
   
    

    
  <div class="middle" >
    <h1 style="color: black;font-size:4vh;" class="glow">Your e-mail ID has been successfully verified.</h1>
    
  </div>
  
     
   
<div class="niche">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00c4ff" fill-opacity="1" d="M0,0L48,42.7C96,85,192,171,288,176C384,181,480,107,576,106.7C672,107,768,181,864,218.7C960,256,1056,256,1152,224C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</div>
</div>
</body>
</html>

<?php

    }
    else
    {
      echo "ERROR";
    }
  }
  else{
    ?>
    <script>
      alert("!!!  Invalid ID  !!!");
    </script>
    <?php
  }
}
else{
  ?>
  <script>
    alert("!!! Something Went Wrong !!!");
  </script>
  <?php
}

?>




  