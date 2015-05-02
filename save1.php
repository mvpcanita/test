<?php
include 'dbconnect.php';
include 'errorMsg.php';


$button = $_POST['save'];
$title = $_POST['title'];
// $description = $_POST['description'];

//                     $uname =    $_POST["uname"];
//                     $pword = $_POST["pword"];
//                     $firstname = $_POST["firstname"];
//                     $lastname =     $_POST["lastname"];
//                     $email =     $_POST["email"];
//                     $institution =      $_POST["institution"];
//                     $status =   $_POST["status"];
//                     $type =       $_POST["type"];
//                     $date =       $_POST["date"];
//                     $time = $_POST['time'];
//                     $sid = $_POST['seminar'];
                    $category = $_GET['category'];
                    $fid = $_GET['fid'];
                    $uid = $_GET['id']; 
                    $posts = $_POST['posts'];
                    $count = $_POST['count'];
                    echo $fid;
                    echo $uid;
                    echo $posts;
                    


if($category == "userposts"){
     $sql = "INSERT INTO poststbl (forumid,userid,post) VALUES ('$fid','$uid','$posts')";
    $nav = "posts";



if (mysqli_query($conn, $sql)) {
   phpAlert( "Transaction Sucessful");
} else {
    phpAlert( "Error updating record: " . mysqli_error($conn) );
}

}
include 'close.php';

$file = "index.php#forums";
echo '<script type="text/javascript">window.location.assign("'.$file.'")</script>';;

?>