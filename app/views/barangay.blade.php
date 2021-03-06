@extends('layout.layout')

@section('content')
<div class="container">
	@if(Auth::user()->isADmin())
		<a href="{{ URL::action('BarangayController@getIndexAdd') }}" role="button" class="btn btn-primary">Add Barangay</a>
	@endif
	<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="widget-header">
		<i class="icon-globe"></i>
		<h3>Barangay List</h3>
	</div> 
	
	<div class="widget-content">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th> ID </th>
						<th> Name </th>
						@if(Auth::user()->isAdmin())
						<th class="td-actions">Action</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($barangay as $key => $v)
						<tr>
							<td class="span2"> {{$v->id}} </td>
							<td class="span8"> {{$v->name}} </td>
							@if(Auth::user()->isAdmin())
							<td class="td-actions span2">
								<a href="{{ URL::action('BarangayController@getIndexAdd', ['id' => $v->id ]) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit" data-toggle="tooltip" data-placement="top" title="Edit"> </i></a>
								<a href="{{ URL::action('BarangayController@delete', ['id' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
							</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>

		{{$barangay->links()}}
	</div>
</div>
@stop

