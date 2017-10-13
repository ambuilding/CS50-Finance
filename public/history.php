<?php

	require("../includes/config.php");

	// store an array of associative arrays in $history
	$positions = [];
	$history = CS50::query(
		"SELECT * FROM history WHERE user_id = ?",
		$_SESSION["id"]
	);
	foreach ($history as $history) {
		$positions[] = [
			"transaction" => $history["transaction"],
			"dateTime" => $history["dateTime"],
			"symbol" => $history["symbol"],
			"shares" => $history["shares"],
			"price" => $history["price"]
		];
	}

	render("history_form.php", ["positions" => $positions, "title" => "History"]);

?>
