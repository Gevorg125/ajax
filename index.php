<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 7:58 PM
 */
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
<script type="text/javascript">
    $(document).ready(function () {
        $('button').click(function () {
            $.ajax({
                url: "isUser.php",
                method: "POST",
                data: $("#formLogin").serializeArray(),
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index, val) {
                        if (val != 200 && val != 777) {
                            $(index).text(val);
                        } else {
                            if (val == 777) {
                                window.location.href = './admin.php';
                            } else {
                                window.location.href = './user.php';
                            }
                        }
                    });

                }
            });
        });
    });
</script>
<div class="container-fluid log-in d-flex justify-content-center" style="height: 100%">
    <div class="col-md-3 align-self-center">
        <label class="h2">LogIn</label>
        <form id="formLogin">
            <div class="form-group">
                <div id="username"></div>
                Username:<br/>
                <input type="text" class="form-control" name="username" placeholder="Username"/>
            </div>
            <div class="form-group">
                <div id="pass"></div>
                Password:<br/>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="button" class="btn btn-primary">LogIn</button>
        </form>
    </div>
</div>
</body>
</html>	