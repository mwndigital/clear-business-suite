<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a href="" class="navbar-brand">
            <x-application-logo/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li>
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Clients
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="">All Clients</a>
                        </li>
                        <li><a href="">Add New Client</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="list-inline additionalMenu ms-auto">
                <li class="list-inline-item"><a href=""><i class="fas fa-bell"></i></a></li>
                <li class="list-inline-item">
                    <a href="">
                        <i class="fas fa-clipboard"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="">
                        <i class="fas fa-wrench"></i>
                    </a>
                </li>
                <li class="list-inline-item dropdown">
                    <a href="" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="">

                            </a>
                        </li>

                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <x-header-logout-form/>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
