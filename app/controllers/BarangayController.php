<?php

class BarangayController extends BaseController {


	public function getIndex(){
	
		$data = array(
			'barangay' => Barangay::paginate(10),
		);
		return View::make('barangay', $data);
	}
	
	public function getIndexAdd($id = null){
		$data = array(
			'id' => $id,
			'name' => $id ? Barangay::find($id)->name : '',
		);
		return View::make('barangay_add', $data);
	}
	
	public function save() {
		
		$name = Input::get('name');
		$id = Input::get('id');
		
		if($id) {
			$barangay = Barangay::find($id);
		}else{
			$barangay = new Barangay;
		}
		$barangay->name = $name;
		
		if($barangay->save()) {

			if($id){
				$activity_text = 'Edited barangay name: '.$name;
			}
			else
			{
				$activity_text = 'Added barangay name: '.$name;
			}
			

			UserActivityLog::saveLog($activity_text);

			return Redirect::action('BarangayController@getIndex')->with('success','Barangay Saved!');
		}
	}
	
	public function delete($id) {
		$barangay = Barangay::find($id);

		if($barangay->delete()) {

			$activity_text = 'Deleted barangay name: '.$barangay->name;
			UserActivityLog::saveLog($activity_text);

			return Redirect::action('BarangayController@getIndex')->with('success','Barangay Deleted!');
		}
	}

}
