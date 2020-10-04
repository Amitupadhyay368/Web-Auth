<?php

session_start();
include("conn.php");
if (isset($_POST['submit']))
{
    $email =$_SESSION['email'];
    $pass=mysqli_real_escape_string($con,$_POST['psw']);
    $pass2=mysqli_real_escape_string($con,$_POST['psw-repeat']);

    if ($pass===$pass2)
    {

    $q="SELECT * FROM `nw` WHERE `Email`='$email'";
    $run=mysqli_query($con,$q);
    $data=mysqli_fetch_assoc($run);

    $updt="UPDATE `nw` SET `Password` = '$pass' WHERE `ID` = $data[ID]";
    $run1=mysqli_query($con,$updt);
    if ($run1==true)
    {
       	?>
	<script type="text/javascript">
		alert("Password Updated Successfully");
        window.location.href="login";
	</script>
	<?php
    }
    else
    {
	  ?>
	  <script type="text/javascript">
		alert("ERROR");
	  </script>
	  <?php
    }

    }
    else
    {
    ?>
    <script type="text/javascript">
        alert("!!  Password Doesnot Match  !!");
        window.location.href="forgot2";
    </script>
    <?php
    } 
}





?>

