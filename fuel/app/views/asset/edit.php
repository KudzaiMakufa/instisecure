<h2>Editing Asset</h2>
<br>

<?php echo render('asset/_form'); ?>
<p>
	<?php echo Html::anchor('asset/view/'.$asset->id, 'View'); ?> |
	<?php echo Html::anchor('asset', 'Back'); ?></p>
