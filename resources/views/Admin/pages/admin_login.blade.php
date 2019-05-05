<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name','Nepathya college') }}</title>

<link href="{{ asset('css/backend_css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/backend_css/datepicker3.css') }}"   rel="stylesheet">
<link href="{{ asset('css/backend_css/styles.css') }}"        rel="stylesheet">

</head>

<body>
	
	<div class="container">
		<a href="/homes">
			<div class="btn btn-default">
				Go Back		
			</div>
		</a>	
	</div>
	

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">							

				@if(Session::has('flash_msg_err'))
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>{{ Session('flash_msg_err') }}</strong>								
					</div>					
				@endif

				@if(Session::has('flash_msg_success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">x</button>
						<strong>{{ Session('flash_msg_success') }}</strong>								
					</div>					
				@endif

				<div class="panel-heading">Admin log in</div>
					<div class="panel-body">
						<form role="form" method="post" action = "{{ url('admin') }}">  {{ csrf_field() }}
							<fieldset>							
								<div class="form-group">
									<input class="form-control" placeholder="email" name="email" type="email" autofocus="">						
								</div>
								<div class="form-group">
									<input class="form-control"  placeholder="Password" name="password" type="password" value="">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>							
								<input type = "submit" value = "login" class="btn btn-primary">
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->	
	
		

	<script src="{{ asset('js/backend_js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/backend_js/chart.min.js') }}"></script>
	<script src="{{ asset('js/backend_js/chart-data.js') }}"></script>
	<script src="{{ asset('js/backend_js/easypiechart.js') }}"></script>
	<script src="{{ asset('js/backend_js/easypiechart-data.js') }}"></script>
	<script src="{{ asset('js/backend_js/bootstrap-datepicker.js') }}"></script>
	<script>
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