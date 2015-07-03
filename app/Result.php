<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model {

	protected $table = 'results';
	protected $guarded = [];
    //
	public function lottery()
	{
		return $this->belongsTo('App\Lottery');
	}

	public function series() {
		return $this->hasOne('App\Series', 'id', 'series_id');
	}

}
