@extends('app')

@section('content')
<div id="contentarea">
	<div class="section03">
		<!-- <div class="title_section">
			
		</div> -->
		<div class="sub_section02 winning">
			<div class="sorted_display">
				<table class="tournament_list">
					<thead>
						<tr>
							<th>Name</th>
							<th>Draw Time</th>
							<th>A</th>
							<th>B</th>
							<th>C</th>
							<th>D</th>
							<th>E</th>
							<th>F</th>
							<th>G</th>
							<th>H</th>
							<th>I</th>
							<th>J</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd">
							<form class="form-horizontal" role="form" method="POST" action="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<td align="center"><span class="ugamename">PLAYGOLDWIN</span></td>
								<td align="center"><span class="ugamename">10:30</span></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><button type="submit" class="btn btn-primary save" style="margin-right: 15px;">Save</button></td>
							</form>
			            </tr>
			            <tr class="odd">
							<form class="form-horizontal" role="form" method="POST" action="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<td align="center"><span class="ugamename">PLAYGOLDWIN</span></td>
								<td align="center"><span class="ugamename">10:30</span></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><button type="submit" class="btn btn-primary save" style="margin-right: 15px;">Save</button></td>
							</form>
			            </tr>
			            <tr class="odd">
							<form class="form-horizontal" role="form" method="POST" action="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<td align="center"><span class="ugamename">PLAYGOLDWIN</span></td>
								<td align="center"><span class="ugamename">10:30</span></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><input type="text" class="form-control" name="name" maxlength="2" value=""></td>
								<td align="center"><button type="submit" class="btn btn-primary save" style="margin-right: 15px;">Save</button></td>
							</form>
			            </tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection