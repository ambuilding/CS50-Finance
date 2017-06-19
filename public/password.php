<?php
	require ("../includes/config.php");

	if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // else render form
        render("password_form.php", ["title" => "Change Password"]);
    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["password"])) {
			apologize("You must provide your password.");
		} else if (empty($_POST["newPassword"])) {
			apologize("You must provide your new password.");
		} else if (empty($_POST["confirmation"])) {
			apologize("You must confirm your new password.");
		} 

		$rows = CS50::query(
			"SELECT * FROM users WHERE id = ?",
			$_SESSION["id"]
		);

		if (count($rows) == 1) {
			$row = $rows[0];

			if (password_verify($_POST["password"], $row["hash"])) {
				if ($_POST["password"] == $_POST["newPassword"]) {
					apologize("Your new password is the same as your old password");

				} else if ($_POST["newPassword"] == $_POST["confirmation"]) {
					CS50::query(
						"UPDATE users SET hash = ? WHERE id = ?",
						password_hash($_POST["confirmation"], PASSWORD_DEFAULT), 
						$_SESSION["id"]
					);
					redirect("/");
				} else {
					apologize("Your new passwords do not match!");
				}
			} else {
				apologize("Your current password is not correct, please try again.");
			}
		}
	}

?>