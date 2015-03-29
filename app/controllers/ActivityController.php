<?php

class ActivityController extends BaseController {


	public function getIndex(){
	
		$data = array(
			'activity' => Activity::paginate(10),
		);
		return View::make('activity', $data);
	}
	
	public function getIndexAdd($id = null){
		
		$data = array(
			'id' => $id,
			'name' => $id ? Activity::find($id)->name : '',
		);
		return View::make('activity_add', $data);
	}
	
	public function save(){
		$name = Input::get('name');
		$id = Input::get('id');
		
		if($id) {
			$activity = Activity::find($id);
		}else{
			$activity = new Activity;
		}
		$activity->name = $name;
		
		if($activity->save()) {
			return Redirect::action('ActivityController@getIndex')->with('success','Activity Saved!');
		}
	}
	
	public function delete($id) {
		$activity = Activity::find($id);
		if($activity->delete()) {
			return Redirect::action('ActivityController@getIndex')->with('success','Activity Deleted!');
		}
	}
	
	public function getIndexSubActivity($id=null) {
		$data = array(
			'id' => $id,
			'name' => $id ? SubActivity::find($id)->name : '',
			'sub_activity' => SubActivity::paginate(10),
		);
		return View::make('sub_activity', $data);
	}
	
	public function saveSubActivity() {
		$name = Input::get('name');
		$id = Input::get('id');
		
		if($id) {
			$sub_activity = SubActivity::find($id);
		}else{
			$sub_activity = new SubActivity;
		}
		$sub_activity->name = $name;
		
		if($sub_activity->save()) {
			return Redirect::action('ActivityController@getIndexSubActivity')->with('success','Activity Saved!');
		}
	}
	
	public function deleteSubActivity($id) {
		$sub_activity = SubActivity::find($id);
		if($sub_activity->delete()) {
			return Redirect::action('ActivityController@getIndexSubActivity')->with('success','Activity Deleted!');
		}
	}
	
	public function getActivityDetail($activity) {
		$activity_detail = ActivityDetail::where('activity_id', $activity)->get();
		foreach($activity_detail as $k=>$v) {
			$v->sub_activity_id = SubActivity::find($v->sub_activity_id);
		}
		$data = array(
			'activity' => $activity,
			'activity_detail' => $activity_detail,
			'sub_activity' => SubActivity::all(),
		);

		return View::make('activity_detail', $data);
	}
	
	public function saveActivityDetail() {
		$sub_activity = Input::get('sub_activity');
		$activity = Input::get('activity');
		
		$has_sub_activity = ActivityDetail::where('activity_id', $activity)->where('sub_activity_id', $sub_activity)->get();
		if($has_sub_activity->count()) {
			return Redirect::action('ActivityController@getActivityDetail', ['activity' => $activity])->with('Error','Sub Activity already Added!');
		}
		
		$detail = new ActivityDetail;
		$detail->activity_id = $activity;
		$detail->sub_activity_id = $sub_activity;
		if($detail->save()){
			return Redirect::action('ActivityController@getActivityDetail', ['activity' => $activity])->with('success','Sub Activity Added!');
		}
	}
	
	public function deleteActivityDetail($id) {

		 $activity_detail = ActivityDetail::find($id);
		 $activity = $activity_detail->activity_id;
		if($activity_detail->delete()) {
			return Redirect::action('ActivityController@getActivityDetail', ['activity' => $activity])->with('success','Sub Activity Deleted!');
		} 

	}

}
