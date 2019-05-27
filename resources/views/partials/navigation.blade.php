
	<div class="navbar-bg"></div>
	<nav class="navbar navbar-expand-lg main-navbar">
	<form class="form-inline mr-auto">
		<ul class="navbar-nav mr-3">
		<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
		<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
		</ul>
		<div class="search-element">
		<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
		<button class="btn" type="submit"><i class="fas fa-search"></i></button>
		<div class="search-backdrop"></div>
		<div class="search-result">
		</div>
		</div>
	</form>
	<ul class="navbar-nav navbar-right">
		<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
		<img alt="image" src="/img/avatar/avatar-1.png" class="rounded-circle mr-1">
		<div class="d-sm-none d-lg-inline-block">Hi, {{Auth::user()->name}}</div></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a href="{{ URL::to('/profile') }}" class="dropdown-item has-icon">
			    <i class="far fa-user"></i> {{ __('Profile') }}
			</a>
			<a href="{{ URL::to('/settings') }}" class="dropdown-item has-icon">
			    <i class="fas fa-cog"></i> {{ __('Settings') }}
			</a>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
			</a>
		</div>
		</li>
	</ul>
	</nav>