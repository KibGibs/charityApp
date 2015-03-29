<?php

class ProgramController extends BaseController {


	public function getIndex(){
	
		$data = array(
			'program' => Program::paginate(10),
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
		$program_detail = ProgramDetail::where('program_id', $id)->get();
		foreach($program_detail as $k=>$v) {
			$activity_detail =  ActivityDetail::find($v->activity_detail);
				$v->activity_detail = $activity_detail;
		}
		$data = array(
			'id' => $id,
			'program_detail' => $program_detail,
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
	
	public function getSubActivity($id) {
		$activity_detail = ActivityDetail::where('activity_id', $id)->get();
		foreach($activity_detail as $k=>$v) {
			$v->sub_activity_id = SubActivity::find($v->sub_activity_id); 
		}
		return $activity_detail;
	}
	
	public function postProgramDetail() {
		$barangay = Input::get('barangay');
		$activity = Input::get('activity');
		$subActivity = Input::get('subActivity');
		$start = Input::get('start');
		$end = Input::get('end');
		$cost = Input::get('cost');
		$program = Input::get('program');
		$qty = Input::get('qty');
		
		$activity_detail = ActivityDetail::where('activity_id',$activity)->where('sub_activity_id', $subActivity)->first();
		
		if($activity_detail) {
			$hasProgram = ProgramDetail::where('program_id', $program)->where('activity_detail_id',$activity_detail->id)->get();
			if($hasProgram->count() > 0) {
				return 'error';
			}else{
				$program_detail = new ProgramDetail;
				$program_detail->program_id = $program;
				$program_detail->cost = $cost;
				$program_detail->start_date = date("Y-m-d", $start);
				$program_detail->end_date = date("Y-m-d", $end);
				$program_detail->activity_detail_id = $activity_detail->id;
				$program_detail->qty = $qty;
				$program_detail->save();
			}
		}

	}
}
