<form action="passReset.php" method="post">
    <fieldset>

        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
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