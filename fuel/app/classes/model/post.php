<?php
class Model_Post extends Model_Crud
{
	protected static $_table_name = 'posts';
	
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('message', 'Message', 'required|max_length[255]');
		$val->add_field('username', 'Username', 'required|max_length[255]');

		return $val;
	}

}
