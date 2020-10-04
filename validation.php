<?php
session_start();
include("conn.php");


if(isset($_POST['submit']))
{

$email = mysqli_real_escape_string($con, $_POST['email']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);

$q = " SELECT * FROM `nw` WHERE `Email`= '$email' AND `Password`='$pass'";

$run=mysqli_query($con,$q);

$data = mysqli_fetch_assoc($run);
$verified=$data['verified'];
$uname = $data['UserName'];
$_SESSION['UNAME'] = $uname;
$_SESSION['EMAIL']=$email;


if(mysqli_num_rows($run)>=1){
    if($verified==1)
    {
    $time= time() + 86400;
    setcookie("email",$email,$time,"/");    
    header('location:Home1');
    
    }
    else
    {
        ?>
<script>
    alert("!!! Email is not verified yet !!!");
    window.location.href="login";
</script>
<?php
session_destroy();
    }
}
else{
    ?>
    <script>
        alert("Inavlid Email Or Password");
        window.location.href="login";
    </script>
    <?php
    session_destroy();
    

}
}

?>
