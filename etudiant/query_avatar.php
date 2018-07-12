<?php
require_once '../lib/functions.php';
require_once '../model/database.php';



$user = currentUser();

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
$name_file_avatar = basename($_FILES["imageToUpload"]["name"]) ;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imageToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        updateImageUtilisateur($user["id"], $name_file_avatar);
    } else {
        echo "Sorry, there was an error uploading your file. " ;
    }
}

header("Location: index.php");





