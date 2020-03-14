<?php
class Controller_Assets extends Controller_Template
{

	public function action_index()
	{
		$data['assets'] = Model_Asset::find_all();
		$this->template->title = "Assets";
		$this->template->content = View::forge('assets/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('assets');

		$data['asset'] = Model_Asset::find_by_pk($id);

		$this->template->title = "Asset";
		$this->template->content = View::forge('assets/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Asset::validate('create');

			if ($val->run())
			{
				$asset = Model_Asset::forge(array(
					'owner_name' => Input::post('owner_name'),
					'reg_number' => Input::post('reg_number'),
					'asset_type' => Input::post('asset_type'),
					'model' => Input::post('model'),
					'serial_or_plate_no' => Input::post('serial_or_plate_no'),
					'color' => Input::post('color'),
				));

				if ($asset and $asset->save())
				{
					Session::set_flash('success', 'Added asset #'.$asset->id.'.');
					Response::redirect('assets');
				}
				else
				{
					Session::set_flash('error', 'Could not save asset.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Assets";
		$this->template->content = View::forge('assets/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('assets');

		$asset = Model_Asset::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Asset::validate('edit');

			if ($val->run())
			{
				$asset->owner_name = Input::post('owner_name');
				$asset->reg_number = Input::post('reg_number');
				$asset->asset_type = Input::post('asset_type');
				$asset->model = Input::post('model');
				$asset->serial_or_plate_no = Input::post('serial_or_plate_no');
				$asset->color = Input::post('color');

				if ($asset->save())
				{
					Session::set_flash('success', 'Updated asset #'.$id);
					Response::redirect('assets');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('asset', $asset, false);
		$this->template->title = "Assets";
		$this->template->content = View::forge('assets/edit');

	}

	public function action_delete($id = null)
	{
		if ($asset = Model_Asset::find_one_by_id($id))
		{
			$asset->delete();

			Session::set_flash('success', 'Deleted asset #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete asset #'.$id);
		}

		Response::redirect('assets');

	}

}
