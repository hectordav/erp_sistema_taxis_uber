<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?=$this->config->base_url()?>principal" class="site_title"><span>Te transportamos</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?= $this->config->base_url();?>/assets/img/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido</span>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br/>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i>Servicio<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>historial_servicio/grilla">Historial de Servicio</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>