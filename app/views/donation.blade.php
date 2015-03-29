@extends('layout.layout')

@section('content')
<div class="container">
 <a href="{{ URL::action('DonationController@donate') }}" role="button" class="btn btn-primary">DONATE</a>
 <a href="{{ URL::action('DonationController@paypalDonate') }}" role="button" class="btn btn-primary">DONATE via PayPal</a>

	<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="widget-header">
		<i class="icon-globe"></i>
		<h3>Donation List</h3>
	</div> 
	
	<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th> ID </th>
						<th> Donor </th>
						<th> Amount </th>
						<th> Date </th>
						<th> Remarks </th>
						<th class="td-actions">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($donation as $key => $v)
						<tr>
							<td class="span2"> {{$v->id}} </td>
							<td class="span2"> {{$v->user->first_name}} {{$v->user->last_name}}</td>
							<td class="span2">PHP {{number_format($v->donated_amount,2)}} </td>
							<td class="span2"> {{$v->donation_date}} </td>
							<td class="span2"> {{$v->remarks}} </td>
							<td class="td-actions span2">
								<a href="{{URL::action('DonationController@donationDetail', ['donate' => $v->id])}}" class="btn btn-small btn-info"><i class="btn-icon-only icon-list-alt" data-toggle="tooltip" data-placement="top" title="Program Details"> </i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>


		{{$donation->links()}}
	</div>
</div>
@stop

