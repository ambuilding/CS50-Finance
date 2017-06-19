<?php
    print("Hi ". $cash[0]["username"] .". Your balance is " . number_format($cash[0]["cash"], 2));
?>
<table class="table table-striped">
        <thead>
            <tr>
                <th>Symbol</th>
                <th>Name</th>
                <th>Shares</th>
                <th>Price</th>
                <th>TOTAL</th>
            </tr>
        </thead>
            
        <tbody>
        <?php foreach ($positions as $position): ?>
            <tr>    
                <td><?= strtoupper($position["symbol"])?></td>
                <td><?= $position["name"]?></td>
                <td><?= $position["shares"]?></td>
                <td>$<?= number_format($position["price"], 2)?></td>
                <td>$<?= number_format($position["total"], 2)?></td>
            </tr>
        <?php endforeach ?>  
            <tr>
                <td colspan="4">CASH</td>
                <td><?= number_format($cash[0]["cash"], 2) ?></td>
            </tr>  
        </tbody>
        
</table>
<!-- <iframe allowfullscreen frameborder="0" height="315" src="https://www.youtube.com/embed/oHg5SJYRHA0?autoplay=1&iv_load_policy=3&rel=0" width="420"></iframe> -->