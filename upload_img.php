<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/13/18
 * Time: 2:09 PM
 */
 include_once('db.php');
$getUser = "SELECT * FROM `users` WHERE `is_active` = 1 ";
$result =  mysqli_query($conn,$getUser);
while($row = mysqli_fetch_assoc($result)) {

    $username[$row['id']] = $row['username'];
}
?>




<form method="POST" action="upload.php" enctype="multipart/form-data">
<select class="custom-select" name="user_id">
    <option selected>Select User</option>
    <?php foreach($username as $key => $value){
        echo "<option value=".$key.">$value</option>";
    }
    ?>
</select>
    <input type="file" name="myimage"/>
    <input type="hidden" name="myimage"/>
    <input type="submit" name="submit_image" value="Upload"/>
</form>