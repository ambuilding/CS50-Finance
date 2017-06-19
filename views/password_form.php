<form action="password.php" method="post">
    <fieldset>

        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="password" placeholder="Current password" type="password"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="newPassword" placeholder="New Password" type="password"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm New Password" type="password"/>
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Submit
            </button>
        </div>

    </fieldset>
</form>
<div>
    or <a href="register.php">register</a> an account
</div>