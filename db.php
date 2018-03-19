<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 7:58 PM
 */
ini_set('display errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "root", "123456789", "DB");
if (!$conn) {
    exit("Connection error: " . mysqli_connect_error());
}
		

