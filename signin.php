<?php session_start();?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'psitedb';


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$button = $_POST["Login"];



if($button=="Sign in")
{


$email = mysqli_escape_string($conn,stripslashes(htmlspecialchars(trim($_POST['email']))));
$pword = mysqli_escape_string($conn,stripslashes(htmlspecialchars(trim($_POST['pword']))));

// echo $email;
// echo $pword;

$sql = "SELECT * FROM userstbl WHERE (email='$email' OR username='$email') AND password='$pword' AND status='active'";

$query = mysqli_query($conn,$sql);
$s=mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);


if( $s== 0){
 

 
$file = "signin.php";
echo '<script type="text/javascript">window.location.assign("'.$file.'")</script>';
   
}
else{

        $_SESSION['uid'] = $row['id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['usertype']=$row['usertype'];
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastname']=$row['lastname'];
        $_SESSION['dateexpiration']=$row['dateexpiration'];
        $_SESSION['email']=$row['email'];
        $_SESSION['status']=$row['status'];
        $_SESSION['institution']=$row['institution'];
        $_SESSION['date']=$row['date'];
        $_SESSION['type']=$row['type'];

        if($_SESSION['username']==""){
       header("Location: signin.php");}
        else if($_SESSION['usertype']=='admin'){
      header("Location: admin.php");}
        else{
        header("Location: index.php");
      }
}

}
mysqli_close($conn);
// include 'close.php';

?>
<!DOCTYPE html5>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Page</title>

    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 
  <body>
   
   <div class="container background">
      
      <form class="form-signin" role="form" method="POST" action="signin.php">
        
        <h2 class="form-signin-heading">Please sign in</h2>
        <!-- <div class="alert alert-success" role="alert">Well done! You successfully read this important alert message.</div>
        <div class="alert alert-info" role="alert">Heads up! This alert needs your attention, but it's not super important.</div>
        <div class="alert alert-warning" role="alert">Warning! Better check yourself, you're not looking too good.</div> -->
 
        
      
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <input type="password" class="form-control" name="pword" placeholder="Password" required>
       
                                
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div> -->
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="Login" value="Sign in" >
         <h4 style='color:#0000ff;margin:0;'> Dont have an account yet!</h4>  
        <a href="index.php#membership">Become a member now</a>
      
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>