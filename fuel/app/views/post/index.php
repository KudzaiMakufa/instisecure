<h2>Listing Messages from students</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Message</th>
			<th>Username</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>		<tr>

			<td><?php echo substr($item->message, 0, 15)." **********"; ?></td>
			<td><?php echo $item->username; ?></td>
			<td>
				<?php echo Html::anchor('post/view/'.$item->id, 'Read'); ?> 
				<?php //echo Html::anchor('post/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>


</p>
