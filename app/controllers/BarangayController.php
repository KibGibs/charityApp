<?php

class BarangayController extends BaseController {


	public function getIndex(){
	
		$data = array(
			'barangay' => Barangay::all(),
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
			return Redirect::action('BarangayController@getIndex')->with('success','Barangay Saved!');
		}
	}
	
	public function delete($id) {
		$barangay = Barangay::find($id);
		if($barangay->delete()) {
			return Redirect::action('BarangayController@getIndex')->with('success','Barangay Deleted!');
		}
	}

}
