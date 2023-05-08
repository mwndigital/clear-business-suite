<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a href="" class="navbar-brand">
            <x-application-logo/>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainApplicationNavbar" aria-controls="mainApplicationNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="mainApplicationNavbar">
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
                            <a href="{{ route('admin.clients.index') }}">All Clients</a>
                        </li>
                        <li><a href="{{ route('admin.clients.create') }}">Add New Client</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Transactions
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.transactions.index') }}">All Transactions</a>
                        </li>
                        <li><a href="{{ route('admin.transactions.create') }}">Add New Transaction</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="list-inline additionalMenu">
                <li class="list-inline-item"><a href=""><i class="fas fa-bell"></i></a></li>
                <li class="list-inline-item">
                    <a href="">
                        <i class="fas fa-clipboard"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('admin.settings.index') }}">
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

{{--<div class="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12">
                <a href="" class="navbar-brand">
                    <x-application-logo/>
                </a>
            </div>
            <div class="col-md-9 d-flex justify-content-end">

            </div>
        </div>
    </div>
</div>--}}


