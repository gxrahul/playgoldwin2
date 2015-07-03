@extends('app')

@section('content')
<div id="contentarea">
	<div class="section03">
		<div class="title_section">
		
			<h2>Updating Results for Today</h2>

		</div>
		<div class="sub_section02 winning">
			<div class="sorted_display">
				<table class="tournament_list" style="">
					<thead>
						<tr>
							<th style="width:157px">Name</th>
							<th style="width:73px">Draw Time</th>
							@foreach( $series as $single_series )
								<th style="width:72px;">{{$single_series->code}}</th>
							@endforeach
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $lotteries as $lottery )
							<tr class="odd">
								<td colspan="13">
									<form class="form-horizontal" role="form" method="POST" action="">
										<table style="width:100%">
											<tr>
												<td align="center" style="width:156px">
													<span class="ugamename">{{$lottery->name}}</span>
												</td>
												<td align="center" style="width:66px">
													<?php 
														$hh = substr($lottery->draw_time, 0, 2);
														$mm = substr($lottery->draw_time, 2, 5);
													?>
													<span class="ugamename">{{$hh}}:{{$mm}}</span>
												</td>
												<?php $ctr=10; ?>
												<?php $result = empty( $results_multi["{$lottery->id}"] ) ? '' : $results_multi["{$lottery->id}"]; ?>
												@foreach( $series as $single_series )
													<?php $winning = empty( $result["{$single_series->id}"] ) ? '' : $result["{$single_series->id}"]; ?>
													<td align="center" style="width:72px">
														<input type="text" class="form-control" name="series[{{$single_series->id}}]" minlength="2" maxlength="2" value='{{$winning}}'>
													</td>
												@endforeach

												<td align="center">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="lottery_id" value="{{ $lottery->id }}">
													<button type="submit" class="btn btn-primary save" style="margin-right: 15px;">Save</button>
												</td>
											</tr>
										</table>
									</form>
								</td>
				            </tr>
				        @endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection