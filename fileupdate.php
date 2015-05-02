
<?php
include 'dbconnect.php';
include 'errorMsg.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["imageInputFile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageInputFile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*
if (file_exists($target_file)) {
    $err = "file already exists.";
    $uploadOk = 0;
}
*/
// Check file size
if ($_FILES["imageInputFile"]["size"] > 500000) {
    $err = "file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
/*
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" 
&& $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG" && $imageFileType != "GIF") {
    $err = "Only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/

if($imageFileType != "pdf" && $imageFileType != "PDF") {
    $err = "Only pdf files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error

$id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $filepath="/psite/uploads/".basename($_FILES["imageInputFile"]["name"]);


      

        $sql = "UPDATE downloadstbl SET title='$title', description='$description', filepath='$filepath' WHERE id=$id";
if ($uploadOk == 0) {
    phpAlert( $err."\\nSorry, your file was not uploaded.");
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageInputFile"]["tmp_name"], $target_file) && mysqli_query($conn, $sql)) {



        

        

        
        phpAlert( "The file ". basename( $_FILES["imageInputFile"]["name"]). " has been uploaded.");
    } else {
        phpAlert( "Sorry, there was an error uploading your file.");
    }
}
include 'close.php';
$nav = "downloads";
include 'redirect.php';
?>