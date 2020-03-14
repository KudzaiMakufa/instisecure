<h2>Viewing #<?php echo $assettype->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $assettype->name; ?></p>

<?php echo Html::anchor('assettype/edit/'.$assettype->id, 'Edit'); ?> |
<?php echo Html::anchor('assettype', 'Back'); ?>