<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/13/18
 * Time: 1:24 PM
 */
include_once('db.php');
function getUsers($connect, $data)
{
    $username = $data['username'];
    $getUser = "SELECT * FROM `users` WHERE `is_active` = 1 AND `username` = '$username'";
    return mysqli_query($connect, $getUser);

}

$result = getUsers($conn, $_POST);

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./resource/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./resource/css/bootstrap-grid.min.css">

    <link rel="stylesheet" type="text/css" href="./resource/css/style.css">

    <script type="text/javascript" src="./resource/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./resource/js/bootstrap.min.js"></script>
</head>
<body>

<div class="row col-md-8">
    <form class="form-control" action="search.php" method="post">
        <input type="text" style="display: inline-block" class="form-control col-md-10" name="username"
               placeholder="Insert username to view details"/>
        <span class="btn btn-primary">Details</span>
    </form>
</div>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Surname</th>
        <th>Name</th>
        <th>Password</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['username'];
        $surname = $row['surname'];
        $name = $row['name'];
        $pwd = $row['password'];
        $id = $row['id'];
        echo "<tr><td>$i</td><td>$username</td><td>$surname</td><td>$name</td><td>$pwd</td></tr>";
        $i++;


    }


    ?>
    </tbody>

</table>

<div>
    <h3>Images</h3>
    <div>
        <?php

        $getImg = "SELECT * FROM `images` WHERE `user_id`='$id'";
        $res = mysqli_query($conn, $getImg);
        $path = "./images/";
        while ($row = mysqli_fetch_assoc($res)) {
            $image_name = $row["img_name"];

            echo "<img src='" . $path . $image_name . "' width=100 height=100 />";

        }

        ?>
    </div>
</div>
</body>
</html>