<?php
include 'dbconnect.php';
include 'errorMsg.php';


$button = $_POST['save'];
$title = $_POST['title'];
$description = $_POST['description'];

                    $uname =    $_POST["uname"];
                    $pword = $_POST["pword"];
                    $firstname = $_POST["firstname"];
                    $lastname =     $_POST["lastname"];
                    $email =     $_POST["email"];
                    $institution =      $_POST["institution"];
                    $status =   $_POST["status"];
                    $type =       $_POST["type"];
                    $date =       $_POST["date"];
                    $time = $_POST['time'];
                    $sid = $_POST['seminar'];
                    $category = $_GET['category'];
                    $fid = $_GET['fid'];
                    $uid = $_GET['id']; 
                    $posts = $_POST['posts'];
                    $count = $_POST['count'];
                    
                    $uid = $_POST['uid'];
                    $sid = $_GET['sid'];
                    $uid1 = $_GET['uid'];


                    echo $sid;
                    echo $uid1;
for($ctr = 1; $ctr <= $count; $ctr++){

    $temp =  $_POST["save$ctr"];
    $temp1 = $_POST["uid$ctr"];
    if($temp != "")
        { $uid = $temp1; break; } 
}




 if($button == 'saveJobs'){

$sql = "INSERT INTO jobstbl (title,description) VALUES ('$title','$description')";
$nav = "jobs";

}else if($button == 'saveNews'){

$sql = "INSERT INTO newstbl (title,description) VALUES ('$title','$description')";
$nav = "news";

}else if($button == 'saveSeminars'){

$sql = "INSERT INTO seminarstbl (title,description,`date`,time) VALUES ('$title','$description',$date,$time)";
$nav = "seminars";


}else if($button == 'saveUsers'){
   					

$sql = "INSERT INTO userstbl (username,password,firstname,lastname,email,institution,status,type,`date`) 
            VALUES 
            ('$uname','$pword','$firstname','$lastname','$email','$institution','$status','$type','$date')";
$nav = "users";

}else if($temp == 'Register'){
    if($sid!=""){
        
$sql = "INSERT INTO registrationstbl (userid,seminarid,eventstatus) VALUES ('$uid','$sid','REGISTERED')";
$nav = "registrations";
        
        }else{
        $nav = "registrations";
        phpAlert("Seminar does not exist. Select a seminar or event...");
    }
}else if($category == "Reserve"){

    $sql = "INSERT INTO onlineregistrationstbl (userid,seminarid) VALUES ('$uid1','$sid')";
    $nav = "seminars";
    
}else



if ($button == 'editPolls'){
    if($status == "active"){
$sql1 = "UPDATE pollstbl SET status='inactive'";
$result = mysqli_query($conn, $sql1);   
}
$sql = "INSERT INTO pollstbl (`title`,`status`) VALUES ('$title','$status')";
$result = mysqli_query($conn, $sql);

$last_id = mysqli_insert_id($conn);
$count = 1;

while($count < 6){
    $option = $_POST["option$count"];
    $value = $_POST["value$count"];
    if($option!=""){
        

            $sql1 = "INSERT INTO optionstbl (`id`,`option`,`value`) VALUES ('$last_id','$option','$value')";
            $result = mysqli_query($conn, $sql1);
           

    }
    $count++;
    
}

$nav = "polls";
$sql = "";
phpAlert("Transaction Sucessful");
}else if($button == "saveForums"){
    $sql = "INSERT INTO forumstbl (id,title) VALUES ('$id','$title')";
    $nav = "forums";

}else if($category == "posts"){
     $sql = "INSERT INTO poststbl (forumid,userid,post) VALUES ('$fid','$uid','$posts')";
    $nav = "posts";

}else {}
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