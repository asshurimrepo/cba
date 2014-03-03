@section('js')
	
	<script type="text/javascript">

		setInterval(udpateTime, 1000);

		function udpateTime(){
			$(".curr_time").load("{{ url('auth/time') }}");
		}    

	</script>
	
@stop

<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="{{ url() }}"><span> {{ HTML::image('CBA.png', null, ['style'=>'width:30px;']) }} {{ Setting::find(1)->short_name }}</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<li>
							<a class="btn" href="#">
								<i class="halflings-icon white time"></i> <b class="curr_time">-</b>
							</a>
						</li>
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> {{ Auth::user()->fullname() }}
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<!-- <li><a href="#"><i class="halflings-icon white user"></i> Profile</a></li> -->
								<li><a href="{{ url('account-settings') }}"><i class="halflings-icon white cog "></i>Account Settings</a></li>
								<li><a href="{{ url('auth/logout') }}"><i class="halflings-icon white off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->