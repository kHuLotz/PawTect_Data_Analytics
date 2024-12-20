<nav class="sb-topnav navbar navbar-expand" style="background-color: #fee1ce;">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href=#!>
                 <img src="{{ asset('images/logo.png') }}" alt="Pawtect Logo" style="height: 40px; vertical-align: middle;">
            </a>    
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" data-bs-toggle="collapse" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
                <a class="navbar-brand ps-3" href="#!"> <B>BSCS - 4A GROUP 6</B> </a>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>  Members   </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Lyka Marie Gultiano</a></li>
                        <li><a class="dropdown-item" href="#!">Hanna G. Maglacion</a></li>
                        <li><a class="dropdown-item" href="#!">Kenneth Vallecera</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                >
                                        {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>