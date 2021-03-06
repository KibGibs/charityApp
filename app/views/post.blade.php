@extends('layout.layout')

@section('content')
<div class="container">
 <a href="{{ URL::action('PostingController@postAddIndex') }}" class="btn btn-primary">Add Post</a>
<br /><br />
	@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="widget-header">
		<i class="icon-paste"></i>
		<h3>Post List</h3>
	</div> <!-- /widget-header -->

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> Post Title </th>
					<th> Post </th>
					<th> Status </th>
					<th> Author </th>
					<th class="td-actions">Action</th>
				</tr>
			</thead>
			<tbody>

				@foreach($post as $key => $v)
				<tr>
					<td class="span2"> {{$v->posting_title}} </td>
					<td class="span6"> {{str_limit($v->post, $limit = 150, $end = '...')}} </td>
					@if($v->status == 1)
					<td class="span2"> Published </td>
					@elseif($v->status == 2)
					<td class="span4"> Draft </td>
					@endif
					<td class="span3"> {{$v->author->first_name}} {{$v->author->last_name}}</td>
					<td class="td-actions span2">
					<a href="{{ URL::action('PostingController@postAddIndex', ['id' => $v->id ]) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit" data-toggle="tooltip" data-placement="top" title="Edit"> </i></a>

					<a href="{{ URL::action('PostingController@delete', ['id' => $v->id ]) }}" class="btn btn-danger btn-small" data-toggle="tooltip" data-placement="top" title="Delete"><i class="btn-icon-only icon-remove"> </i></a>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		{{$post->links()}}
	</div>
</div>
@stop

