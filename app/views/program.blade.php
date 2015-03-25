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
	@if(Auth::user()->isADmin())
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
						</td>
					</tr>
				@endforeach
			<tr>
			</tbody>
		</table>
	@endif
	
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

