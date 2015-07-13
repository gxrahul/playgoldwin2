@extends('app')

@section('content')

	<div id="contentarea_1">
		<div class="section03 result">
			<div class="result_section">
				<div class="table-top">  
					<table class="top_list">
						<tbody>
							<tr>
								<td colspan="11">
									<span style="padding-right:10px;">Select Date</span>
									<input type="text" id="datepicker" value="<?php echo $datestr?>">
									<span style="padding-left:10px;">
										<input id="btn_get_result" class="btn btn-danger" type="submit" value="Show Result">
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>  
			</div>
			<div class="sub_section02">
				<div class="sorted_display">
					@if( !empty( $error ) )
						<div style="background:#f0d980;text-align:center;color:#000;padding:10px;">{{$error}}</div>
					@else
						<table class="tournament_list">
							<thead>
								<tr>
									<th>Time</th>
									@foreach( $series as $serie )
										<th>{{$serie->code}}</th>
									@endforeach
								</tr>
							</thead>
							<tbody>
								<?php $ctr = 0; ?>
								@if( count( $results ) == 0 )
									<tr class="odd"><td colspan="11">No Results Found</td></tr>
								@endif
								@foreach( $results as $draw_time => $result )
									<?php 
										$hh = substr( $draw_time, 0, 2 );
										$mm = substr( $draw_time, 2, 5 );

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

									<tr class="<?php echo (++$ctr)%2 === 0 ? 'even' : 'odd' ?>">
										<td align="center">{{$hh}}:{{$mm}} {{$ampm}}</td>
										@foreach( $series as $serie )
											<td align="center">{{$serie->numbers}}{{ $result[$serie->code] ? $result[$serie->code] : 'XX' }}</td>
										@endforeach
									</tr>
								@endforeach
							</tbody>
						</table>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--contentarea -->
<!--red section -->
	<div class="section_red">
		<div class="section_red_inner">&nbsp;
			<img alt="" class="freespin_banner" src="/images/cashe-credit-free-banner.png">
			<img class="karoshape" alt="" src="/images/karo.png">
			<div class="redtext_section">
				<h3>Start playing - Keep it fun, stay in control</h3>
				<ul>
					<li>Don't pay money to anyone who claims you've won</li>
					<li>We take every care to ensure the accuracy of result.</li>
					<li>If you (or your syndicate) didn't buy a ticket, there's no chance you've won.</li>
				</ul>
			</div>
			<div class="clr"></div>
		</div>
	</div>
	<!--red section -->

<script type="text/javascript">

	$(function() {

		$('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});

		$('#btn_get_result').click(function() {
			var date = $('#datepicker').val();
			if( date == '' ) {
				alert('Please select a date');
			} else {
				var url = '<?php echo url("/result"); ?>/' + date;
				window.location.href = url;
			}
		});
	})

</script>

@endsection