@extends('app')

@section('content')

	<div id="contentarea_1">
		<div class="section03 result">
			<div class="result_section">
				<div class="table-top">  
					<form class="form-horizontal" role="form" method="POST" action="">
						<div class="title_section" style="padding: 20px;">
							<table class="data-table">
								<tbody>
									@if( session()->has( 'message' ) )
									<tr>
										<td colspan="2">
											<div style="background:#333;border-radius:4px;color:#fff;padding:10px;">{{session( 'message' )}}</div>
										</td>
									</tr>
									@endif
									<tr>
										<td style="width:30%;text-align:right;"><label>Email ID</label></td>
										<td><input class="form-control" type="email" name="email" value="{{$user->email}}"></td>
									</tr>
									<tr>
										<td style="width:30%;text-align:right;"><label>Password (Leave empty if you dont want to change)</label></td>
										<td><input class="form-control" type="password" name="pass" value=""></td>
									</tr>
									<tr>
										<td style="width:30%">&nbsp;</td>
										<td>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button style="width:100px;" class="btn btn-primary form-control">Save</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--contentarea -->
@endsection