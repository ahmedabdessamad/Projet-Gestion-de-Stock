<div id="page-sidebar">
    <div class="scroll-sidebar">
        <ul id="sidebar-menu">
            <li class="header"><span>Vue D'ensemble</span></li>
            <li>
                <a href="{{route('showAdminDashboard')}}" title="Admin Dashboard">
                    <i class="glyph-icon icon-linecons-tv"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header"><span>Ressource Humaine</span></li>
            <li>
                <a href="#" title="Exploitation">
                    <i class="glyph-icon icon-users"></i>
                    <span>Gestion des utilisateurs</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="{{route('showUsers')}}" title="Visualiser l'Hebdomadaire"><span>List des utilisateurs</span></a></li>
                        <li><a href="{{route('showAddUser')}}" title="Consulter Le Planning"><span>Ajouter utilisateur</span></a></li>
                   
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
              <li>
                <a href="{{route('showDepartments')}}" title="Exploitation">
                    <i class="glyph-icon icon-building"></i>
                    <span>Gestion des departements</span>
                </a>
                <!-- .sidebar-submenu -->
            </li>

              <li>
                <a href="{{Route('listGrade')}}" target="_blank" title="Exploitation">
                    <i class="glyph-icon icon-mortar-board"></i>
                    <span>Gestion des grades</span>
                </a>

                <!-- .sidebar-submenu -->
            </li>
              <li>
                <a href="{{route('showHolidays')}}" title="Exploitation">
                    <i class="glyph-icon icon-calendar"></i>
                    <span>Gestion des jours fériés</span>
                </a>
                            </li>
       
          
         
         
            <li class="header"><span>Gestion</span></li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>Paramètres</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="#" title="Lots"><span>Lots</span></a></li>
                        <li><a href="#" title="Grille de Facturation stif"><span>Grille de Facturation stif</span></a></li>
                        <li><a href="#" title="Grille de vacation chauffeur"><span>Grille de vacation chauffeur</span></a></li>
                        <li><a href="#" title="Contrat et Avenant"><span>Contrat et Avenant</span></a></li>
                        <li><a href="#" title="Indemnités kilométriques"><span>Indemnités kilométriques</span></a></li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
        </ul>
        <!-- #sidebar-menu -->
    </div>
</div>