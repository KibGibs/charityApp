<?php

class UserActivityLog extends Eloquent {

	protected $table = 'user_activity_log';

	public static function saveLog($activity2){

		$activity = new UserActivityLog;
		$activity->user_id = Auth::user()->id;
		$activity->activity = $activity2;
		$activity->save();
		
		return 'success';

	}

}
