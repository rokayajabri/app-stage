
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{set_active(['home'])}} submenu">
                    <a href="#" class="{{ set_active(['home']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['home'])}}" href="{{ route('home') }}">Admin Dashboard</a></li>
                    </ul>
                </li>


                <li class="{{set_active(['clients','produits','receptions','reparations'])}} submenu">
                    <a href="#" class="{{ set_active(['clients','produits','receptions','reparations']) ? 'noti-dot' : '' }}">
                        <i class="la la-dashboard"></i>
                        <span> Service de Reparation</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="{{ request()->is('/*') ? 'display: block;' : 'display: none;' }}">
                        <li><a class="{{set_active(['clients'])}}" href="{{ route('clients') }}">clients</a></li>
                        <li><a class="{{set_active(['produits'])}}" href="{{ route('produits') }}">Produits</a></li>
                        <li><a class="{{set_active(['receptions'])}}" href="{{ route('receptions') }}">Receptions</a></li>
                        <li><a class="{{set_active(['reparations'])}}" href="{{ route('reparations') }}">Reparation</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
<style>
    .sidebar{
        background-color: rgb(133, 55, 68);
    }
</style>
