@extends('layout.layout')

@section('content')
<div class="container">
 <a href="{{ URL::action('ProgramController@programAddIndex') }}" class="btn btn-primary">Add Program</a>
	<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="widget-header">
		<i class="icon-calendar"></i>
		<h3>Program List</h3>
	</div> 
	
	<div class="widget-content">

			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th> ID </th>
						<th> Name </th>
						<th class="td-actions">Action</th>
					</tr>
				</thead>
				<tbody>

					@foreach($program as $key => $v)
						<tr>
							<td class="span2"> {{$v->id}} </td>
							<td class="span8"> {{$v->name}} </td>
							<td class="td-actions span2">
								<a href="{{URL::action('ProgramController@getProgramDetail', ['program' => $v->id])}}" class="btn btn-small btn-info"><i class="btn-icon-only icon-list-alt" data-toggle="tooltip" data-placement="top" title="Program Details"> </i></a>
								@if(Auth::user()->isADmin())
								<a href="{{ URL::action('ProgramController@programAddIndex', ['id' => $v->id ]) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit" data-toggle="tooltip" data-placement="top" title="Edit"> </i></a>
								<a href="{{ URL::action('ProgramController@delete', ['id' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		{{$program->links()}}
	</div>
	 <!-- Modal -->
	{{Form::open(array('action' => 'ProgramController@saveProgram'))}}
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel">Add Program</h3>
	  </div>
	  <div class="modal-body">
				<div class="control-group form-group">											
					<label class="control-label" for="username">Program Name</label>
					<div class="controls">
						<input type="text" class="form-control" style=" width: 98%;" name="name" value="" required>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button type="submit" class="btn btn-primary">Save</button>
	  </div>
	</div>
	{{Form::close()}}
</div>
@stop

