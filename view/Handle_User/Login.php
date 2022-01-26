
<div class="container w-50 mt-5 shadow py-4">
    <div class='d-flex justify-content-center pb-2'>
        <h1>Login</h1>
        <hr>
    </div>
    <form action="<?=URL?>/Content/Login" method="post">
        <div class="form-group">
            <label for="user_F_name">Username:</label>
            <input class='form-control' type="text" name="username">
        </div>
        <div class="form-group">
            <label for="user_password">Password:</label>
            <input class='form-control' type="password" name="password" id="user_password">
        </div>
        <div class="form-group d-flex justify-content-end">
            <input class='btn btn-success mt-3' type="submit" value="Login" id="confirm_sign_up" name="login_submit">
        </div>
    </form>
</div>