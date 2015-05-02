<?php @session_start();?>
<?php
if($_SESSION['uid']!=""){
session_destroy();
// echo $_SESSION['uid'];
// @header ('Location: index.php');
$file = "index.php";
// echo '<script type="text/javascript">alert("hello");</script>';
echo '<script type="text/javascript">window.location.assign("'.$file.'");</script>';

}else{
// @header ('Location: index.php');
$file="index.php";
echo '<script type="text/javascript">window.location.assign("'.$file.'");</script>';
}
?>