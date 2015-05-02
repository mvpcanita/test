<?php 
$id = $_GET['id'];
$file = "/psite/pollsresults.php?id=".$id;
//$file = "/psite/membership.php";
echo '<script type="text/javascript">window.location.assign("'.$file.'")</script>';
///header("Location: psite/admin.php");
?>