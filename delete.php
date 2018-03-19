<?php
/**
 * Created by PhpStorm.
 * User: gev
 * Date: 3/12/18
 * Time: 8:51 PM
 */

echo '
<script type="text/javascript">

    $(document).ready(function(){
        $("#delete").click(function(){
            $.ajax({
                url: "delete_user.php",
                method: "POST",
                data: $("form").serializeArray(),
                dataType: "json",
                success: function(resp)	{
                    $.each(resp, function(index, val) {
                        $(index).text(val);
                    });
                }
            });
        });
    });
</script>
 <div class="text-center" ><h1 id="content"></h1></div>
<div class="col-md-12" style="display: flex; justify-content: center">
<form>
    
    <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username">

    </div>
    
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="text" class="form-control" name="password" placeholder="Password">
    </div>
    <span class="btn btn-primary" id="delete">Delete User</span>
</form>
</div>';
//<!--</body>-->

