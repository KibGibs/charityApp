<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Charity</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
.table {
  width: 100%;
  margin-bottom: 18px;
}
.table>thead>tr>th {
  vertical-align: bottom;
  border-bottom: 2px solid #ddd;
}
table {
  display: table;
  border-collapse: separate;
  border-spacing: 2px;
  border-color: gray;
}
.table-bordered {
  border: 1px solid #dddddd;
  border-left: 0;
  border-collapse: separate;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.table>thead>tr>th {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table-striped>tbody>tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
  border: 1px solid #ddd;
}
.table-striped tbody tr:nth-child(odd) td, .table-striped tbody tr:nth-child(odd) th {
  background-color: #f9f9f9;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
  padding: 8px;
  line-height: 1.42857143;
  vertical-align: top;
  border-top: 1px solid #ddd;
}
.table-bordered th {
  background: #E9E9E9;
  background: -moz-linear-gradient(top, #FAFAFA 0%, #E9E9E9 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#FAFAFA), color-stop(100%,#E9E9E9));
  background: -webkit-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
  background: -o-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
  background: -ms-linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
  background: linear-gradient(top, #FAFAFA 0%,#E9E9E9 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9');
  -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr='#FAFAFA', endColorstr='#E9E9E9')";
  font-size: 10px;
  color: #444;
  text-transform: uppercase;
  text-align: left;
}
</style>
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
<h1 style="text-align:center;"> {{$program->name}} Program </h1>
<p style="text-align:center;">Donation Report</p>
<div class="container">
	
			<table class="table table-striped table-bordered" >
			<thead>
				<tr>
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
</body>
	
</html>