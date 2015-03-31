<?php

class Reports extends \BaseController {


	public function getDonors()
	{
		$data['results'] = DB::select('SELECT COUNT(1) count,SUM(b.donated_amount) total,a.first_name, a.last_name,a.id
					FROM users a, donations b 
					WHERE a.id = b.user_id AND b.status = 1
                    GROUP BY a.id');

		return View::make('reports.donors',$data);
	}

	public function getProgramReport(){
		$data['results'] = DB::select('SELECT a.id,a.name,a.status,SUM(b.cost) total 
FROM program a, program_detail b
WHERE a.id = b.program_id
GROUP BY a.id');
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

		$data['results'] = DB::select("SELECT (SELECT a.name FROM activity a WHERE a.id = b.activity_id) name, COUNT(1) count
FROM donation_detail b, donations c WHERE b.donation_id = c.id AND c.user_id = ".$id."
GROUP BY name");

		return View::make('reports.donation',$data);

	}

}
