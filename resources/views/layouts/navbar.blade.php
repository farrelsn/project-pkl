<nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top" id="mainNav">
    <div class="container-fluid">
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="offcanvas"
        data-bs-target="#sidebar"
        aria-controls="offcanvasExample"
      >
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      {{-- <img class="mx-3" width="30px" src="{{asset('assets/images/logoKDS.png')}}" alt="Logo KDS"> --}}
      <a id="nav-title" class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">Sistem Inventaris KDS</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#topNavBar"
        aria-controls="topNavBar"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        <div class="d-flex ms-auto my-3 my-lg-0">
          
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle ms-2"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
            
            @if (Auth::user()->level == 'admin')
              <img style="border-radius: 50%" width="30px" height="30px" src="{{ $admin->foto == null ? asset('assets/images/default.jpg') : asset('storage/foto_profil/'. $admin->foto) }}" alt="user">

            @elseif (Auth::user()->level == 'user')
              <img style="border-radius: 50%" width="30px" height="30px" src="{{ $user->foto == null ? asset('assets/images/default.jpg') :  asset('storage/foto_profil/'. $user->foto) }}" alt="user">
            @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <div class="container text-center">
                <div class="mb-2">
                  
                  @if (Auth::user()->level == 'admin')
                    <img style="border-radius: 50%" width="60px" height="60px" src="{{ $admin->foto == null ? asset('assets/images/default.jpg') : asset('storage/foto_profil/'. $admin->foto) }}" alt="user">

                  @elseif (Auth::user()->level == 'user')
                    <img style="border-radius: 50%" width="60px" height="60px" src="{{ $user->foto == null ? asset('assets/images/default.jpg') :  asset('storage/foto_profil/'. $user->foto) }}" alt="user">
                  @endif
                </div>
                <h6 class="my-0">{{ Auth::user()->username }}</h6>
                <p>{{ Auth::user()->level }}</p>
              </div>
              <li class="mb-2"><hr class="dropdown-divider bg-light" /></li>
              <li>
                <a class="dropdown-item bg-danger-soft-hover" href="{{ route('edit_profil') }}"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Profil</a>
              </li>
              <li>
                <a href="{{ route('ganti_password') }}" class="dropdown-item bg-danger-soft-hover"><i class="fa-solid fa-key me-2"></i>Ganti Password</a>
              </li>
              <li>
                <form method="POST" action="/logout">
                  @csrf
                  <button class="dropdown-item bg-danger-soft-hover"><i class="fa-solid fa-power-off me-2"></i>Log Out</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
        </div>
        
      </div>
    </div>
</nav>