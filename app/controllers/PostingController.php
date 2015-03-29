<?php

class PostingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$data = array(
			'post' => Posting::paginate(10),
		);

		return View::make('post',$data);
	}

	public function postAddIndex($id = null){
		$data = array(
			'id' => $id,
			'posting_title' => $id ? Posting::find($id)->posting_title : '',
			'post' => $id ? Posting::find($id)->post : '',
			'status' => $id ? Posting::find($id)->status : '',
		);
		return View::make('post_add',$data);
	}

	public function savePost() {
		$id = Input::get('id');

		if($id) {
			$post2 = Posting::find($id);
		}else{
			$post2 = new Posting;
		}

		$post2->posting_title = Input::get('posting_title');
		$post2->post = Input::get('post');
		$post2->status = Input::get('status');
		$post2->user_id = Auth::user()->id;

		if($post2->save()){

			if($id){

				$activity_text = 'Edited post title: '.Input::get('posting_title');
				UserActivityLog::saveLog($activity_text);

				return Redirect::action('PostingController@getIndex')->with('success','Post Updated!');
			}
			else
			{
				$activity_text = 'Added post title: '.Input::get('posting_title');
				UserActivityLog::saveLog($activity_text);
				return Redirect::action('PostingController@getIndex')->with('success','Post Added!');
			}
			
		}
		
	}

	public function delete($id) {
		$post = Posting::find($id);
		if($post->delete()) {

			$activity_text = 'Deleted post title: '.$post->posting_title;
			UserActivityLog::saveLog($activity_text);

			return Redirect::action('PostingController@getIndex')->with('success','Post Deleted!');
		}
	}


}
