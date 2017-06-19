<?php
    // configuration
require("../includes/config.php");
    // if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }
    // else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["symbol"]) || empty($_POST["shares"])) {
		apologize("Form is not complete.");
	}

	if (!preg_match("/^\d+$/", $_POST["shares"])) {
		apologize("Number of shares must be a non-negative integer.");
	}

	// if symbol does not exist
	if (lookup($_POST["symbol"]) == false) {
		apologize("Wrong symbol.");
	}

	// make symbol to uppercase
	$_POST["symbol"] = strtoupper($_POST["symbol"]);

	$cash = CS50::query(
		"SELECT cash FROM users WHERE id=?",
		$_SESSION["id"]
	)[0]["cash"];
	$price = lookup($_POST["symbol"])["price"];

	// if user can't afford the cash
	if ($cash - $price * $_POST["shares"] < 0) {
		apologize("You do not have enough money to but the stock.");
	} else {
		CS50::query(
			"INSERT INTO portfolios (user_id, symbol, shares) 
			VALUES(?, ?, ?) ON DUPLICATE KEY 
			UPDATE shares = shares + ?",
			$_SESSION["id"], $_POST["symbol"], $_POST["shares"], 
			$_POST["shares"]
		);
		CS50::query(
			"UPDATE users SET cash = cash - ? * ? WHERE id = ?", 
			$price, $_POST["shares"], $_SESSION["id"]
		);
		CS50::query(
			"INSERT INTO history (user_id, transaction, symbol, shares, price)
			VALUES(?, 'BUY', ?, ?, ?)",
			$_SESSION["id"], $_POST["symbol"], $_POST["shares"], $price
		);

		redirect("/");
	}
}

?>