<?php
class Controller_Assettype extends Controller_Template
{

	public function action_index()
	{
		$data['assettypes'] = Model_Assettype::find_all();
		$this->template->title = "Assettypes";
		$this->template->content = View::forge('assettype/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('assettype');

		$data['assettype'] = Model_Assettype::find_by_pk($id);

		$this->template->title = "Assettype";
		$this->template->content = View::forge('assettype/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Assettype::validate('create');

			if ($val->run())
			{
				$assettype = Model_Assettype::forge(array(
					'name' => Input::post('name'),
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($assettype and $assettype->save())
				{
					Session::set_flash('success', 'Added assettype #'.$assettype->id.'.');
					Response::redirect('assettype');
				}
				else
				{
					Session::set_flash('error', 'Could not save assettype.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Assettypes";
		$this->template->content = View::forge('assettype/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('assettype');

		$assettype = Model_Assettype::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Assettype::validate('edit');

			if ($val->run())
			{
				$assettype->name = Input::post('name');

				if ($assettype->save())
				{
					Session::set_flash('success', 'Updated assettype #'.$id);
					Response::redirect('assettype');
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

		$this->template->set_global('assettype', $assettype, false);
		$this->template->title = "Assettypes";
		$this->template->content = View::forge('assettype/edit');

	}

	public function action_delete($id = null)
	{
		if ($assettype = Model_Assettype::find_one_by_id($id))
		{
			$assettype->delete();

			Session::set_flash('success', 'Deleted assettype #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete assettype #'.$id);
		}

		Response::redirect('assettype');

	}

}
