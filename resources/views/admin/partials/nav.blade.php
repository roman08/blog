<ul class="sidebar-menu" data-widget="tree">
  <li class="header">Navegación</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="active"><a href="#"><i class="fa fa-home"></i> <span>Incio</span></a></li>
  <li class="treeview">
    <a href="#"><i class="fa fa-bars"></i> <span>Blog</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{ route('index.posts') }}"><i class="fa fa-eye"> </i>Ver todos los blogs</a></li>
      <li><a href="#"><i class="fa fa-pencil"> </i>Crear blog</a></li>
    </ul>
  </li>
</ul>