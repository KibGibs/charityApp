<?php

class DonationController extends BaseController {


	public function getIndex(){
		if(Auth::user()->isDonor()) {
			$donation = Donation::where('user_id', Auth::user()->id)->paginate(10);
		}else{
			$donation = Donation::paginate(10);
		}
		
		foreach($donation as $k=>$v) {
			$v->user = User::find($v->user_id);
		}
		
		$data = array(
			'donation' => $donation,
		);
		return View::make('donation', $data);
	}
	
	public function donate() {
		$data = array(
			'program' => Program::all(),
		);
		return View::make('donate', $data);
	}
	
	public function postDonate() {
		$amount = Input::get('amount');
		$date = Input::get('date');
		$remarks = Input::get('remarks');

		$donation = new Donation;
		$donation->donated_amount = $amount;
		$donation->user_id = Auth::user()->id;
		$donation->donation_date = $date;
		$donation->remarks = $remarks;
		if($donation->save()){
			return Redirect::action('DonationController@getIndex')->with('success','Donation Added!');
		}
	}
	
	public function donationDetail($id) {
		$donation = DonationDetail::where('donation_id', $id)->get();
		foreach($donation as $k=>$v) {
			$v->program = Program::find($v->progam_id);
		}
		
		$data = array(
			'program' => Program::all(),
			'donation_detail' => $donation,
			'id' => $id,
		);
		return View::make('donate_detail', $data);
	}
	
	public function postDonateDetail(){
		$id = Input::get('id');
		$program = Input::get('program');
		$hasDetail = DonationDetail::where('donation_id', $id)->where('progam_id', $program)->get();
		
		
		if($hasDetail->count() > 0) {
			return Redirect::action('DonationController@donationDetail',['donate'=>$id ])->with('Error','Program Already Added!');
		}else{
		
			$donation_detail = new DonationDetail;
			$donation_detail->donation_id = $id;
			$donation_detail->progam_id = $program;
			if($donation_detail->save()){
				return Redirect::action('DonationController@donationDetail',['donate'=>$id ])->with('success','Donation Detail Added!');
			}
		}
	}
	
	public function deleteDetail($donate, $detail) {
		$donation_detail = DonationDetail::find($detail);
		if($donation_detail) {
			if($donation_detail->delete()) {
				return Redirect::action('DonationController@donationDetail',['donate'=>$donate ])->with('success','Donation Detail Deleted!');
			}	
		}
	}

}
