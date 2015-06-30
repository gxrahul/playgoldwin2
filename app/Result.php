<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	protected $guarded = [];
    //
	public function lottery()
	{
		return $this->belongsTo('App\Lottery');
	}

}
