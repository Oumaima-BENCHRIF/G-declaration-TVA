<nav id="sidebar">
    <ul class="navbar-item theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <a href="{{ url('/') }}">
                <img src="{{ url('assets/img/logo.png') }}" class="navbar-logo" alt="logo">
            </a>
        </li>
        <li class="nav-item theme-text">
            <a href="{{ url('/') }}" class="nav-link"> Neptune </a>
        </li>
    </ul>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu">
        <a data-active="{{ is_active_route(['dashboard/dashboard1']) }}" href="{{ url('/dashboard/dashboard1') }}" class="dropdown-toggle">
    
            <div class="">
                    
                    <span>{{__('Dashboards')}}</span> <i class="las la-home"></i>
                </div>
                
            </a>
            <ul class="submenu list-unstyled collapse {{ show_class(['dashboard/*']) }}" id="dashboard" data-parent="#accordionExample">
                <li class=" {{ active_class(['dashboard/dashboard1']) }}">
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#app"  data-active="{{ is_active_route(['apps/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="lab la-medapps"></i>
                    <span>Fichier</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['apps/*']) }}" id="app" data-parent="#accordionExample">
                <li class=" {{ active_class(['apps/agence']) }}">
                    <a data-active="{{ is_active_route(['apps/agence']) }}" href="{{ url('/apps/agence') }}"> Agence </a>
                </li>
                <li class=" {{ active_class(['apps/fournisseur']) }}">
                    <a data-active="{{ is_active_route(['apps/fournisseur']) }}" href="{{ url('/apps/fournisseur') }}"> fournisseur </a>
                </li>
                <li class=" {{ active_class(['apps/contacts']) }}">
                    <a data-active="{{ is_active_route(['apps/contacts']) }}" href="{{ url('/apps/contacts') }}"> Racine </a>
                </li>
                <li class=" {{ active_class(['apps/file-manager']) }}">
                    <a data-active="{{ is_active_route(['apps/file-manager']) }}" href="{{ url('/apps/file-manager') }}"> Client </a>
                </li>
              
            </ul>
        </li>
        <li class="menu">
            <a href="#pages" data-active="{{ is_active_route(['pages/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['pages/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-file"></i>
                    <span> Achats</span>
                </div>
            </a>
        </li>
 

    
            
        <li class="menu">
            <a href="#maps" data-active="{{ is_active_route(['maps/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['maps/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-globe-americas"></i>
                    <span> Vente</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['maps/*']) }}" id="maps" data-parent="#accordionExample">
                <li class=" {{ active_class(['maps/leaflet-map']) }}">
                    <a data-active="{{ is_active_route(['maps/leaflet-map']) }}" href="{{ url('/maps/leaflet-map') }}"> Facturation </a>
                </li>
                <li class=" {{ active_class(['maps/vector-map']) }}">
                    <a data-active="{{ is_active_route(['maps/vector-map']) }}" href="{{ url('/maps/vector-map') }}"> Réglement </a>
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#charts" data-active="{{ is_active_route(['charts/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['charts/*']) }}" class="dropdown-toggle">
                <div class="">
                    <i class="las la-chart-pie"></i>
                    <span>Edition</span>
                </div>
                <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['charts/*']) }}" id="charts" data-parent="#accordionExample">
                <li class=" {{ active_class(['charts/apex-chart']) }}">
                    <a data-active="{{ is_active_route(['charts/apex-chart']) }}" href="{{ url('/charts/apex-chart') }}">Edition état TVA </a>
                </li>
                <li class=" {{ active_class(['charts/chartlist-chart']) }}">
                    <a data-active="{{ is_active_route(['charts/chartlist-chart']) }}" href="{{ url('/charts/chartlist-chart') }}"> Tableau encaissements </a>
                </li>
                <li class=" {{ active_class(['charts/chartjs']) }}">
                    <a data-active="{{ is_active_route(['charts/chartjs']) }}" href="{{ url('/charts/chartjs') }}"> Recaptulatif TVA </a>
                </li>
            </ul>
        </li>
       
       
        <li class="menu-title"> {{__('Others')}}</li>
        <li class="menu">
            <a href="http://neptuneweb.xyz" aria-expanded="false" class="dropdown-toggle">
                <div class="">
                    <i class="las la-file-code"></i>
                    <span> Importation GC</span>
                </div>
            </a>
        </li>
    </ul>
</nav>
