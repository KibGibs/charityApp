@extends('layout.layout')
@section('content')
@if(Auth::user()->isADmin())
	@foreach($users as $key => $v)
		<li>
			{{$v->first_name}}
		</li>
	@endforeach

	123123
@endif
@stop

@section('scripts')
<script language="javascript" type="text/javascript" src="{{asset('assets/js/full-calendar/fullcalendar.min.js')}}"></script>
@stop