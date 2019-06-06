
	<div class="navbar-bg"></div>
	<nav class="navbar navbar-expand-lg main-navbar">
	<form class="form-inline mr-auto">
		<ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
		</ul>
	</form>
	<ul class="navbar-nav navbar-right">
		<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
		<img alt="image" src="/img/avatar/avatar-1.png" class="rounded-circle mr-1">
		<div class="d-sm-none d-lg-inline-block">{{Auth::user()->name}} </div></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a href="{{ URL::to('/profile') }}" class="dropdown-item has-icon">
			    <i class="far fa-user"></i> {{ __('Profil') }}
			</a>
			<a href="{{ URL::to('/settings') }}" class="dropdown-item has-icon">
			    <i class="fas fa-cog"></i> {{ __('Réglages') }}
			</a>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i> {{ __('Déconnecter') }}
			</a>
		</div>
		</li>
	</ul>
	</nav>
