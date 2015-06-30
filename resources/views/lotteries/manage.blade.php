@extends('app')
@section('content')
<div id="contentarea_1">
  <div class="section03 result">
		<div class="title_section">
			<form class="form-horizontal" role="form" method="POST" action="/lotteries/manage">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table>
					<tr>
						<th style="text-align: center;">Name</th>
						<th style="text-align: center;">Draw Time</th>
						<th style="text-align: center;">Action</th>
					</tr>
					<tr>
						<td><input type="text" class="form-control" name="name" value=""></td>
						<td><input type="number" class="form-control" style="width: 45%;" placeholder="HH" name="hh" value=""> : <input type="number" class="form-control" style="width: 45%;" placeholder="MM" name="mm" value=""></td>
						<td><a href="#">X</a> <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Save</button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection