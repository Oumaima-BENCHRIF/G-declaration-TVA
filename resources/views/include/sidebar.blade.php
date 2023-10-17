<nav id="sidebar">
    <ul class="navbar-item theme-brand flex-row  text-center">
        <li class="nav-item theme-logo">
            <!-- <a href="{{ url('/') }}">
                <img src="{{ url('assets/img/logo.png') }}" class="navbar-logo" alt="logo">
            </a> -->
        </li>
        <li class="nav-item theme-text">
            <a href="{{ url('/') }}" class="nav-link"> G-declaration TVA </a>
        </li>
    </ul>
    <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu">
             <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
        <a data-active="{{ is_active_route(['dashboard']) }}" href="{{ url('/dashboard') }}" class="dropdown-toggle justify-content-end">
       
            <div class="">
            
                    <span>Dashboards</span> <i class="las la-home"></i> 
                </div>
                
            </a>
            <ul class="submenu list-unstyled collapse {{ show_class(['dashboard/*']) }}" id="dashboard" data-parent="#accordionExample">
                <li class=" {{ active_class(['dashboard']) }}">
                </li>
            </ul>
        </li>
        <li class="menu">
            <a href="#app"  data-active="{{ is_active_route(['apps/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['apps/*']) }}" class="dropdown-toggle justify-content-end">
            <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            <div class="">
                   
                    <span>Fichier</span> <i class="lab la-medapps"></i>
                </div>
               
            </a>
            <ul class="collapse submenu list-unstyled {{ show_class(['apps/*']) }}" id="app" data-parent="#accordionExample">
                <li class=" {{ active_class(['apps/Agence']) }}">
                    <a data-active="{{ is_active_route(['apps/Agence']) }}" href="{{ url('/apps/Agence') }}"> Société </a>
                </li>
                <li class=" {{ active_class(['apps/fournisseur']) }}">
                    <a data-active="{{ is_active_route(['apps/fournisseur']) }}" href="{{ url('/apps/fournisseur') }}"> fournisseur </a>
                </li>
                <li class=" {{ active_class(['apps/racine']) }}">
                    <a data-active="{{ is_active_route(['apps/racine']) }}" href="{{ url('/apps/racine') }}"> Racine </a>
                </li>
                <li class=" {{ active_class(['apps/Type_payment']) }}">
                    <a data-active="{{ is_active_route(['apps/Type_payment']) }}" href="{{ url('/apps/Type_payment') }}"> Type payment </a>
                </li>

                <li class=" {{ active_class(['apps/Type_payment']) }}">
                    <a data-active="{{ is_active_route(['apps/Type_payment']) }}" href="{{ url('/apps/Type_payment') }}">Champte charges</a>
                </li>

            </ul>
        </li>
        <li class="menu">
        <a data-active="{{ is_active_route(['apps/Achat']) }}" href="{{ url('/apps/Achat') }}" class="dropdown-toggle justify-content-end">
    
            <div class="">
           
                    <span>Achats</span>  <i class="las la-home"></i>
                </div>
                
            </a>
            <ul class="submenu list-unstyled collapse {{ show_class(['Achat/*']) }}" id="Achat" data-parent="#accordionExample">
                <li class=" {{ active_class(['apps/Achat']) }}">
                </li>
            </ul>
        </li>
 

        <li class="menu">
        <a data-active="{{ is_active_route(['apps/utilisateur']) }}" href="{{ url('/apps/utilisateur') }}" class="dropdown-toggle justify-content-end">
            <div class="">
                    <span>Utilisateur</span>  <i class="las la-copy"></i>
                </div>
            </a>
            <ul class="submenu list-unstyled collapse {{ show_class(['utilisateur/*']) }}" id="utilisateur" data-parent="#accordionExample">
                <li class=" {{ active_class(['apps/utilisateur']) }}">
                </li>
            </ul>
        </li>
        
            
        <li class="menu">
            <a href="#maps" data-active="{{ is_active_route(['maps/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['maps/*']) }}" class="dropdown-toggle justify-content-end">
            <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
            <div class="">
                  
                    <span> Vente</span>  <i class="las la-globe-americas"></i>
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
            <a href="#charts" data-active="{{ is_active_route(['charts/*']) }}" data-toggle="collapse" aria-expanded="{{ is_active_route(['charts/*']) }}" class="dropdown-toggle justify-content-end">
            <div>
                    <i class="las la-angle-right sidemenu-right-icon"></i>
                </div>
                <div class="">
                   
                    <span>Edition</span> <i class="las la-chart-pie"></i>
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
            <a href="http://neptuneweb.xyz" aria-expanded="false" class="dropdown-toggle justify-content-end">
                <div class="">
                  
                    <span> Importation GC</span>   <i class="las la-file-code"></i>
                </div>
            </a>
        </li>
    </ul>
</nav>
