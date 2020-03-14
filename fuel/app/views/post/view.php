<h2>Viewing #<?php echo $post->id; ?></h2>

<p>
	<strong>Message:</strong>
	<?php echo $post->message; ?></p>
<p>
	<strong>Username:</strong>
	<?php echo $post->username; ?></p>

<?php echo Html::anchor('post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('post', 'Back'); ?>