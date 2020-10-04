<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
include("conn.php");

require_once "functions.php";

$name = mysqli_real_escape_string($con,$_POST['name']);
$pass = mysqli_real_escape_string($con, $_POST['psw']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$pass2= mysqli_real_escape_string($con, $_POST['confirm_password']);


if ($pass===$pass2)
{
 
//$pass = password_hash($pass,PASSWORD_BCRYPT);   

$q = "SELECT * FROM `nw` WHERE `Email`='$email'";
$run=mysqli_query($con,$q);

if(mysqli_num_rows($run)>=1)
{  
    ?>
<script>
    alert("user already exists");
    window.location.href="login";
</script>
    <?php
    session_destroy();
}
else{
    $_SESSION['EMAIL']=$email;
    $UID = generateNewString();
    $qy = "INSERT INTO `nw`(`UID`,`UserName`, `Email`, `Password`) VALUES ('$UID',?,?,?)";
    $stmt=mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$qy)){
        echo "SQL error";
    }
    else{
        mysqli_stmt_bind_param($stmt,"sss", $name , $email , $pass);
        mysqli_stmt_execute($stmt);
    }
   $ci="INSERT INTO `c++`(`Email`) VALUES ('$email')";
   $r=mysqli_query($con,$ci);
   if($run==true)
   {
       
    require 'vendor/autoload.php';

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.hostinger.in';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'admin@elitesrank.com';                     // SMTP username
        $mail->Password   = 'Technocrats@1234';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('admin@elitesrank.com', 'ElitesRank');
        $mail->addAddress($email,$name);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('admin@elitesrank.com', 'Information');
        //$mail->addCC('cc@example.com');
      //  $mail->addBCC('bcc@example.com');
    
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '!! Welcome To ElitesRank Family !!';
        $mail->Body    = " 
        <div style='margin:2% ; padding:2% ; background-color: #66dbff;color:white; '>
        <center>
        <img src='https://elitesrank.com/pic.png'  width='200px' height='65px' border='0' style='border:0; outline:none; text-decoration:none; display:block;'>
        <br>
         
        <h3><b>Dear ElitesRank user,</b></h3><br>
        <h4>Thank you for choosing ElitesRank!</h4>
        <h4>Please verify your email address by clicking the verify button below :</h4><br>
        
        <a href='https://elitesrank.com/signupverify.php?UID=$UID' style='background-color: #4CAF50;color:white;padding:10px;text-decoration:none;'>Verify Now</a><br><br>
        </center>
        Kind regards,<br>
        Team Technocrats
        </div>";
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        ?>
        <script type="text/javascript">
            window.location.href="emailverify";
        </script>
        <?php
        
    } catch (Exception $e) {
        echo "{$mail->ErrorInfo}";
    }
    
    
    
   }
   else{
       ?>

<script>
           alert("Unsuccessfull");
       </script>
       <?php
   }
}
}
else
{
    ?>
    
<script>
    alert("Password doesnot match");
    window.location.href="login";
</script>
    <?php
}

?>