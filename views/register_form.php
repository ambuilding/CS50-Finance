<form action="register.php" id="registration" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Password(again)" type="password"/>
        </div>
        <div class="form-group">
            <input name="agreement" type="checkbox"/> I agree
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>

<script>
    var form = document.getElementById('registration');
    form.onsubmit = function() {
        if (form.name.value == '') {
            alert('missing name');
            return false;
        } else if (form.password.value == '') {
            alert('missing password');
            return false;
        } else if (form.password.value != form.confirmation.value) {
            alert('passwords do\'t match');
            return false;
        } else if (!form.agreement.checked) {
            alert('checkbox unchecked');
            return false;
        }
    }
</script>

<div>
    or <a href="login.php">log in</a>
</div>
