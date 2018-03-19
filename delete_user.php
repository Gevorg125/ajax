<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 9:28 PM
 */

session_start();
include_once('db.php');
function validationForm($data)
{

    $errorMsg = [];

    if (empty($data['username'])) {
        $errorMsg['#content'] = "please insert username";
    }

    if (empty($data['password'])) {
        $errorMsg['#content'] = "please insert password";
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
            $pass = $data['password'];
            if ($user['username'] == $data['username'] && $user['password'] == $pass) {
                if ($user['is_active'] == 1) {
                    $sql = "UPDATE `users` SET `is_active` = '0' WHERE `users`.`username` = '$username'";
                    $query = mysqli_query($connect, $sql);
                    $is_error['#content'] = "user is deleted";
                } else {
                    $is_error['#content'] = "this user is already deleted";
                }
            } else {
                $is_error['#content'] = "incorrect password";
            }
        }

    } else {
        $is_error['#content'] = "incorrect username";
    }

    return $is_error;
}


$user = isUser($conn, $_POST);

echo json_encode($user);

