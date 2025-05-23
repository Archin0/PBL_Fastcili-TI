<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="navbar-wrapper">
        <div class="navbar-toggle">
            <button type="button" class="navbar-toggler sidebar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <a class="navbar-brand" href="#">{{ __('Sistem Manajemen Pelaporan & Perbaikan Fasilitas') }}</a>
        
        <!-- Search Form (Visible on Large Screens) -->
        <form class="navbar-search-form d-none d-lg-flex">
            <div class="input-group no-border">
                <input type="text" id="nav-search-input" class="form-control" placeholder="Cari menu...">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <i class="nc-icon nc-zoom-split"></i>
                    </div>
                </div>
            </div>
            <div class="search-results d-none"></div>
        </form>
        
        <!-- Right Group (Always on the Far Right) -->
        <div class="navbar-right-group">
            <!-- Kebab Toggler (Visible on Medium/Small Screens) -->
            <button class="navbar-toggler kebab-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbar-content">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            
            <!-- Navbar Content (Collapsible) -->
            <div class="collapse navbar-collapse" id="navbar-content">
                <!-- Search Form (Hidden on Large Screens) -->
                <form class="navbar-search-form d-lg-none">
                    <div class="input-group no-border">
                        <input type="text" class="form-control" placeholder="Cari menu...">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="nc-icon nc-zoom-split"></i>
                            </div>
                        </div>
                    </div>
                    <div class="search-results d-none"></div>
                </form>
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn-magnify" href="#pablo">
                            <i class="nc-icon nc-layout-11"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Stats') }}</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Some Actions') }}</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                            <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                            <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                        </div>
                    </li>
                    <li class="nav-item btn-rotate dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="nc-icon nc-settings-gear-65"></i>
                            <p>
                                <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                            </p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                            <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
