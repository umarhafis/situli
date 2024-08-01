<aside class="left-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="fa fa-tachometer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('portofolios.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-briefcase"></i>
                        <span class="hide-menu">Portofolio</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('dikerjakan.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-helmet-safety"></i>
                        <span class="hide-menu">Dikerjakan</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('dokumentasi.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-image"></i>
                        <span class="hide-menu">Dokumentasi</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('admin.management') }}" aria-expanded="false">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="hide-menu">Kelola Admin</span>
                    </a>
                </li>
                <li class="nav-title">Web Setting</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('kontaks.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-address-book"></i>
                        <span class="hide-menu">Kontak</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('slider.index') }}" aria-expanded="false">
                        <i class="fa-solid fa-sliders"></i>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li class="nav-title">Akun Setting</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('profile') }}" aria-expanded="false">
                        <i class="fa fa-user-circle-o"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('password') }}" aria-expanded="false">
                        <i class="fa-solid fa-key"></i>
                        <span class="hide-menu">Ganti Password</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect waves-dark">
                        <i class="fa fa-sign-out"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation-->
</aside>
