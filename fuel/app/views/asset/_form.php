<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Owner name', 'owner_name', array('class'=>'control-label')); ?>

				<?php echo Form::input('owner_name', Input::post('owner_name', isset($asset) ? $asset->owner_name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Owner name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Reg number', 'reg_number', array('class'=>'control-label')); ?>

				<?php echo Form::input('reg_number', Input::post('reg_number', isset($asset) ? $asset->reg_number : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Reg number')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Asset type', 'asset_type', array('class'=>'control-label')); ?>

				<?php 
                	$gender = Model_Assettype::find_all();

                	$arr=array('0'=>'--Please Select asset--');
					
					foreach ($gender as $item) {
						$arr[$item->name] = $item->name;
					}
					
					?>
				<?php echo Form::select('asset_type', Input::post('asset_type', isset($asset) ? $asset->asset_type : ''), $arr,array('class' => 'col-md-4 form-control')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Model', 'model', array('class'=>'control-label')); ?>

				<?php echo Form::input('model', Input::post('model', isset($asset) ? $asset->model : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Model')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Serial or plate no', 'serial_or_plate_no', array('class'=>'control-label')); ?>

				<?php echo Form::input('serial_or_plate_no', Input::post('serial_or_plate_no', isset($asset) ? $asset->serial_or_plate_no : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Serial or plate no')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Color', 'color', array('class'=>'control-label')); ?>

				<?php echo Form::input('color', Input::post('color', isset($asset) ? $asset->color : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Color')); ?>

		</div>
		<div class="form-group" align="center">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Create', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>