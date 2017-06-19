<?php
	require ("../includes/config.php");

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // else render form
        render("passReset_form.php", ["title" => "Password Reset"]);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["username"])) {
            apologize("You must provide your username.");
        } else if (empty($_POST["newPassword"])) {
			apologize("You must provide your new password.");
		} else if (empty($_POST["confirmation"])) {
			apologize("You must confirm your new password.");
		} 

		$rows = CS50::query("SELECT * FROM users WHERE username = ?",
			$_POST["username"]
		);

		if (count($rows) == 1) {
			$row = $rows[0];

			if ($_POST["newPassword"] == $_POST["confirmation"]) {
					CS50::query(
						"UPDATE users SET hash = ? WHERE username = ?",
						password_hash($_POST["confirmation"], PASSWORD_DEFAULT), 
						$row["username"]
					);
					redirect("/");
			} else {
					apologize("Your new passwords do not match!");
			}
		} 
	}

?>