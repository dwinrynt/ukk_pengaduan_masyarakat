<nav class="sidebar sidebar-offcanvas overflow-auto" id="sidebar">
    <ul class="nav">
      @if (auth()->user()->role == 'super_admin')
        @include('partials.role.super_admin') 
      @elseif (auth()->user()->role == 'admin')
        @include('partials.role.admin')      
      @elseif(auth()->user()->role == 'petugas')
        @include('partials.role.petugas')
      @elseif(auth()->user()->role == 'masyarakat')
        @include('partials.role.masyarakat')
      @endif
    </ul>
</nav>