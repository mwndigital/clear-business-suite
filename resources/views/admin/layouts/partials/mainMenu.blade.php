<div class="navbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-12">
                <a href="" class="navbar-brand">
                    <x-application-logo/>
                </a>
            </div>
            <div class="col-md-9 d-flex justify-content-end">
                <ul class="list-inline additionalMenu">

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
                    <li class="list-inline-item">
                        <button type="button" class="sidebar-toggler">
                            <i class="fas fa-bars"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


