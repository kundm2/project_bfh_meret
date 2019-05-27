
<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="index.html">Stisla</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="index.html">St</a>
		</div>
		<ul class="sidebar-menu">
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li><a class="nav-link" href="{{ URL::to('/') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/institutes') }}"><i class="fas fa-university"></i><span>Institutes</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/services') }}"><i class="fas fa-concierge-bell"></i><span>Services</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/events') }}"><i class="fas fa-calendar-alt"></i><span>Events</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-check"></i><span>Zarit</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('/zarit/new') }}">Add new</a></li>
                    <li><a href="{{ URL::to('/zarit') }}">Overview</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ URL::to('/profile') }}"><i class="fas fa-user"></i><span>Profil</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
	</aside>
</div>
