<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    include("conn.php");
    require_once "functions.php";

    if (isset($_POST['email'])) {
        

      $email=mysqli_real_escape_string($con,$_POST['email']);
      $q="SELECT * FROM `nw` WHERE `Email`='$email'";
      $run=mysqli_query($con,$q);
      $info=mysqli_fetch_assoc($run);
      $row=mysqli_num_rows($run);
      if ($row>0)
        {

            $token = generateNewString();

	        $con->query("UPDATE `nw` SET `token`='$token', 
                      `tokenexpiry`=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                      WHERE `Email`='$email'
            ");

	        
	        require "vendor/autoload.php";
            
	        $mail = new PHPMailer(true);
                //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.hostinger.in';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'admin@elitesrank.com';                     // SMTP username
    $mail->Password   = 'Technocrats@1234';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
	        
            $mail->addAddress($email);
	        $mail->setFrom("admin@elitesrank.com", "ElitesRank");
	        $mail->Subject = "!!!!  Reset Password  !!!!";
	        $mail->isHTML(true);
	        $mail->Body = "
	            Hi ,<br><br>
	            
	            In order to reset your password, please click on the link below:<br>
	            <a href='
	            https://elitesrank.com/forgot2.php?email=$email&token=$token
	            '>https://elitesrank.com/forgot?$email$token</a><br><br>
	            
	            Kind Regards,<br>
	           technocrats
	        ";

	        if ($mail->send())
    	        exit(json_encode(array("status" => 1, "msg" => 'Please Check Your Email Inbox!')));
    	    else
    	        exit(json_encode(array("status" => 0, "msg" => 'Something Wrong Just Happened! Please try again!')));
        } else
            exit(json_encode(array("status" => 0, "msg" => 'Please Check Your Inputs!')));
    }
?>





<!DOCTYPE html>
<html>
<head>
    <title>ElitesRank : Forgot Password</title>
    <link rel = "icon" href ="yo.png" type = "image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="forgot.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
     <script src="https://kit.fontawesome.com/a076d05399.js"></script>
     
</head>
<body>
<div class="bg"><br>
  <div class="bg1">

<form method="post">
  <div class="container">
    <div class="logo" style="padding: 2px;">
      <img src="pic.png" >

    </div> 
   <hr>
    
     
    <i class="fas fa-user-tie" style="font-size:  80px;margin:0 38%;"></i>
    <br><br>
                <p id="response"></p>
    
    <br>
    <input class="ef" type="email" id="email" placeholder="Your Email Address" required>

     <input type="button" class="btn btn-primary" value="NEXT" style="font-size:20px;background-color: #4CAF50;color:white;float: left;width: 100%;padding:14px 20px;margin:8px 0;border:none;">
               
    <br><br>
                <span id="response"></span>
    <h2 style="text-align: center;color: #00c4ff;margin-top: 24px; ">Forgot Password</h2>
    </div>
</form>
</div>
</div>
</body>
</html>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var email = $("#email");

        $(document).ready(function () {
            $('.btn-primary').on('click', function () {
                if (email.val() != "") {
                    email.css('border', '1px solid green');

                    $.ajax({
                       url: 'forgotPassword.php',
                       method: 'POST',
                       dataType: 'json',
                       data: {
                           email: email.val()
                       }, success: function (response) {
                            if (!response.success)
                                $("#response").html(response.msg).css('color', "red");
                            else
                                $("#response").html(response.msg).css('color', "green");
                        }
                    });
                }
            });
        });
    </script>

