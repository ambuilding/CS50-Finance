<?php
    // if stock lookup fail
    if ($stock === false)
    {
        print("Invalid stock symbol!");
    }
    // else display stock price
    else
    {
        print("A share of {$stock["name"]} ({$stock["symbol"]}) costs $" . number_format($stock["price"], 2) . ".");
    }
?>