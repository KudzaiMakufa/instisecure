<h2>Viewing Asset : <?php echo $asset->model; ?></h2>

<p>
	<strong>Asset Qr Code:</strong>
	
<?php echo Asset::img('qr/'.$asset->qrcode_name) ; ?>
	
	
<p>
	

<?php echo Html::anchor('asset/edit/'.$asset->id, 'Edit'); ?> |
<?php echo Html::anchor('asset', 'Back'); ?>	