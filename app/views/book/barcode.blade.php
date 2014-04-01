<h3>Tài liệu: {{$book->title}}</h3>
<p>Tác giả: {{$book->author}}</p>
<p>Số lượng : {{$book->number}} cuốn</p>
<?php $len = count($barcode) ?>
<table>
	<tbody>
		<?php for ($i = 0; $i < $len - 3; $i += 3): ?>
			<tr>
				<td style="padding-left: 20px">
					<img src="<?php echo asset($barcode[$i]['barcode']) ?>"/><br/>
					<?php echo $barcode[$i]['code'] ?>
				</td>
				<td style="padding-left: 20px">
					<img src="<?php echo asset($barcode[$i + 1]['barcode']) ?>"/> <br/>
					<?php echo $barcode[$i + 1]['code'] ?>
				</td>
				<td style="padding-left: 20px">
					<img src="<?php echo asset($barcode[$i + 2]['barcode']) ?>"/><br/>
					<?php echo $barcode[$i + 2]['code'] ?>
				</td>
			</tr>
		<?php endfor; ?>
		<tr>
			<?php while ($i < $len) {

				?><td style="padding-left: 20px">
					<img src="<?php echo asset($barcode[$i]['barcode']) ?>"/><br/>
					<?php echo $barcode[$i]['code'] ?>
				</td>
				<?php
				$i++;
			}

			?>
		</tr>
	</tbody>
</table>