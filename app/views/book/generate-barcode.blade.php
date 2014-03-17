<div class="wrap">
	<div class='head'>
		<div class='page-title'>
			In mã vạch
		</div>
	</div>
	<div class='content'>
		<div class='row-fluid'>
			<div class='span12'>
				<?php foreach ($barcode as $item): ?>
					<div class="controls-row">
						<div><?php echo $item['barcode'] ?></div>
						<div><?php echo $item['code'] ?></div>
					</div>
				<?php endforeach; ?>
			</div>			
		</div>
	</div>
</div>