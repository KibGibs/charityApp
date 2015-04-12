@extends('layout.layout')

@section('content')
<div class="container">

	<div class="widget-header">
		<i class="icon-money"></i>
		<h3>{{$name->last_name}}, {{$name->first_name}}</h3>
	</div> 

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Donation Date</th>
					<th> Program Name </th>
					<th> Activity Name </th>
					<th> Amount </th>
					<th> Remarks </th>
				</tr>
			</thead>
			<tbody>

				@foreach($results as $key => $v)
					<tr>
						<td>{{date("M d, Y", strtotime($v->donation_date))}}</td>
						<td>{{$v->prog_name}}</td>
						<td>{{$v->act_name}}</td>
						<td>{{number_format($v->donated_amount,2)}}</td>
						<td>{{$v->remarks}}</td>
					</tr>
				@endforeach

			</tbody>
		</table>

	</div>
</div>
@stop

