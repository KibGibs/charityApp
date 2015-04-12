@extends('layout.layout')

@section('content')
<div class="container">
 <a href="{{ URL::action('DonationController@donate') }}" role="button" class="btn btn-primary">DONATE</a>
 <a href="{{ URL::action('DonationController@donateViaPaypal') }}" role="button" class="btn btn-primary">DONATE via PayPal</a>


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
						<th> Program </th>
						<th> Activity </th>
						<th> Amount </th>
						<th> Date </th>
						<th> Paypal Transaction ID </th>
						<th> Remarks </th>
						<th> Status </th>
						<th class="td-actions">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($donation as $key => $v)
						<tr>
							<td class="span2"> {{$v->id}} </td>
							<td class="span2"> {{$v->user->first_name}} {{$v->user->last_name}}</td>
							<td class="span2"> {{$v->program}} </td>
							<td class="span2"> {{$v->activity}} </td>
							<td class="span2">PHP {{number_format($v->donated_amount,2)}} </td>
							<td class="span2"> {{$v->donation_date}} </td>
							<td class="span2"> {{$v->paypal_transaction_id}} </td>
							<td class="span2"> {{$v->remarks}} </td>
							<td class="span2"> 
								@if($v->status == 0) 
									<span class="label label-warning">Pending</span>
									
								@else
									<span class="label label-success">Received</span>
																
								@endif
							</td>
							<td class="td-actions span2">
								<a href="{{URL::action('DonationController@donationDetail', ['donate' => $v->id])}}" class="btn btn-small btn-info"><i class="btn-icon-only icon-list-alt" data-toggle="tooltip" data-placement="top" title="Donation Details"> </i></a>
								@if(!Auth::user()->isDonor())
									@if($v->status == 0)
										<a href="{{URL::action('DonationController@received', ['donate' => $v->id])}}" class="btn btn-small btn-success"><i class="btn-icon-only  icon-check" data-toggle="tooltip" data-placement="top" title="Donation Recieved"> </i></a>
									@else
										<a href="{{URL::action('DonationController@received', ['donate' => $v->id])}}" class="btn btn-small btn-danger"><i class="btn-icon-only  icon-undo " data-toggle="tooltip" data-placement="top" title="Undo"> </i></a>
									@endif
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>


		{{$donation->links()}}
	</div>
</div>
@stop

