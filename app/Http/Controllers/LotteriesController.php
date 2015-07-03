<?php namespace App\Http\Controllers;

use Input;
use Redirect;

use App\Lottery;
use App\Series;
Use App\Result;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LotteriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $rules = [
        'name' => ['required'],
        'hh' => ['required'],
        'mm' => ['required'],
    ];

	public function show_lotteries() {
		$lotteries = Lottery::all();
		$is_admin = true;
		return view('lotteries.manage', compact('lotteries', 'is_admin'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	public function store_lotteries( Lottery $lottery, Request $request)
	{
		$this->validate($request, $this->rules);
        $input = Input::all();
        if($input['hh'] < 10 ){
        	$input['hh'] = "0". $input['hh']; 
        }

        if($input['mm'] < 10){
        	$input['mm'] = "0". $input['mm']; 
        }

        $time = $input['hh'] . $input['mm'];

        $input['draw_time'] = $time;

        unset($input['hh']);
        unset($input['mm']);

        // dd($input);

        if( !empty($input['id']) ) {

        	$lottery = Lottery::find($input['id']);
        	$input = Input::all();

        	$time = $input['hh'] . $input['mm'];

	        $input['draw_time'] = $time;

	        unset($input['hh']);
	        unset($input['mm']);
	        unset($input['_token']); 

	        $lottery->update($input);

        }
    	else{
    		Lottery::create( $input );
    	}
     	$lotteries = Lottery::all();
     	$is_admin = true;
        return view('lotteries.manage', compact('lotteries', 'is_admin'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update_lottery( Request $request, $lottery_id )
	{
		
	}

	public function destroy_lottery( Lottery $lottery, $lottery_id ) {

		$lottery = Lottery::find($lottery_id);

		$lottery->delete();
		$lotteries = Lottery::all();
		$is_admin = true;
		return view('lotteries.manage', compact('lotteries', 'is_admin'));
	}


	///////// winning lottery controller functions

	public function index_winning() {
		$lotteries = Lottery::all();
		$series = Series::all();
		$_results = Result::where(array('date'=>date('Y-m-d')))->get();
		$results_multi = array();
		foreach( $_results as $result ) {
			if( empty( $results_multi["{$result->lottery_id}"] ) ) {
				$results_multi["{$result->lottery_id}"] = array();
			}
			$results_multi["{$result->lottery_id}"]["{$result->series_id}"] = $result->winning_number;
		}
		$is_admin = true;
		return view('lotteries.winning', compact('lotteries', 'series', 'results_multi', 'is_admin'));
	}

	public function show_winning( $lottery_id ) {
		//show winning page for a single lottery, with form to update/save winning numbers for current date
	}

	public function store_winning( Request $request ) {
		//save winning numbers for $lottery_id for current date
		$input = Input::all();
		$date = date('Y-m-d');

		$lottery_id = (int) $input['lottery_id'];

		// dd(count($results));

		$series = $input['series'];

		// dd($series);

		$ctr = 0;
		foreach ( $series as $series_id => $win_no ) {

			$series_id = (int) $series_id;
			//check if entry already created for this date and lottery id
			$result = Result::where(array( 'series_id'=>$series_id, 'lottery_id'=>$lottery_id, 'date'=>$date))->get();
			// dd(count($result));
			if( count( $result ) ) {

				$result = $result[0];
				$result->winning_number = $win_no;

			} else {
			
				$result = new Result(array(
					'date' => $date,
					'lottery_id' => $lottery_id,
					'series_id' => $series_id,
					'winning_number' => $win_no
				));
			}

			$rsp = $result->save();
			// $rsp ? ($ctr++) : '';
		}

		return Redirect::to('/admin/lotteries/winning');

	}

	public function update_winning( $lottery_id ) {
		//update winning numbers for $lottery_id for current date
	}

}
