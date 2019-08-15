<div id="page-sidebar" class="bg-purple font-inverse">
    <div class="scroll-sidebar">
        <ul id="sidebar-menu">
            <li class="header"><span>Vue D'ensemble</span></li>
            <li>
                <a href="{{route('showResponsibleDashboard')}}" title="responsible Dashboard">
                    <i class="glyph-icon icon-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header"><span>RH</span></li>
            <li>
                <a href="#" title="Exploitation">
                    <i class="glyph-icon icon-users"></i>
                    <span>Employees</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showEmployee')}}" title="listes des employées">
                                <span>listes des employées</span>
                            </a>
                            <a href="{{Route('showAddEmployee')}}" title="Créer un employée">
                                <span>Créer un employée</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li>
                <a href="#" title="Exploitation">
                    <i class="glyph-icon icon-magic"></i>
                    <span>grades</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('listGrade')}}" title="listes des grades">
                                <span>listes des grades</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li>
                <a href="#" title="Exploitation">
                    <i class="glyph-icon icon-cubes"></i>
                    <span>{{__('Departements')}}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showDepartments')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('listes des Departements')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li>
                <a href="#" title="Exploitation">
                    <i class="glyph-icon icon-flag-checkered"></i>
                    <span>{{__('demande des congeés')}}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showLeaveRequest')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('listes des demandes')}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{Route('showaddGroupLeave')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('congée du groupe')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li class="header"><span>commerce</span></li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>{{__('categorie')}}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showCategorie')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('listes des categorie')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>{{__('clients')}}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showCustomer')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('listes des clients')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>{{__('fournisseur')}}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showProviders')}}" title="{{__('listes des fournisseurs')}}">
                                <span>{{__('listes des fournisseurs')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>{{__('Stock')}}</span>

                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showEquipements')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('stock')}}</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>{{__('Gestionnaire des mission')}}</span>

                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                            <a href="{{Route('showMission')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('mission')}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{Route('showAddMission')}}" title="{{__('listes des Departements')}}">
                                <span>{{__('creer une mission')}}</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>

            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>{{__('Gestion des équipementns')}}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li>
                         <a href="{{Route('showAddequipements')}}" title="{{__('listes des Departements')}}">
                            <span>{{__('Ajouter un équipement')}}</span>
                         </a>                       
                        </li>
                    </ul>
                </div>


            <li class="header"><span>Gestion</span></li>
            <li>
                <a href="#" title="Paramètres">
                    <i class="glyph-icon icon-linecons-cog"></i>
                    <span>Paramètres</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a href="#" title="Lots"><span>parametres</span></a></li>
                    </ul>
                </div>
                <!-- .sidebar-submenu -->
            </li>
        </ul>
        <!-- #sidebar-menu -->
    </div>
</div>