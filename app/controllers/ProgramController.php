<?php

class ProgramController extends BaseController {


	public function getIndex(){
	
		$data = array(
			'program' => Program::all(),
		);
		return View::make('program', $data);
	}
	
	public function programAddIndex($program = null){
	
		
		return View::make('program_add');
	}
	
	public function saveProgram() {
		$name = Input::get('name');
		
		$program = new Program;
		$program->name = $name;
		if($program->save()){
			return Redirect::action('ProgramController@getIndex')->with('success','Program Added!');
		}
		
	}
	
	public function getProgramDetail($id) {
		
		$data = array(
			'id' => $id,
			'program_detail' => ProgramDetail::where('program_id', $id)->get(),
		);
		return View::make('program_detail', $data);
	}
	
	public function addProgramDetail($id){
		$data = array(
			'barangay' => Barangay::all(),
			'program' => Program::find($id),
			'activity' => Activity::all(),
		);
		return View::make('program_detail_add', $data);
	}
}
