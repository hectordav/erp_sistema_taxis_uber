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

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
               <!--  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                   
                  </ul>
                </li> -->
                 <li><a><i class="fa fa-user"></i>Clientes<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>usuario/grilla_cliente">Clientes</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i>Empresa-Conductores<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>empresa/grilla">Empresa</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>usuario/grilla_conductor">Conductores</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>vehiculo/grilla">Vehiculos Registrados</a>
                    </li>
                  </ul>
                  
                </li>
                <li><a><i class="fa fa-car"></i>Datos de Vehiculos<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                   <li><a href="<?= $this->config->base_url();?>tipo/grilla">Tipo</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>marca/grilla">Marca</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>modelo/grilla">Modelo</a>
                    </li>
                </ul>
                </li>
                  <li><a><i class="fa fa-map-marker"></i>Servicio<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>servicio/nuevo_servicio">Solicitar Nuevo Servicio</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>historial_servicio/grilla">Historial de Servicio</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-edit"></i>Notificaciones<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>push_cliente/notificacion_cliente">Clientes</a>
                    </li>
                     <li><a href="<?= $this->config->base_url();?>push_conductor/notificacion_conductor">Conductores</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Configuracion de Precios</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-table"></i>Tarifas<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>tarifa/grilla">Tarifas</a>
                    </li>
                    <li><a href="<?= $this->config->base_url();?>sobre_cargo/grilla">Sobre Cargo</a>
                    </li>
                  </ul>
                </li>
                  <li><a><i class="fa fa-tags"></i>Tipo Codigo Promocion<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>tipo_codigo/grilla">Tipo de Codigos de promocion</a>
                    </li>
                  </ul>
                </li>
              
                <li><a><i class="fa fa-tasks"></i>Codigos Promocion<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= $this->config->base_url();?>codigo_promo/grilla">Codigo Promocion</a>
                    </li>
                  </ul>
                </li>
               
              </ul>
            </div>
          
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>