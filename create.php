<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 8:51 PM
 */

?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#create').click(function () {
            $.ajax({

                url: 'create_user.php',
                method: "POST",
                data: $('#regForm').serializeArray(),
                dataType: "json",
                success: function (response) {
                    $.each(response, function (index, val) {
                        $(index).text(val);
                    });
                }

            });
        });
    });
</script>
<div class="container-fluid log-in">
    <div class="row">
        <div class="col-md-3 log-in-center">
            <fieldset class="log-in-box">
                <legend class="text-center">Registration</legend>
                <div><h3 id="resp"></h3></div>
                <form id="regForm" method="post">
                    <div id="username"></div>
                    <div class="form-group">
                        Username:<br/>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div id="pass"></div>
                    <div class="form-group">
                        Name:<br/>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div id="pass"></div>
                    <div class="form-group">
                        Surname:<br/>
                        <input type="text" name="surname" class="form-control" placeholder="Surname">
                    </div>
                    <div id="pass"></div>
                    <div class="form-group">
                        Password:<br/>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>


                    <button type="button" class="btn btn-primary" id="create">Register a user</button>

                </form>
            </fieldset>
        </div>
    </div>
</div>




