<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/13/18
 * Time: 2:22 PM
 */
include_once('db.php');
echo "<pre>";
print_r($_POST);
print_r($_FILES);

$upload_image = $_FILES['myimage']['name'];
$user_id = $_POST['user_id'];

//print_r($upload_image);
$uploads_dir = "/images";


$upload_image = $_FILES["myimage"]["name"];

$folder = "/var/www/html/test/images/";

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder" . $_FILES["myimage"]["name"]);
$insert_path = "INSERT INTO `images`(`user_id`, `img_name`) VALUES ('$user_id', '$upload_image')";

$var = mysqli_query($conn, $insert_path);

