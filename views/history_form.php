<table class="table table-striped">
        <caption>History</caption>
     <thead>
            <tr>
                <th>Transaction</th>
                <th>Date/Time</th>
                <th>Symbol</th>
                <th>Shares</th>
                <th>Price</th>
            </tr>
        </thead>
            
        <tbody>
        <?php foreach ($positions as $position): ?>
            <tr>    
                <td><?= $position["transaction"] ?></td>
                <td><?= $position["dateTime"] ?></td>
                <td><?= $position["symbol"] ?></td>
                <td><?= $position["shares"] ?></td>
                <td><?= $position["price"] ?></td>
            </tr>
        <?php endforeach ?>    
        </tbody>
</table>