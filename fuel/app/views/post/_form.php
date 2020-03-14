<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('message', Input::post('message', isset($post) ? $post->message : ''), array('class' => 'col-md-4 form-control', 'rows'=> 3 ,'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Reg Number', 'username', array('class'=>'control-label')); ?>

				<?php echo Form::input('username', Input::post('username', isset($post) ? $post->username : ''), array('class' => 'col-md-4 form-control','placeholder'=>'reg number ')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Send ', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>