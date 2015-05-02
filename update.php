
<?php
include 'dbconnect.php';
include 'errorMsg.php';



$button = $_POST['save'];
$title = $_POST['title'];
$description = $_POST['description'];
$id = $_GET['id'];
  $uname =    $_POST["uname"];
                    $pword = $_POST["pword"];
                    $firstname = $_POST["firstname"];
                    $lastname =     $_POST["lastname"];
                    $email =     $_POST["email"];
                    $institution =      $_POST["institution"];
                    $status =   $_POST["status"];
                    $type =       $_POST["type"];
                    $date = $_POST['date'];
                    $time = $_POST['time'];
                    $venue = $_POST['venue'];
                    $category = $_GET['category'];
                    $uid = $_GET['uid'];
                    $sid = $_GET['sid'];


if($button == 'editHome'){


$sql = "UPDATE hometbl SET title='$title', description='$description' WHERE id = 1";
$nav = "home";

}else if ($button == 'editContactUs'){

$sql = "UPDATE contactUstbl SET title='$title', description='$description' WHERE id = 1";
$nav = "contactus";


}else if($button == 'editAboutUs'){

$sql = "UPDATE aboutUstbl SET title='$title', description='$description' WHERE id = 1";
$nav = "aboutus";

}else if($button == 'editNews'){

$sql = "UPDATE newstbl SET title='$title', description='$description' WHERE id ='$id'";
$nav = "news";

}else if($button == 'editSeminars'){

$sql = "UPDATE seminarstbl SET title='$title', description='$description', `date`='$date', time='$time', venue='$venue' WHERE id ='$id'";
$nav = "seminars";

}else if($button == 'editJobs'){

$sql = "UPDATE jobstbl SET title='$title', description='$description' WHERE id ='$id'";
$nav = "jobs";

}else if($button =='editUsers'){
	 
$sql = "UPDATE userstbl SET username='$uname', 
						password='$pword' ,
						firstname = '$firstname' ,
						lastname = '$lastname' , 
						email = '$email' ,
						institution = '$institution' ,
						status = '$status' ,
						type = '$type',
						`date` = '$date' 
						WHERE id ='$id'";
$nav = "users";
}else if ($button == 'editPolls'){
   if($status == "active"){
$sql1 = "UPDATE pollstbl SET status='inactive'";
$result = mysqli_query($conn, $sql1);   
}    

$sql1 = "UPDATE pollstbl SET title='$title', status='$status' WHERE id ='$id'";
$result = mysqli_query($conn, $sql1);


// $count =1;
// while($count < 6){
//     $option = $_POST["option$count"];
//     $optionid = $_POST["optionid$count"];
//     $value = $_POST["value$count"];
//     if($option!=""){
        
    		
               
//             $sql1 = "UPDATE `optionstbl` SET `option`='$option', `value`='$value' WHERE `id`='$id' AND `optionid`='$optionid'";
//             $result = mysqli_query($conn, $sql1);
          
           

//     }
//     $count++;
    
// }

$nav=polls;
$sql="";
}else if ($button == 'Vote'){
    $optionid = $_POST['optradio'];
    $sql = "UPDATE `optionstbl` SET `value`=`value`+1 WHERE `id`='$id' AND `optionid`='$optionid'"; 

    $nav="resultspolls";
    $result=mysqli_query($conn, $sql);
    $sql="";
   phpAlert("Transaction Sucessful");

}else if($category == 'registration'){
         $sql = "UPDATE `registrationstbl` SET `eventstatus`='UNREGISTERED' WHERE `userid`='$uid' AND `seminarid`='$sid'";
        $nav = "registration";

}else if($button == "editForums"){
    $sql = "UPDATE forumstbl SET title='$title' WHERE id='$id'";
$nav = "forums";
}else{}

if($sql!=""){
if (mysqli_query($conn, $sql)) {
   phpAlert( "Transaction Sucessful");
} else {
    phpAlert( "Error updating record: " . mysqli_error($conn) );
}
}
include 'close.php';

if($nav == "resultspolls"){
$id;
include 'userredirect.php';
}else {

$nav;
include 'redirect.php';
}
?>