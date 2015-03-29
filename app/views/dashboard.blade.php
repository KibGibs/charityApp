@extends('layout.layout')

@section('content')
<div class="container">
    <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Recent Post</h3>
            </div>
           <div class="widget-content">
              <ul class="news-items">
              @foreach($post as $key => $v)
                <li class="span12" style="margin-left:0 !important; ">
                  <?php $date_parse = date_parse($v->created_at); ?>
                  <div class="news-item-date"> <span class="news-item-day"><?php echo $date_parse['day'] ?></span> 
                  <span class="news-item-month">
                  	<?php 
                  	$month = array(
                  		'1' => 'Jan',
                  		'2' => 'Feb',
                  		'3' => 'Mar',
                  		'4' => 'Apr',
                  		'5' => 'May',
                  		'6' => 'Jun',
                  		'7' => 'Jul',
                  		'8' => 'Aug',
                  		'9' => 'Sep',
                  		'10' => 'Oct',
                  		'11' => 'Nov' ,
                  		'12' => 'Dec'

                  		);
                  	echo $month[$date_parse['month']];

                  	 ?>
                  </span> 
                  </div>
                  <div class="news-item-detail"> <a href class="news-item-title">{{$v->posting_title}}</a>
                    <p class="news-item-preview"> {{str_limit($v->post, $limit = 150, $end = '...')}}</p>
                  </div>
                  
                </li>
               @endforeach
              </ul>
            </div>

            {{$post->links()}}
</div>
@stop

