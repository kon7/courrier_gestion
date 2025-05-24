<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="wd-30 ht-30 rounded-circle" src="{{ asset('images/system.jpg') }}" alt="profile">
                </a>
                <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                    <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                        <div class="mb-3">
                            <img class="wd-80 ht-80 rounded-circle" src="{{ asset('images/system.jpg') }}"
                                >
                        </div>
                        <div class="text-center">
                            <p class="tx-16 fw-bolder">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</p>
                            <p class="tx-12 text-muted">{{ Auth::user()->email }}</p>
                            <p class="tx-12 text-muted">
                                <small>Membre {{ Auth::user()->created_at->format('M. Y') }}</small></p>
                        </div>
                    </div>
                    <ul class="list-unstyled p-1">
                        <li class="dropdown-item py-2">
                            <a href="#" class="text-body ms-0" onclick="show_profil_modal()">
                                <i class="me-2 icon-md" data-feather="user"></i>
                                <span>Voir mon profile</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href="#" class="text-body ms-0" onclick="change_pwd_modal()">
                                <i class="me-2 icon-md" data-feather="edit"></i>
                                <span>Modifier MDP</span>
                            </a>
                        </li>
                        <li class="dropdown-item py-2">
                            <a href='{{route("logout")}}' class="text-body ms-0">
                                <i class="me-2 icon-md" data-feather="log-out"></i>
                                <span>Deconnexion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>

{{-- 
@include('ModuleAdmin.utilisateurs.change_pwd')
@include('ModuleAdmin.utilisateurs.show_profile') --}}
