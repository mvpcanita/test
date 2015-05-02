<?php
include 'dbconnect.php';
include 'errorMsg.php';
$date = $_POST['date'];
$button = $_POST['save'];

if ($button == 'saveSetting'){
$nav = "settings";
$sql1 = "SELECT * FROM userstbl";
                    
                    $result1 = mysqli_query($conn,$sql1);

                    if (mysqli_num_rows($result1) > 0) {

                    
                    while($row = mysqli_fetch_assoc($result1)) 

                        {
                            $id = $row['id'];
                            $sql2 = "UPDATE userstbl SET dateexpiration='$date' WHERE id='$id'";
                            $result2 = mysqli_query($conn,$sql2);
                           
                        }

                          
                        }
                     
}else {}

include 'close.php';

$nav;
include 'redirect.php';
?>