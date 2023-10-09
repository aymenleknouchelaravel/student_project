<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="../dashboard/images/faces/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ auth()->user()->name }} {{ auth()->user()->surname }}</span>
                    <span class="text-secondary text-small">{{ auth()->user()->role }}</span>
                </div>
            </a>
        </li>
        @if (auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="/admin/home">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-title">Users</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-account-group menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/admin/adduser">New User</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/admin/users">All Users</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                    aria-controls="ui-basic">
                    <span class="menu-title">Projects</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic2">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="/admin/addproject">New Project</a>
                        </li>
                        <li class="nav-item"> <a class="nav-link" href="/admin/projects">All
                                Projects</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/message">
                    <span class="menu-title">Send Message</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="/admin/home">
                    <span class="menu-title">My Projects</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/client/message">
                    <span class="menu-title">Send Message</span>
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                </a>
            </li>
        @endif
        
    </ul>
</nav>
