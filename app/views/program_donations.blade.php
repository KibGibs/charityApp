@extends('layout.layout')

@section('content')
<div class="container">
		<a href="{{ URL::action('ProgramController@printPDF', ['program' => $id]) }}" class="btn btn-primary">Print PDF</a>
		<br/>
		<br/>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> ID </th>
					<th> Donor </th>
					<th> Amount </th>
					<th> Date </th>
					<th> Remarks </th>
				</tr>
			</thead>
			<tbody>
				@foreach($donations as $key => $v)
						<tr>
							<td class=""> {{$v->id}} </td>
							<td class=""> {{$v->donation->donor->first_name}} {{$v->donation->donor->last_name}}</td>
							<td class="">PHP {{number_format($v->donation->donated_amount,2)}} </td>
							<td class=""> {{$v->donation->donation_date}} </td>
							<td class=""> {{$v->donation->remarks}} </td>
						</tr>	
				@endforeach
			</tbody>
		</table>
</div>
@stop

