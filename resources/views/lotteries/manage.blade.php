@extends('app')

@section('content')
<div id="contentarea_1">
  <div class="section03 result">
		<div class="title_section">
			<table class="data-table">
				<tr>
					<th class="col-md-4 lbl" style="text-align: center;width:40%">Name</th>
					<th class="col-md-5 lbl" style="text-align: center;width:30%">Draw Time</th>
					<th class="col-md-3 lbl" style="text-align: center;width:30%">Action</th>
				</tr>
					@foreach ($lotteries as $lottery)						
						<tr>
							<td colspan="3">
								<form class="form-horizontal" role="form" method="POST" action="" >
									<table style="width:100%">
										<tr>
											<td class="col-md-4" style="text-align: center;width:40%">
												<input type="text" class="form-control" name="name" value="{{ $lottery->name }}">
											</td>
											<td class="col-md-5" style="text-align: center;width:30%">
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
												<input pattern="[0-9]*" min="1" max="12" step="1" type="number" class="form-control" style="width: 15%;" placeholder="HH" name="hh" value="{{ $hh }}">
												: <input pattern="[0-9]*" min="0" max="59" step="1" type="number" class="form-control" style="width: 15%;margin-left:0;" placeholder="MM" name="mm" value="{{ $mm }}">
												: <select class="form-control" style="width: 22%;margin-left:0;" name="ampm" value="{{ $ampm }}">
													<option value="AM" @if($ampm === 'AM') selected="selected" @endif>AM</option>
													<option value="PM" @if($ampm === 'PM') selected="selected" @endif>PM</option>
													</select>
											</td>
											<td class="col-md-3"  style="text-align: center;width:30%">
												<input type="hidden" name="id" value="{{ $lottery->id }}">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" class="btn btn-primary edit" style="margin-right: 15px;">Save</button> 
												<a href="/admin/lotteries/manage/delete/{{ $lottery->id }}" class="btn btn-danger edit" style="margin-right: 15px;">Delete</a>
											</td>
										</tr>
									</table>
								</form>
							</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="3">
							<form class="form-horizontal" role="form" method="POST" action="">
								<table style="width:100%">
									<tr>
										<td style="text-align: center;width:40%">
											<input type="text" class="form-control" name="name" value="">
										</td>
										<td style="text-align: center;width:30%">
												<input min="1" max="12" step="1" type="number" class="form-control" style="width: 15%;" placeholder="HH" name="hh" value="00">
												: <input min="0" max="59" step="1" type="number" class="form-control" style="width: 15%;margin-left:0;" placeholder="MM" name="mm" value="00">
												: <select class="form-control" style="width: 22%;margin-left:0;" name="ampm" value="{{ $ampm }}">
													<option value="AM">AM</option>
													<option value="PM">PM</option>
												</select>
										</td>
										<td style="text-align: center;width:30%">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-primary save" style="margin-right: 15px;">Add</button>
										</td>
									</tr>
								</table>
							</form>
						</td>
					</tr>
			</table>
		</div>
	</div>
</div>
@endsection