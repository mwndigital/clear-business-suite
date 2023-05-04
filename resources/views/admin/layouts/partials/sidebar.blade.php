<div class="sidebar show">
    <ul class="">
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
                <li><a href="">Add New Client</a></li>
            </ul>
        </li>
    </ul>
</div>
