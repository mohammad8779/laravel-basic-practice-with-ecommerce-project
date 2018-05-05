
<!DOCTYPE HTML>
<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('public/frontend/css/slider.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('public/frontend/css/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="{{asset('public/frontend/css/global.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="{{asset('public/frontend/js/jquery-1.7.2.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('public/frontend/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/easing.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/frontend/js/startstop-slider.js')}}"></script>
    <script src="{{asset('public/frontend/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/jquery.accordion.js')}}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    
	$(document).ready(function() {
		$("#posts").accordion({ 
			header: "div.tab", 
			alwaysOpen: false,
			autoheight: false
		});
	});
</script>
<script src="{{asset('public/frontend/js/slides.min.jquery.js')}}"></script>
<script>
		$(function(){
			$('#products').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 350,
				fadeSpeed: 500,
				generateNextPrev: true,
				generatePagination: false
			});
		});
	</script>
</head>
<body>
    <div class="wrap">
        
           <!--- header top start--->
           @include('frontend.layouts.header')
           <!--- header top end--->
           @yield('cat-slider')
        
           @yield('content')
    </div>
  <!--- footer start--->
      @include('frontend.layouts.footer')
  <!--- footer end--->    



