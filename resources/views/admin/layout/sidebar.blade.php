{{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html"
        style="background-color:#fff; box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)">
        <div class="sidebar-brand-icon">
            <img src="" height="72px" style="margin-top: 2px">
        </div>
    </a>


    <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'users' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Users</span></a>
    </li>
   

    <hr class="sidebar-divider">

    <hr class="sidebar-divider d-none d-md-block">

</ul> --}}


<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="img/redcrosslogo.png" alt="" height="50px">
        </div>
        <div class="sidebar-brand-text mx-3">REDCROSS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pages
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html"><span>-</span> Login</a>
                <a class="collapse-item" href="register.html"><span>-</span> Register</a>
                <a class="collapse-item" href="forgot-password.html"><span>-</span> Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html"><span>-</span> 404 Page</a>
                <a class="collapse-item" href="blank.html"><span>-</span> Blank Page</a>
            </div>
        </div>
    </li> -->

    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li> -->

    <!-- Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="school-data.html">
            <i class="fas fa-fw fa-table"></i>
            <span>School Data</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="payment-detail.html">
            <i class="far fa-info-circle"></i>
            <span>Payment Details</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="email-template.html">
            <i class="fas fa-envelope-open"></i>
            <span>Email Templates</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-user-plus"></i>
            <span>User Creation</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.master-price.index') }}">
            <i class="fas fa-usd-circle"></i>
            <span>Master Price</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.financial-year.index') }}">
            <i class="fas fa-usd-circle"></i>
            <span>Financial year</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div> -->

</ul>
<!-- End of Sidebar -->
