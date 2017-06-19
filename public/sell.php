<?php 
	// configuraton
	require("../includes/config.php");

	// if user reached page via GET (as by clicking a link or via redirect)
	if ($_SERVER["REQUEST_METHOD"] == "GET") {	
		$symbols = CS50::query(
			"SELECT symbol FROM portfolios WHERE user_id=?", 
			$_SESSION["id"]
		);
		render("sell_form.php", ["title" => "Sell", "symbols" => $symbols]);
	} 
	// if user reached page via POST (as by submitting a form via POST)
	else if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["symbol"])) {
			apologize("You must provide a symbol.");
		}
		$stock = CS50::query(
			"SELECT * FROM portfolios WHERE user_id = ? AND symbol = ?",
			$_SESSION["id"],
			$_POST["symbol"]
		);
		if (empty($stock)) {
			apologize("You do not have the stock.(Invalid stock)");
		} // else sell the stock
		else {
			// get the price of one share
			$price = lookup($_POST["symbol"])["price"];
			$shares = CS50::query(
				"SELECT * FROM portfolios WHERE user_id = ? AND symbol = ?", 
				$_SESSION["id"], $_POST["symbol"]
			)[0]["shares"];
			CS50::query(
				"DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", 
				$_SESSION["id"], $_POST["symbol"]
			);
			CS50::query(
				"UPDATE users SET cash = cash + ? WHERE id = ?", 
				$price * $shares, $_SESSION["id"]
			);
			CS50::query(
				"INSERT INTO history (user_id, transaction, symbol, shares, price)
				VALUES(?, 'SELL', ?, ?, ?)",
				$_SESSION["id"], $_POST["symbol"], $shares, $price
			);
			
			redirect("/");
		}
	}

?>