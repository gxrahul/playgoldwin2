<?php namespace App\Http\Controllers;

use Input;
use Redirect;

use App\Lottery;

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
		return view('lotteries.manage', compact('lotteries'));		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store_lotteries(Request $request)
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

        Lottery::create( $input );
     
        return view('lotteries.manage')->with('message', 'Lottery data created');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function update_lottery( $lottery_id )
	{
		// update single lottery data
	}

	public function destroy_lottery( $lottery_id ) {
		// delete lottery
	}


	///////// winning lottery controller functions

	public function index_winning() {
		//list all lotteries 
	}

	public function show_winning( $lottery_id ) {
		//show winning page for a single lottery, with form to update/save winning numbers for current date
	}

	public function store_winning( $lottery_id ) {
		//save winning numbers for $lottery_id for current date
	}

	public function update_winning( $lottery_id ) {
		//update winning numbers for $lottery_id for current date
	}

}