@extends('app')

@section('content')
		<!--slider_section -->
		<div id="slider_section">
			<div class="slider_section_inner">
				<div id="slider-wrapper">
					<div id="slider" class="nivoSlider"> 
						<a href="#"><img src="images/banner_01.png" alt=""/></a>
						<a href="#"><img src="images/banner_01a.png" alt=""/></a>
						<a href="#"><img src="images/banner_02.png" alt=""/></a>
						<a href="#"><img src="images/banner_01a.png" alt=""/></a>
						<a href="#"><img src="images/banner_04.png" alt=""/></a> 
						<a href="#"><img src="images/banner_01a.png" alt=""/></a>
					</div>
				</div>
			</div>
		</div>
		<!--slider_section -->

		<!--contentarea -->
		<div id="contentarea">
			<div class="section03">
				<div class="title_section">
					<div class="table-top">  
						<table class="top_list">
							<thead>
								<tr>
									<th>Next Draw Time</th>
									<th>Today Date</th>
									<th>Current Time</th>
									<th>Today Result</th>
									<th>Time to Draw</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td id="next_draw_time">{{$next_draw_time}}</td>
									<td>{{date('m/d/Y')}}</td>
									<td id="current_time"></td>
									<td><a style="background: url(./images/send-btn01.png) 0 0 no-repeat;
										width: 116px;
										height: 42px;
										display: inline-block;
										box-sizing: border-box;
										padding: 10px 10px;
										text-decoration: none;
										color: #fff;
										font-weight: bold;" href="/result">Click</a>
									</td>
									<td id="time_to_draw">--:--</td>
								</tr>
							</tbody>
						</table>
					</div>  
				</div>
				<div class="sub_section02">
					<!--tab start -->
					<div class="sorted_display">
						<!-- <h4>We have 32 tournaments for you</h4>  -->
						<table class="tournament_list">
							<thead>
								<tr>
									<th>Name</th>
									<th>Sr.</th>
									<th>Win</th>
									<th>0</th>
									<th>1</th>
									<th>2</th>
									<th>3</th>
									<th>4</th>
									<th>5</th>
									<th>6</th>
									<th>7</th>
									<th>8</th>
									<th>9</th>
									<th>Qty.</th>
									<th>Amount</th>
									<?php
										$hh = substr($lottery->draw_time, 0, 2);
										$mm = substr($lottery->draw_time, 2, 5);

										$hh_int = intval( $hh, 10 );

										$ampm = "AM";
										if( $hh_int >= 12 ) {
											$ampm = "PM";
											if( $hh_int > 12 ) {
												$hh -= 12;
												$hh = $hh < 9 ? "0$hh" : $hh;
											}
										} else if( $hh_int === 0 ) {
												$hh = 12;
										}
									?>
									<th>{{$hh}}:{{$mm}} {{$ampm}}</th>
								</tr>
							</thead>  
							<tbody>
								@foreach( $results as $result)
									<tr class="odd">
										<td><span id="lbl_g1"><span class="ugamename">GOODLUCK 1000 {{$result->series->code}}</span> <br><span class="bgamename">{{$lottery->name}}</span></span></td>
										<td>{{$result->series->code}}</td>
										<td>100</td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" onkeyup="TableOperations ('Text00');" class="input-num" id="Text00" maxlength="3" name="Text00"></td>
										<td><input type="text" class="Qtytxt" disabled="disabled" id="Text100" name="Text100"></td>
										<td><input type="text" class="Amnttxt" disabled="disabled" id="Text101" name="Text101"></td>
										<td class="lot-name">{{$result->series->numbers}}{{$result->winning_number}}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div class="clr"></div>
					</div>
					<!--tab end -->
				</div>
			</div>
			<div class="section02">
				<img alt="" class="heartshape" src="images/heart-shape.png">
				<img alt="" class="promo_banner" src="images/promotion_banner.png">
				<div class="stepsbox">
					<div class="box01">
						<div class="number"><img alt="" src="images/number01.png"></div>
						<p><strong>Buy lottery tickets</strong><br>from your LOCAL VENDOR</p>

					</div>
					<div class="box02">
						<div class="number"><img alt="" src="images/number02.png"></div>
						<p><strong>Match your ticket no.</strong> <br> ON RESULT PAGE</p>
					</div>
					<div class="box03">
						<div class="number"><img alt="" src="images/number03.png"></div>
						<p>collect your<br><strong>"CASH"</strong> from VENDOR</p>

					</div>
				</div>
			</div>
		</div>
		<!--contentarea -->

<script type="text/javascript">
	function update() {

		$('#current_time').html(moment().format('h:mm:ss A'));
		
		var next_draw_time_str = $("#next_draw_time").html();
		if( next_draw_time_str === '--:--' ) {
			return;
		}
		var next_draw_time = moment( next_draw_time_str, "hh:mm A" );

		var time_to_draw = next_draw_time.diff( moment() );
		if( time_to_draw <= 0 ) {
			window.location.reload();
			return;
		}
		
		var time_to_draw_duration = moment.duration( time_to_draw );
		console.log("time_to_draw", time_to_draw_duration);

		$('#time_to_draw').html( time_to_draw_duration.hours() + ":" + time_to_draw_duration.minutes() + ":" + time_to_draw_duration.seconds() );

	}

	setInterval(update, 1000);
</script>

@endsection
