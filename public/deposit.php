<?php

require ("../includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	render("deposit_form.php", ["title" => "Add Cash"]);

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (empty($_POST["cash"])) {
        apologize("You must provide the number of cash.");
    }

    if (!preg_match("/^\d+$/", $_POST["cash"])) {
		apologize("Enter valid cash amount.");
	} else {
		CS50::query("UPDATE users SET cash=cash + ? WHERE id=?", 
			$_POST["cash"], $_SESSION["id"]
		);
		CS50::query(
			"INSERT INTO history (user_id, transaction, symbol, shares, price)
			VALUES(?, 'CASH', 0, 0, ?)",
			$_SESSION["id"], $_POST["cash"]
		);

		redirect("/");
	}
}

?>