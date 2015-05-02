<?php
  include 'dbconnect.php';
  include 'errorMsg.php';

	$id = $_GET['id'];
	$table = $_GET['arg']."tbl";
	$nav = $_GET['arg'];

// echo $id;
// echo $table;
// echo $nav;
	
	
	$sql = "DELETE FROM ".$table." WHERE id=".$id;

	// sending query
	if(mysqli_query($conn, $sql))
	phpAlert("Transaction Successful");
	else{
	 phpAlert("Record Not Deleted");
	  	}  	



	if($table == 'polls'){

		$sql1 = "DELETE FROM optionstbl WHERE id=".$id;
		$result = msqli_query($conn,$sql1);
	}

	
	
	include 'close.php';
	$nav;
	include 'redirect.php';

	//header("Location: index.php");
?>