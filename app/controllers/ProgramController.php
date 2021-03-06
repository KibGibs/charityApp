<?php

class ProgramController extends BaseController {


	public function getIndex(){

		// $progress = ProgramDetail::where('program_id', $id)->get();
		
		// foreach($progress as $k=>$v) {
		// 	$now = \Carbon\Carbon::now();
		// 	$end_date = \Carbon\Carbon::createFromTimeStamp(strtotime($v->end_date));
		// 	if($now->gt($end_date)){
		// 		$done += 1;
		// 	}
			
		// }

		// $total = $progress->count() ? $progress->count() : 1;
		// $percent = ($done / $total ) * 100;
	
		$data = array(
			'program' => Program::paginate(10)
		);

		return View::make('program', $data);
	}
	
	public function programAddIndex($program = null){
	
		$data = array(
			'id' => $program,
			'name' => $program ? Program::find($program)->name : '',
		);
		return View::make('program_add', $data);
	}
	public function getToggleStatus($id){
		$program = Program::find($id);
		
		if($program) {
			if($program->status == 0) {
				$program->status = 1;
			}else{
				$program->status =0;
			}
		}
		$program->save();
		return Redirect::action('ProgramController@getIndex');

	}
	public function saveProgram() {
		$name = Input::get('name');
		
		$id = Input::get('id');
		if($id) {
			$program = Program::find($id);
		}else{
			$program = new Program;
		}
		
		$program->name = $name;
		if($program->save()){
		
			$activity_text = 'Added program name: '.$name;
			UserActivityLog::saveLog($activity_text);
			return Redirect::action('ProgramController@getIndex')->with('success','Program Saved!');

		}
		
	}
	
	public function getProgramDetail($id) {
		$program_detail = ProgramDetail::where('program_id', $id)->get();
		$program_get_name = Program::find($id);
		$program_name = $program_get_name->name;

		foreach($program_detail as $k=>$v) {
				$v->program = Program::find($v->program_id);
				$v->activity_detail = ActivityDetail::find($v->activity_detail_id);
				$v->activity_detail->activity = Activity::find($v->activity_detail->activity_id);
				$v->activity_detail->subActivity = SubActivity::find($v->activity_detail->sub_activity_id);
				$v->barangay_name = Barangay::find($v->barangay_id);
				$v->start_date = date('F j, Y', strtotime($v->start_date));
				$v->end_date = date('F j, Y', strtotime($v->end_date));
					$now = \Carbon\Carbon::now();
					$end_date = \Carbon\Carbon::createFromTimeStamp(strtotime($v->end_date));	
				$v->done = $now->gt($end_date);	
		}

		// Carbon::setTestNow($knownDate); 
		$done = 0;
		$progress = ProgramDetail::where('program_id', $id)->get();

		foreach($progress as $k=>$v) {
			$now = \Carbon\Carbon::now();
			$end_date = \Carbon\Carbon::createFromTimeStamp(strtotime($v->end_date));
			if($now->gt($end_date)){
				$done += 1;
			}
			
		}

		$total = $progress->count() ? $progress->count() : 1;
		$percent = ($done / $total ) * 100;
		
		$data = array(
			'id' => $id,
			'program_detail' => $program_detail,
			'program_name' => $program_name,
			'percent' => number_format($percent,2)
		);
		return View::make('program_detail', $data);
	}
	
	public function addProgramDetail($id){
	
		$data = array(
			'barangay' => Barangay::all(),
			'program' => Program::find($id),
			'activity' => Activity::where('status',0)->get(),
			'id' => $id,
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
			$hasProgram = ProgramDetail::where('program_id', $program)->where('activity_detail_id',$activity_detail->id)->where('barangay_id',$barangay)->get();
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
				$program_detail->barangay_id = $barangay;
				$program_detail->save();
			}
		}

	}
	
	public function delete($program) {
		$pr = Program::find($program);
		if($pr) {
			if($pr->delete()){
				return Redirect::action('ProgramController@getIndex')->with('success','Program Deleted!');
			}
		}
		
	}
	
	public function deleteDetail($program,$detail){
		$detail = ProgramDetail::find($detail);
		
		if($detail) {
			if($detail->delete()) {
				return Redirect::action('ProgramController@getProgramDetail',['program' => $program])->with('success','Program Detail Deleted!');
			}
		}
	}
	
	public function viewDonations($id) {
		$donation_detail = DonationDetail::where('activity_id', $id)->get();
		foreach($donation_detail as $k=>$v) {
			$v->donation = Donation::find($v->donation_id);
			$v->donation->donor = User::find($v->donation->user_id);
		}
		$data = array(
			'donations' => $donation_detail,
			'id' => $id
		);
		return View::make('program_donations', $data);
	}
	
	public function printPDF($id) {
		
		$donation_detail = DonationDetail::where('activity_id', $id)->get();
		foreach($donation_detail as $k=>$v) {
			$v->donation = Donation::find($v->donation_id);
			$v->donation->donor = User::find($v->donation->user_id);
		}
		
		$data = array(
			'donations' => $donation_detail,
			'program' => Activity::find($id)
		);
		
		$pdf = PDF::loadView('pdf.program_donation', $data);
		return $pdf->stream('pdf.program_donation');
	}

	public function printPDF2($id) {
		$donation_detail = DonationDetail::where('progam_id', $id)->get();
		foreach($donation_detail as $k=>$v) {
			$v->donation = Donation::find($v->donation_id);
			$v->donation->donor = User::find($v->donation->user_id);
		}
		
		$data = array(
			'donations' => $donation_detail,
			'program' => Program::find($id)
		);
		//return View::make('pdf.program_donation', $data);
		$pdf = PDF::loadView('pdf.program_donation', $data);

		return $pdf->stream('program_donation');

		// $program_detail = ProgramDetail::where('program_id', $id)->get();
		// $program_get_name = Program::find($id);
		// $program_name = $program_get_name->name;
		// foreach($program_detail as $k=>$v) {
		// 		$v->program = Program::find($v->program_id);
		// 		$v->activity_detail = ActivityDetail::find($v->activity_detail_id);
		// 		$v->activity_detail->activity = Activity::find($v->activity_detail->activity_id);
		// 		$v->activity_detail->subActivity = SubActivity::find($v->activity_detail->sub_activity_id);
		// 		$v->start_date = date('F j, Y', strtotime($v->start_date));
		// 		$v->end_date = date('F j, Y', strtotime($v->end_date));
				
		// }
		
		// $data = array(
		// 	'id' => $id,
		// 	'program_detail' => $program_detail,
		// 	'program_name' => $program_name
		// );
		// return View::make('program_detail', $data);

	}
}
