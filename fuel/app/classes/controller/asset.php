<?php
class Controller_Asset extends Controller_Template
{

	public function action_index()
	{
		$data['assets'] = Model_Asset::find_all();
		$this->template->title = "Assets";
		$this->template->content = View::forge('asset/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('asset');

		$data['asset'] = Model_Asset::find_by_pk($id);

		$this->template->title = "Asset";
		$this->template->content = View::forge('asset/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Asset::validate('create');

			if ($val->run())
			{
				$owner_name =Input::post('owner_name');
				$reg_num =  Input::post('reg_number');
				$asset_type = Input::post('asset_type');
				$model= Input::post('model');
				$color = Input::post('color');
				$serial_or_plate_no = Input::post('serial_or_plate_no');


				
				$file = DOCROOT . "assets/img/qr/" ; 
				//Debug::dump($file);die;


				//generate qr code 
				$arg = $owner_name.'-'.$reg_num.'-'.$asset_type.'-'.$model.'-'.$serial_or_plate_no.'-'.$color ; 
				
				$command = escapeshellcmd(DOCROOT . "assets/img/qr/script.py ".str_replace(" ","",$arg)." ".$file);
				$output = exec($command . ' 2>&1', $out, $ret);



				//Debug::dump($output);die;

				if ($ret != 0)
				{
					
					echo "failed to generate qr code ". $out;

					
				}
				else
				{
					

					$asset = Model_Asset::forge(array(
					'owner_name' => $owner_name,
					'reg_number' => $reg_num,
					'asset_type' => $asset_type,
					'model' => $model,
					'serial_or_plate_no' => $serial_or_plate_no,
					'color' => $color,
					'qrcode_name'=>$out[0].'.png',
					'created_at'=>0,
					'updated_at'=>0
				));

					if ($asset and $asset->save())
					{
						Session::set_flash('success', 'Added saved and created qr code'.$asset->id.'.');
						Response::redirect('asset');
					}
					else
					{
						Session::set_flash('error', 'Could not save asset.');
					}

				}
				Debug::dump($output);die;
				//forging array
				

				

			
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Assets";
		$this->template->content = View::forge('asset/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('asset');

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
					Response::redirect('asset');
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
		$this->template->content = View::forge('asset/edit');

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

		Response::redirect('asset');

	}

}
