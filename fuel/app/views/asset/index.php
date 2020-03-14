<h2>Listing Assets</h2>
<br>
<?php if ($assets): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Owner name</th>
			<th>Reg number</th>
			<th>Asset type</th>
			<th>Model</th>
			<th>Serial or plate no</th>
			<th>Color</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($assets as $item): ?>		<tr>

			<td><?php echo $item->owner_name; ?></td>
			<td><?php echo $item->reg_number; ?></td>
			<td><?php echo $item->asset_type; ?></td>
			<td><?php echo $item->model; ?></td>
			<td><?php echo $item->serial_or_plate_no; ?></td>
			<td><?php echo $item->color; ?></td>
			<td>
				<?php echo Html::anchor('asset/view/'.$item->id, 'View QR code'); ?> |
				<?php echo Html::anchor('asset/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Assets.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('asset/create', 'Add new Asset', array('class' => 'btn btn-success')); ?>

</p>
