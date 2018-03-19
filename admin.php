<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 7:58 PM
 */

session_start();

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
<script>
    $(document).ready(function() {
        var file = ['users.php', 'create.php', 'delete.php', 'logout.php', 'upload_img.php'];
        $('button').click(function () {
            $.ajax({
                url: file[this.id],
                success: function (response) {
                    $('#data').html(response);
                }
            });
        });
    });

</script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
        <button id="0" class="nav-item nav-link navbar-brand active" >All Users </button>
        <button id="1" class="nav-item nav-link navbar-brand" >Create User </button>
        <button id="2" class="nav-item nav-link navbar-brand" >Delete User </button>
        <button id="4" class="nav-item nav-link navbar-brand" >Upload Image </button>
        <a id="3" class="nav-item nav-link navbar-brand btn" href="logout.php">Logout </a>
    </div>
</nav>
<div class="container" id="data">
    
<?php
include_once('users.php');
?>
</div>
</body>

