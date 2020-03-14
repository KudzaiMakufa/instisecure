<?php
class Controller_Post extends Controller_Template
{

	public function action_index()
	{
		$data['posts'] = Model_Post::find_all();
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('post');

		$data['post'] = Model_Post::find_by_pk($id);

		$this->template->title = "Post";
		$this->template->content = View::forge('post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');

			if ($val->run())
			{
				$post = Model_Post::forge(array(
					'message' => Input::post('message'),
					'username' => Input::post('username'),
					'created_at'=>0,
					'updated_at'=>0
				));

				if ($post and $post->save())
				{
					Session::set_flash('success', 'Added post #'.$post->id.'.');
					Response::redirect('post/create');
				}
				else
				{
					Session::set_flash('error', 'Could not save post.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('post/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('post');

		$post = Model_Post::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('edit');

			if ($val->run())
			{
				$post->message = Input::post('message');
				$post->username = Input::post('username');

				if ($post->save())
				{
					Session::set_flash('success', 'Updated post #'.$id);
					Response::redirect('post');
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

		$this->template->set_global('post', $post, false);
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/edit');

	}

	public function action_delete($id = null)
	{
		if ($post = Model_Post::find_one_by_id($id))
		{
			$post->delete();

			Session::set_flash('success', 'Deleted post #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete post #'.$id);
		}

		Response::redirect('post');

	}

}
