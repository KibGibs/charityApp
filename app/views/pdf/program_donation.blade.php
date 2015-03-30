<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Charity</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">



</head>
<body>
<h1 style="text-align:center;"> {{$program->name}} Program </h1>
<p style="text-align:center;">Donation Report</p>
<div class="container">
		<div class="widget-content">
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th> </th>
					<th> ID </th>
					<th> Donor </th>
					<th> Amount </th>
					<th> Date </th>
					<th> Remarks </th>
				</tr>
			</thead>
			
				@foreach($donations as $key => $v)
						<tr>
							<td class="span2"> {{$v->id}} </td>
							<td class="span2"> {{$v->donation->donor->first_name}} {{$v->donation->donor->last_name}}</td>
							<td class="span2">PHP {{number_format($v->donation->donated_amount,2)}} </td>
							<td class="span2"> {{$v->donation->donation_date}} </td>
							<td class="span2"> {{$v->donation->remarks}} </td>
						</tr>	
				@endforeach

		</table>
	</div>
</div>
</body>
	
</html>