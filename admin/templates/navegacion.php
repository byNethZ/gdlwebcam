  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="info">
          <p><?php echo $_SESSION['nombre'] ?></p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de Administración</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Eventos</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list-ul"></i>Ver Todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i>Agregar Evento</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Categoria Eventos</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list-ul"></i>Ver Todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i>Agregar Categoría</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Invitados</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list-ul"></i>Ver Todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i>Agregar Invitados</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i>
            <span>Registrados</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list-ul"></i>Ver Todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i>Agregar Registrados</a></li>
          </ul>
        </li>

        <?php
        if ($_SESSION['nivel'] == 1) : ?>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-user-circle"></i>
              <span>Administradores</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="lista-admin.php"><i class="fa fa-list-ul"></i>Ver Todos</a></li>
              <li><a href="crear-admin.php"><i class="fa fa-plus-circle"></i>Agregar Administrador</a></li>
            </ul>
          </li>

        <?php endif ?>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-comments"></i>
            <span>Testimoniales</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-list-ul"></i>Ver Todos</a></li>
            <li><a href="#"><i class="fa fa-plus-circle"></i>Agregar Testimoniales</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>