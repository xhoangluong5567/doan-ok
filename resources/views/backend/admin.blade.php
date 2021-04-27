<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('title')
<base href="{{asset('public')}}"/>
<link href="{{ asset('adminlte/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('adminlte/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('adminlte/css/styles.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('adminlte/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('adminlte/js/lumino.glyphs.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->
</head>
<body>

@include('backend.partials.header')
		
@include('backend.partials.sidebar')
		

@yield('content')		  

	<script src="{{ asset('adminlte/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('adminlte/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('adminlte/js/chart.min.js') }}"></script>
	<script src="{{ asset('adminlte/js/chart-data.js') }}"></script>
	<script src="{{ asset('adminlte/js/easypiechart.js') }}"></script>
	<script src="{{ asset('adminlte/js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('adminlte/js/bootstrap-datepicker.js') }}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
