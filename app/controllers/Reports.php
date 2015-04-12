<?php

class Reports extends \BaseController {


	public function getDonors()
	{
		/* $data['results'] = DB::select('SELECT COUNT(1) count,SUM(b.donated_amount) total,a.first_name, a.last_name,a.id
					FROM users a, donations b 
					WHERE a.id = b.user_id AND b.status = 1
                    GROUP BY a.id'); */
						
		$donors = DB::table('users')
					->select('donations.*', DB::raw('COUNT(users.id) as count'))
					->addSelect('donations.*', DB::raw('SUM(donations.donated_amount) as total'))
					->join('donations', 'users.id', '=', 'donations.user_id')
					->groupBy('users.id')
					->paginate(10);
		
		foreach($donors as $k=>$v) {
			$v->user = User::find($v->user_id);
		}
		
		$data = array(
			'results' => $donors,
		); 
		
		return View::make('reports.donors',$data);
	}

	public function getProgramReport(){
		/* $data['results'] = DB::select('SELECT a.id,a.name,a.status,SUM(b.cost) total 
		FROM program a, program_detail b
		WHERE a.id = b.program_id
		GROUP BY a.id'); */
		
		$program = DB::table('program')
					->select('program_detail.*', DB::raw('SUM(program_detail.cost) as total'))
					->addSelect('program.status')
					->join('program_detail', 'program.id', '=', 'program_detail.program_id')
					->groupBy('program.id')
					->paginate(10);
					
		
		
		foreach($program as $k=>$v) {
			$v->program = Program::find($v->program_id);
		}
		
		$data = array(
			'results' => $program,
		); 
		
					
		return View::make('reports.program',$data);
	}

	public function getActivity($id = null){

		$data['results'] = DB::select("SELECT (SELECT a.name FROM activity a WHERE b.activity_id = a.id) name, COUNT(1) count
		FROM activity_detail b, program_detail c
		WHERE c.activity_detail_id = b.id
		AND c.program_id = ".$id."
		GROUP by name");

		return View::make('reports.activity',$data);
	}

	public function getDonation($id){

		$data['name'] = User::find($id);

		$data['results'] =DB::select("
			SELECT b.name act_name, a.name prog_name, c.donation_date, c.donated_amount, c.remarks, c.status, c.paypal_transaction_id
			FROM program a, activity b, donations c
			WHERE c.user_id = ".$id."
			AND c.activity_id = b.id
			AND c.program_id = a.id
			");

		// dd($data['results']);
		// $data['results'] = DB::select("SELECT (SELECT a.name FROM activity a WHERE a.id = b.activity_id) name, COUNT(1) count
		// FROM donation_detail b, donations c WHERE b.donation_id = c.id AND c.user_id = ".$id."
		// GROUP BY name");

		return View::make('reports.donation',$data);

	}

	public function getProgramSummary(){
		$data = array(
			'program' => Program::paginate(10),
		);

		return View::make('reports.program_summary',$data);
	}

	public function getSummary($id = null){
		$data['name'] = Program::find($id);

		$data['activity'] =DB::select("SELECT (SELECT a.name FROM activity a WHERE b.activity_id = a.id) name
		FROM activity_detail b, program_detail c
		WHERE c.activity_detail_id = b.id
		AND c.program_id = ".$id."
		GROUP by name");

		$data['barangay'] = DB::select("SELECT a.name FROM barangay a, program_detail b
		WHERE a.id = b.barangay_id AND b.program_id = ".$id."
		GROUP BY a.name");

		$data['total'] = DB::select("SELECT SUM(cost) total FROM program_detail WHERE program_id = ".$id);

		$data['sub_activity'] = DB::select("SELECT (SELECT a.name FROM sub_activity a WHERE b.sub_activity_id = a.id) name,
		c.qty,c.cost,c.start_date,c.end_date
		FROM activity_detail b, program_detail c
		WHERE c.activity_detail_id = b.id
		AND c.program_id =".$id);

		$data['min_date'] = DB::select("SELECT min(start_date) min_date FROM program_detail WHERE program_id = ".$id);
		$data['max_date'] = DB::select("SELECT max(end_date) max_date FROM program_detail WHERE program_id = ".$id);
		return View::make('reports.summary',$data);
	}

}
