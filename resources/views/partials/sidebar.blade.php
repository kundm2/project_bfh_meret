
<div class="main-sidebar">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="{{ URL::to('/') }}">Meret</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm">
			<a href="{{ URL::to('/') }}">Me</a>
		</div>
		<ul class="sidebar-menu">
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li><a class="nav-link" href="{{ URL::to('/') }}"><i class="fas fa-tachometer-alt"></i><span>{{ __('Dashboard') }}</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/institutes') }}"><i class="fas fa-university"></i><span>{{ __('Institutions') }}</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/services') }}"><i class="fas fa-concierge-bell"></i><span>{{ __('Services') }}</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/events') }}"><i class="fas fa-calendar-alt"></i><span>{{ __('Événements') }}</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-clipboard-check"></i><span>{{ __('Zarit') }}</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ URL::to('/zarit') }}">{{ __('Vue d\'ensemble') }}</a></li>
                    <li><a href="{{ URL::to('/zarit/new') }}">{{ __('Ajouter') }}</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ URL::to('/profile') }}"><i class="fas fa-user"></i><span>{{ __('Profil') }}</span></a></li>
            <li><a class="nav-link" href="{{ URL::to('/settings') }}"><i class="fas fa-cog"></i><span>{{ __('Réglages') }}</span></a></li>
        </ul>
	</aside>
</div>
