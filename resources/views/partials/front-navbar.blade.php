<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        @if (auth()->user()->role == 'super admin')
            <img src="{{ asset('img/super_adminDefault.svg') }}" alt="">
        {{-- admin --}}
        @elseif (auth()->user()->role == 'admin')
          @if (auth()->user()->petugas->jenis_kelamin == 'laki laki')
            @if (empty(auth()->user()->petugas->path_foto))
                <img src="{{ asset('img/maleDefault.svg') }}" alt="profile">
            @else
                <img src="{{ auth()->user()->petugas->path_foto }}" alt="profile" style="object-fit: cover;"/>
            @endif
          @else
            @if (empty(auth()->user()->petugas->path_foto))
                <img src="{{ asset('img/femaleDefault.svg') }}" alt="profile">
            @else
                <img src="{{ auth()->user()->petugas->path_foto }}" alt="profile" style="object-fit: cover;"/>
            @endif
          @endif
        {{-- petugas --}}
        @elseif(auth()->user()->role == 'petugas')
          @if (auth()->user()->petugas->jenis_kelamin == 'laki laki')
            @if (empty(auth()->user()->petugas->path_foto))
                <img src="{{ asset('img/maleDefault.svg') }}" alt="profile">
            @else
                <img src="{{ auth()->user()->petugas->path_foto }}" alt="profile" style="object-fit: cover;"/>
            @endif
          @else
            @if (empty(auth()->user()->petugas->path_foto))
                <img src="{{ asset('img/femaleDefault.svg') }}" alt="profile">
            @else
                <img src="{{ auth()->user()->petugas->path_foto }}" alt="profile" style="object-fit: cover;"/>
            @endif
          @endif
        {{-- masyarakat --}}
        @elseif(auth()->user()->role == 'masyarakat')
          @if (auth()->user()->masyarakat->jenis_kelamin == 'laki laki')
            @if (empty(auth()->user()->path_foto))
                <img src="{{ asset('img/maleDefault.svg') }}" alt="profile">
            @else
                <img src="{{ auth()->user()->path_foto }}" alt="profile" style="object-fit: cover;"/>
            @endif
          @else
            @if (empty(auth()->user()->masyarakat->path_foto))
                <img src="{{ asset('img/femaleDefault.svg') }}" alt="profile">
            @else
                <img src="{{ auth()->user()->masyarakat->path_foto }}" alt="profile" style="object-fit: cover;"/>
            @endif
          @endif
        @endif
        {{-- <a class="nav-link dropdown-toggle" href="#" id="profileDropdown">
          <img src="{{ asset('img/profilDefaultt.png') }}" alt="profile"/>
        </a> --}}
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <form action="{{ route('logout') }}" class="dropdown-item" method="POST">
            @csrf
            <button style="border: none; background-color: transparent">
              <i class="ti-power-off text-primary"></i>
              Logout</button>
          </form>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex" data-toggle="dropdown">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>