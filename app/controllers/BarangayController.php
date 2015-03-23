<?php

class BarangayController extends BaseController {


	public function getIndex(){
	
		$data = array(
			'barangay' => Barangay::all(),
		);
		return View::make('barangay', $data);
	}
	
	public function getIndexAdd(){
		return View::make('barangay_add');
	}
	
	public function add() {
		
		$name = Input::get('name');
		
		$barangay = new Barangay;
		$barangay->name = $name;
		if($barangay->save()) {
			return Redirect::action('BarangayController@getIndex')->with('success','Barangay Added!');
		}
	}

}
