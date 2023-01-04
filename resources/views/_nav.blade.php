<nav class="sidebar sidebar-offcanvas" id="sidebar">

  
    <ul class="nav">

      <li class="nav-item">
        <a class="nav-link" href="{{route('carteleras.index')}}">
          <i class="fa fa-home menu-icon"></i>
          <span class="menu-title">Cartelera</span>
        </a>
      </li>
      @can('users.index')   
      <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
          <i class="fas fa-users fa-fw menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
      </li>
      @endcan
      @can('users.index')  
      <li class="nav-item">
        <a class="nav-link" href="{{route('roles.index')}}">
          <i class="fas fa-users-cog menu-icon"></i>
          <span class="menu-title">Roles</span>
        </a>
      </li>
      @endcan
      @can('clientes.index')   
      <li class="nav-item">
        <a class="nav-link" href="{{route('clientes.index')}}">
          <i class="fas fa-folder-open menu-icon"></i>
          <span class="menu-title">Clientes</span>
        </a>
      </li>
      @endcan
      @can('peliculas.index')   
      <li class="nav-item">
        <a class="nav-link" href="{{route('peliculas.index')}}">
          <i class="fas fa-file menu-icon"></i>
          <span class="menu-title">Peliculas</span>
        </a>
      </li>
      @endcan
      @can('categorias.index')   
      <li class="nav-item">
        <a class="nav-link" href="{{route('categorias.index')}}">
          <i class="fas fa-briefcase menu-icon"></i>
          <span class="menu-title">Categorias</span>
        </a>
      </li>
      @endcan
      @can('horarios.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('horarios.index')}}">
          <i class="fas fa-file menu-icon"></i>
          <span class="menu-title">Horarios</span>
        </a>
      </li>
      @endcan
      @can('ventas.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('ventas.index')}}">
          <i class="fas fa-shopping-cart menu-icon"></i>
          <span class="menu-title">Ventas</span>
        </a>
      </li>
      @endcan
      @can('bitacoras.index')
      <li class="nav-item">
        <a class="nav-link" href="{{route('bitacoras.index')}}">
          <i class="far fa-file-alt menu-icon"></i>
          <span class="menu-title">Bitacora</span>
        </a>
      </li>
      @endcan
    </ul>

  </nav>
  