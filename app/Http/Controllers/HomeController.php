<?php namespace App\Http\Controllers;

use Auth;
use Redirect;

use App\Lottery;
use App\Series;
Use App\Result;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//@author: Rahul, removes to make this controller usable for front pages without login
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		$series = Series::all();

		// get lottery to display
		$time = date("Hi");
		$next_draw_lottery = Lottery::where( "draw_time", '>', $time )->orderBy( "draw_time" )->first();
		if( $next_draw_lottery ) {
			$next_draw_time = date_create_from_format("Hi", $next_draw_lottery->draw_time);
			$next_draw_time = $next_draw_time->format("h:i A");
		} else {
			$next_draw_time = "--:--";
		}
		
		$lottery = Lottery::where( "draw_time", '<=', $time )->orderBy( "draw_time", "desc" )->first();
		
		if( $lottery ) {
			$date = date('Y-m-d');
			$results = Result::where( array( "date" => $date, 'lottery_id' => $lottery->id ) )->with('series')->get();
		}
		// dd($results->first()->series->code);
		return view('home', compact('results', 'lottery', 'series', 'next_draw_time'));
	}

	public function doLogout() {
		Auth::logout(); // log the user out of our application
		return Redirect::to('auth/login'); // redirect the user to the login screen
	}

	public function showresult( $date = '' ) {

		if( empty( $date ) ) {
			$date = date_create('now');
		} else {
			$date = date_create_from_format( 'Y-m-d', $date );
		}

		//block future date results
		if( $date > date_create('now') ) {
			$datestr = $date->format('Y-m-d');
			$error = 'Future date, Result not declared yet';
			return view('results', compact('error', 'datestr'));
		}

		$date->setTime(0,0,0);

		$datestr = $date->format('Y-m-d');

		$current_time = intval( date('Hi') );

		$_results = Result::with('lottery')->with('series')->where( "date", '=', $date )->orderBy('lottery_id')->orderBy('series_id')->get();

		// dd($results[0]);

		$results = array();
		$time = date("");
		if( count( $_results ) > 0 ) {
			foreach ( $_results as $_result ) {
				if( intval($_result->lottery->draw_time) > $current_time ) {
					continue;
				}
				if( empty( $results["{$_result->lottery->draw_time}"] ) ) {
					$results["{$_result->lottery->draw_time}"] = array();
				}
				$results["{$_result->lottery->draw_time}"]["{$_result->series->code}"] = $_result->winning_number;
			}
		}

		$series = Series::all();

		return view('results', compact( 'results', 'series', 'datestr' ));

	}

}
