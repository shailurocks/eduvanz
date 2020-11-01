<!DOCTYPE html>
	<html lang="en">
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		  <meta name="description" content="">
		  <meta name="author" content="">
		  <title>Participant CMS</title>

	      <link rel="stylesheet" href="{{ url('/') }}/css/glyphicons-bootstrap.css">
		  <!-- Bootstrap core CSS-->
		  <link href="{{ url('/') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		  <!-- Custom fonts for this template-->		  
		  <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
		  		  
		</head>
		<style type="text/css">
			.form-group{margin:10px;}
		</style>
		<body class="" id="page-top">
	  <!-- Navigation-->
	  
	  <div class="content-wrapper">
	    <div class="container-fluid">

	     @yield('content')
	    <!-- /.container-fluid-->
	    <!-- /.content-wrapper-->
	    
	   
	    <!-- Logout Modal-->
	    
	   
	  	</div>
	  </div>	
		<!-- Bootstrap core JavaScript-->
	    <script src="{{ url('/') }}/vendor/jquery/jquery.min.js"></script>
	    <script src="{{ url('/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	    <!-- Core plugin JavaScript-->
	  	<script type="text/javascript">
	    	DOMAIN_URL = "{{ url('/')}}";
	  	</script>
		<script src="{{ url('/') }}/js/jquery_ui.js"></script>
		
		
	</body>
	@yield('custom_js')
<html>