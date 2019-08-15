<div id="page-header" class="bg-purple font-inverse">
     <div id="mobile-navigation">
        <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"></button>
        <a href="#" class="logo-content-small"></a>
    </div>
    <div id="header-logo" class="logo-bg">
        <a href="#" title="Accueil">
          <img src="{{ asset('templates/logo.png') }}" class="logoeast">
        </a>
        <a href="#" class="logo-content-small" title="Accueil">
          <img src="{{ asset('templates/logo-min.png') }}" class="minlogoeast" alt="EAST">
        </a>
        <a id="close-sidebar" href="#" title="Close sidebar">
            <i class="glyph-icon icon-angle-left"></i>
        </a>
    </div>
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="Mon Compte" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="{{asset('storages/images/users/'.Auth::user()->image)}}" alt="Profile image">
                <span>{{ Auth::user()->getFullNameAttribute() }}</span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <img src="{{asset('storages/images/users/'.Auth::user()->image)}}" alt="Photo De profil">
                        </div>
                        <div class="user-info">
                            <span>{{ Auth::user()->getFullNameAttribute() }}
                                <i> {{ Auth::user()->roles()->first()->title }}</i>
                            </span>
                            <a href="{{Route('showResponsibleEditProfile')}}" title="Modifier profile">Modifier Profil</a>
                        </div>
                    </div>                
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="{{ route('handleLogout') }}" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>Déconnexion
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #header-nav-left -->
    <div id="header-nav-right">
        <a href="#" class="hdr-btn" id="fullscreen-btn" title="Plein écran">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>
        <a class="header-btn" id="logout-btn" href="{{ route('handleLogout') }}" title="Déconnexion">
            <i class="glyph-icon icon-power-off"></i>
        </a>
    </div>
    <!-- #header-nav-right -->
</div>