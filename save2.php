<?php

include 'dbconnect.php';
include 'errorMsg.php';

$counts = $_POST['counts'];

for($ctr=1;$ctr<$counts;$ctr++){
    $temp2 = $_POST["saves$ctr"];
    $temp3 = $_POST["uids$ctr"];
    $temp4 = $_POST["sids$ctr"];

    
    if($temp2!="")
        {
            break;}
}


if($temp2 =='onlineRegister')
{
 $sql1 = "UPDATE onlineregistrationstbl SET eventstatus='REGISTERED' WHERE userid='$temp3' AND seminarid='$temp4'";

$result = mysqli_query($conn, $sql1);

$sql = "INSERT INTO registrationstbl (seminarid,userid,eventstatus) VALUES ('$temp4','$temp3','REGISTERED')";
$nav = "registrations";

}

if($sql!=""){

if (mysqli_query($conn, $sql)) {
   phpAlert( "Transaction Sucessful");
} else {
    phpAlert( "Error updating record: " . mysqli_error($conn) );
}
}

include 'close.php';

$nav;
include 'redirect.php';
?>