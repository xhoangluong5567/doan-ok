<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{asset('/admin')}}">ISTORE SHOP</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{Auth::user()->email}} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{asset('logout')}}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
            
		</div><!-- /.container-fluid -->
</nav>
