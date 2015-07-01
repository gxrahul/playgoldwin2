@extends('app')

@section('content')
<div id="contentarea_1">
  <div class="section03 result">
		<div class="title_section">
			<table class="data-table">
				<tr>
					<div class="lbl"><th class="col-md-4" style="text-align: center;">Name</th></div>
					<div class="lbl"><th class="col-md-4" style="text-align: center;">Draw Time</th></div>
					<div class="lbl"><th class="col-md-4" style="text-align: center;">Action</th></div>
				</tr>
					@foreach ($lotteries as $lottery)
						<form class="form-horizontal" role="form" method="POST" action="" >
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<tr>
								<td><input type="text" class="form-control" name="name" value="{{ $lottery->name }}"></td>
								<?php 
									$hh = substr($lottery->draw_time, 0, 2);
									$mm = substr($lottery->draw_time, 2, 5);
								?>
								<td><input type="number" class="form-control" style="width: 45%;" placeholder="HH" name="hh" value="{{ $hh }}"> 
									: <input type="number" class="form-control" style="width: 45%;" placeholder="MM" name="mm" value="{{ $mm }}">
								</td>
								<td class="col-md-3"  style="text-align: center;"><button type="submit" class="btn btn-primary edit" style="margin-right: 15px;">Edit</button> 
									<a href="/admin/lotteries/manage/delete/{{ $lottery->id }}" class="btn btn-primary edit" style="margin-right: 15px;">Delete</a>
									<input type="hidden" name="id" value="{{ $lottery->id }}">
								</td>
							</tr>
						</form>
					@endforeach
					<tr>
						<form class="form-horizontal" role="form" method="POST" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<td><input type="text" class="form-control" name="name" value=""></td>
							<td><input type="number" class="form-control" style="width: 45%;" placeholder="HH" name="hh" value=""> 
								: <input type="number" class="form-control" style="width: 45%;" placeholder="MM" name="mm" value="">
							</td>
							<td><button type="submit" class="btn btn-primary save" style="margin-right: 15px;">Save</button></td>
						</form>
					</tr>
			</table>
		</div>
	</div>
</div>
@endsection