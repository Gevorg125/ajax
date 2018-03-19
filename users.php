<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 8:51 PM
 */
include_once('db.php');

function getUsers($connect)
{
    $getUser = "SELECT * FROM `users` WHERE `is_active` = 1";
    return mysqli_query($connect, $getUser);

}

$result = getUsers($conn);
?>
<div class="row col-md-8">
    <form class="form-control" action="search.php" method="post">
        <input type="text" style="display: inline-block" class="form-control col-md-10" name="username"
               placeholder="Insert username to view details"/>
        <button class="btn btn-primary">Details</button>
    </form>
</div>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Surname</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $username = $row['username'];
        $surname = $row['surname'];
        $name = $row['name'];
        echo "<tr><td>$i</td><td>$username</td><td>$surname</td><td>$name</td></tr>";
        $i++;
    }

    ?>
    </tbody>

</table>