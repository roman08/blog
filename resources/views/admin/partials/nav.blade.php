<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="{{ setActiveRoute('admin.index') }}">
      <a href="{{ route('admin.index') }}">
          <i class="fa fa-dashboard"></i> 
          <span>Incio</span>
      </a>
  </li>

  <li class="treeview {{ setActiveRoute('index.posts') }}">
    <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu ">
      <li class=" {{ setActiveRoute('index.posts') }} ">
          <a href="{{ route('index.posts') }}">
              <i class="fa fa-eye"> </i>Ver todos los blogs
          </a>
      </li>
      
      @if(request()->is('admin/posts*'))
        <li {{ request()->is('admin/posts/create') ? 'class = active' : '' }}><a href="{{ route('index.posts','#create') }}" ><i class="fa fa-pencil"> </i>Crear blog</a></li>
      @else
        <li {{ request()->is('admin/posts/create') ? 'class = active' : '' }}><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil"> </i>Crear blog</a></li>
      @endif
    </ul>
  </li>

    <li class="treeview {{ setActiveRoute(['admin.users.index','admin.users.create']) }}">
    <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu ">
      <li class=" {{ setActiveRoute('admin.users.index') }} ">
          <a href="{{ route('admin.users.index') }}">
              <i class="fa fa-eye"> </i>Ver todos los usuarios
          </a>
      </li>

      <li class=" {{ setActiveRoute('admin.users.create') }} ">
          <a href="{{ route('admin.users.create') }}" >
            <i class="fa fa-pencil"> </i>Crear un usuario
          </a>
      </li>
    </ul>
  </li>
</ul>