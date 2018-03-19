<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 10:00 PM
 */
include_once "db.php";
if (empty($_POST)) {
    header("location:registration.php");
}
function valid($data)
{
    $errorMsg = [];

    if (empty($data['name'])) {

        $errorMsg['#resp'] = "please write your name";
        return $errorMsg;
    }

    if (empty($data['password'])) {

        $errorMsg['#resp'] = "please write your password";
        return $errorMsg;
    }
    if (empty($data['username'])) {

        $errorMsg['#resp'] = "please write your username";
        return $errorMsg;
    }

    if (empty($data['surname'])) {

        $errorMsg['#resp'] = "please write your surname";
        return $errorMsg;
    }


    return $errorMsg;
}

$valid = valid($_POST);

if (!empty($valid)) {
    echo json_encode($valid);
    exit;
}

function issetUser($connect, $data)
{
    $username = $data['username'];
    $getUser = "SELECT * FROM `users` WHERE `username`= '$username'";
    $response = mysqli_query($connect, $getUser);
    $usernameCount = mysqli_num_rows($response);
    $issetUser = [];
    if ($usernameCount != 0) {
        $issetUser['#resp'] = "this username is exists";
    }

    return $issetUser;
}


$user = issetUser($conn, $_POST);
if (!empty($user)) {
    echo json_encode($user);
    exit;
}


$name = $_POST['name'];
$username = $_POST['username'];
$surname = $_POST['surname'];
$pass = md5($_POST["password"]);


$sql = "INSERT INTO `users`(`name`, `surname`, `username`, `password`,  `privileges`, `is_active`) 
                VALUES ('$name','$surname','$username','$pass', '0', '1')";
$query = mysqli_query($conn, $sql);

$success['#resp'] = "user is created";
$_SESSION['username'] = $_POST['username'];
echo json_encode($success);

?>
