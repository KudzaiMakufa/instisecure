<h2>Types of Assets</h2>
<br>
<?php if ($assettypes): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($assettypes as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
				
				<?php echo Html::anchor('assettype/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?' ,)",'class'=>'btn-sm btn-danger')); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Assettypes.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('assettype/create', 'Add new Assettype', array('class' => 'btn btn-success')); ?>

</p>
