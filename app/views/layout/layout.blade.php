<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Charity</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/pages/dashboard.css')}}" rel="stylesheet">



<link href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
   input[type="date"], input[type="number"],  input[type="text"], input[type="password"], input[type="email"]{ height : 30px; }
    </style>

</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a>
                    <a class="brand" href="{{URL::action('HomeController@home')}}">Charity</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Settings <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{URL::action('HomeController@logout')}}">Logout</a></li>
            </ul>
          </li>
        </ul>
        <!--<form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>-->
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="@if(Request::is('/')){{'active'}}@endif">
          <a href="{{URL::action('HomeController@home')}}">
            <i class="icon-dashboard"></i><span>Dashboard</span> 
          </a> 
        </li>
        @if(Auth::user()->isADmin())
        <li class="@if(Request::is('users*')){{'active'}}@endif">
          <a href="{{URL::action('HomeController@users')}}">
            <i class="icon-user"></i><span>Users</span> 
          </a> 
        </li>
        @endif

		 <li class="@if(Request::is('program*')){{'active'}}@endif">
          <a href="{{URL::action('ProgramController@getIndex')}}">
            <i class="icon-calendar"></i><span>Program</span> 
          </a> 
        </li>

		 <li class="@if(Request::is('barangay*')){{'active'}}@endif">
          <a href="{{URL::action('BarangayController@getIndex')}}">
            <i class="icon-globe"></i><span>Barangay</span> 
          </a> 
        </li> 
		<li class="@if(Request::is('activity*')){{'active'}}@endif">
          <a href="{{URL::action('ActivityController@getIndex')}}">
            <i class="icon-tasks"></i><span>Activity</span> 
          </a> 
        </li>
		<li class="@if(Request::is('post*')){{'active'}}@endif">
          <a href="{{URL::action('PostingController@getIndex')}}">
            <i class="icon-paste"></i><span>Post</span> 
          </a> 
        </li>
		<li class="@if(Request::is('donation*')){{'active'}}@endif">
          <a href="{{URL::action('DonationController@getIndex')}}">
            <i class="icon-money"></i><span>Donation</span> 
          </a> 
        </li>
<!--         <li><a href="reports.html"><i class="icon-list-alt"></i><span>Reports</span> </a> </li>
        <li><a href="guidely.html"><i class="icon-facetime-video"></i><span>App Tour</span> </a></li>
        <li><a href="charts.html"><i class="icon-bar-chart"></i><span>Charts</span> </a> </li>
        <li><a href="shortcodes.html"><i class="icon-code"></i><span>Shortcodes</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Drops</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="icons.html">Icons</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <li><a href="pricing.html">Pricing Plans</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="error.html">404</a></li>
          </ul>
        </li> -->
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  @yield('content')
</div>
<!-- /main -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2015 Charity. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{asset('assets/js/jquery-1.7.2.min.js')}}"></script> 
<script src="{{asset('assets/js/excanvas.min.js')}}"></script> 
<script src="{{asset('assets/js/chart.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/angular.min.js')}}"></script>
<script src="{{asset('assets/js/module/app.js')}}"></script>
<script src="{{asset('assets/js/ui-bootstrap-tpls-0.12.0.min.js')}}"></script>


@yield('scripts')

<script src="{{asset('assets/js/base.js')}}"></script> 
<script type="text/javascript">
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip();
	})
</script> 
</body>
</html>
