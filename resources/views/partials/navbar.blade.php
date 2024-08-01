<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-light">
      <div class="navbar-header">
          <a class="navbar-brand" href="{{ route('admin.index') }}">
              <b>
                  <img height="50px" src="{{ asset('img/logo76.png') }}" alt="homepage" class="dark-logo" />
              </b>
              <span>
                  <img height="30px" src="{{ asset('img/SARANA2.png') }}" alt="homepage" class="dark-logo" />
              </span>
          </a>
      </div>
      <ul class="navbar-nav me-auto">
          <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark"
                  href="javascript:void(0)"><i class="fa-solid fa-bars-staggered"></i></a> </li>
          </li>
      </ul>
      <ul class="navbar-nav my-lg-0">
          <li class="nav-item">
              <a class="nav-link profile-pic" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="{{Auth::user()->foto_profile}}" alt="user" class="" /> 
                  <span class="hidden-md-down">{{Auth::user()->name}} &nbsp;</span> 
              </a>
          </li>
      </ul>
  </nav>
</header>
