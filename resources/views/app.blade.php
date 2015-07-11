<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>::GoodLuck 1000::</title>
		<link href="/images/favicon.png" type="image/png" rel="icon">
		<link type="text/css" rel="stylesheet" href="/css/jquery-ui.min.css">
		<link type="text/css" rel="stylesheet" href="/css/style.css">
		<link type="text/css" rel="stylesheet" href="/css/custom.css">
		<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:400,700">
		<link media="screen" type="text/css" href="/css/nivo-slider.css" rel="stylesheet">
		<script src="/js/jquery-1.4.3.min.js" type="text/javascript"></script>
		<script src="/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script src="/js/moment.min.js" type="text/javascript"></script>
		<script src="/js/jquery-ui.min.js" type="text/javascript"></script>

		<script type="text/javascript">
			$(function() {
				
				$('#slider').nivoSlider();

			})
		</script>

	</head>
	<body>
	<!--wrapper -->
	<div id="wrapper">
		<!--topsection -->
		@if( !empty($is_admin) )
			@include('topsection_admin')
		@else
			@include('topsection')
		@endif
		<!--topsection -->

		<!-- page content -->
		@yield('content')
		<!-- page content -->

		<!--footer_section -->
		<div class="footer_section">
			<!--footer top section -->    
			<div class="footersection-top">
				<div class="footertop_inner">
					<div class="footer_section_bottom">
						<div class="foot-txt">
							<p>Purchase of lottery using this website is strictly prohibited in the states where lotteries are banned. You must be above 18 years to play Online Lottery.</p>
						</div>
						<div class="clr"></div>
					</div><img class="karoshape" alt="" src="/images/karo.png">
				</div>    
			</div>
			<!--footer top section -->
		</div>
		<!--footer_section -->

	</div>
	<!--wrapper -->

</body>
</html>