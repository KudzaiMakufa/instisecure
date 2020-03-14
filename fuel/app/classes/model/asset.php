<?php
class Model_Asset extends Model_Crud
{
	protected static $_table_name = 'assets';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('owner_name', 'Owner Name', 'required|max_length[255]');
		$val->add_field('reg_number', 'Reg Number', 'required|max_length[255]');
		$val->add_field('asset_type', 'Asset Type', 'required|max_length[255]');
		$val->add_field('model', 'Model', 'required|max_length[255]');
		$val->add_field('serial_or_plate_no', 'Serial Or Plate No', 'required|max_length[255]');
		$val->add_field('color', 'Color', 'required|max_length[255]');

		return $val;
	}

}
