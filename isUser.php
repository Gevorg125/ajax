<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 7:58 PM
 */
session_start();
include_once('db.php');
function validationForm($data)
{

    $errorMsg = [];

    if (empty($data['username'])) {
        $errorMsg['#username'] = "please write your username";
    }

    if (empty($data['password'])) {
        $errorMsg['#pass'] = "please write your password";
    }

    return $errorMsg;
}

$isEmptyPost = validationForm($_POST);

if (!empty($isEmptyPost)) {
    echo json_encode($isEmptyPost);
    exit;
}


function isUser($connect, $data)
{
    $username = $data['username'];
    $getUser = "SELECT * FROM `users` WHERE `username`= '$username'";
    $response = mysqli_query($connect, $getUser);
    $isUserCount = mysqli_num_rows($response);
    $is_error = [];
    if ($isUserCount != 0) {
        while ($user = mysqli_fetch_assoc($response)) {
            $pass = md5($data['password']);
            if ($user['username'] == $data['username'] && $user['password'] == $pass) {
                if ($user['privileges'] == 1 && $user['is_active'] == 1) {
                    $is_error[] = 777;
                    $_SESSION['prev'] = md5(777);
                } elseif ($user['privileges'] == 0 && $user['is_active'] == 1) {
                    $is_error[] = 200;
                    $_SESSION['prev'] = md5(200);
                } else {
                    $is_error['#username'] = "wait half a while until the admin resolves";
                }


            } else {
                $is_error['#pass'] = "incorrect password";
            }
        }

    } else {
        $is_error['#username'] = "incorrect username";
    }

    return $is_error;
}


$user = isUser($conn, $_POST);
if (isset($_SESSION['prev'])) {
    $_SESSION['username'] = $_POST['username'];
}
echo json_encode($user);

