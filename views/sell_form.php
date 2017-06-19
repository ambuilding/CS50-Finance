<form action="sell.php" method="post">
	<fieldset>
		<div class="form-group">
			<select name="symbol" class="form-control">
				<option disabled selected value="">Symbol</option>
				<?php foreach ($symbols as $symbol): ?>
					<option value="<?= $symbol["symbol"] ?>">
						<?= $symbol["symbol"] ?>
					</option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Sell</button>
		</div>
	</fieldset>
</form>