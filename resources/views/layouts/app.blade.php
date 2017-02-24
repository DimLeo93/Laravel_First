<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
	

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tripark.com</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{URL::asset('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/font-awesome/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{URL::asset('assets/css/form-elements.css')}}">
        <link rel="stylesheet" href="{{URL::asset('assets/css/style.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->z

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" base href="{{URL::asset('assets/ico/favicon.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" base href="{{URL::asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" base href="{{URL::asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" base href="{{URL::asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" href="{{URL::asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">

    </head>


<body>
    <div id="app">
                <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">

					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
                        <a class="navbar-brand" href="{{ url('/home') }}">
                            <img src="images/logo2.png" alt="Home">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
                            <!-- NAV -->
                        @if (!Auth::guest())
							<li><a href="{{ url('add')}}"><span class="glyphicon glyphicon-register"></span>Add User</a></li>
							<li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
													<li></li>
						@else
							<li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-register"></span>Sign Up</a></li>
                        @endif
						</ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container- -->
            </nav>	
        @yield('content')
    </div>
	
	
        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p><strong>© 2017 Tripark.com All Rights Reserved</strong></p>
        			</div>
        			
        		</div>
        	</div>
        </footer>
</body>
</html>
