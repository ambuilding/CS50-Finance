<?php
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Search"]);
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // lookup stock price
        $stock = lookup($_POST["symbol"]);
        // redirect to portfolio
        render("quote.php", ["title" => "Quote " . $stock["name"], "stock" => $stock]);
    }
?>
