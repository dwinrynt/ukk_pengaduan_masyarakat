<li class="nav-item">
  <a class="nav-link" href="/dashboard">
    <i class="icon-grid menu-icon"></i>
    <span class="menu-title">Dashboard</span>
  </a>
</li>
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <i class="icon-layout menu-icon"></i>
    <span class="menu-title">Kelola</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu" style="list-style: none !important;">
      <li class="nav-item"> <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a></li>
      <li class="nav-item"> <a class="nav-link" href="{{ route('pengawas.index') }}">Pengawas</a></li>
    </ul>
  </div>
</li>