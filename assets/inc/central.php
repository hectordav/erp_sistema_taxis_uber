      <!-- page content -->
      <div class="right_col" role="main">

        <!-- top tiles -->
        <div class="row tile_count">
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-user"></i>&nbsp;Total Conductores</span>
              <div class="count" align="center"><?=$conductor?></div>
            <a href="<?=$this->config->base_url()?>usuario/grilla_conductor" title=""><span class="count_bottom"><i class="green"></i>Ir a Conductores</span></a>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-users"></i>&nbsp;Clientes Registrados</span>
              <div class="count" align="center"><?=$cliente?></div>
              <a href="<?=$this->config->base_url()?>usuario/grilla_cliente" title=""><span class="count_bottom"><i class="green"><i class="fa fa-sort-left"></i></i>Ir a Clientes</span></a>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-map-marker"></i>&nbsp;Total Sevicios</span>
              <div class="count green" align="center"><?=$servicio?></div>
              <a href="<?=$this->config->base_url()?>historial_servicio/grilla" title=""><span class="count_bottom"><i class="green"><i class="fa fa-sort-lef"></i></i>Ir a Servicios</span></a>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i class="fa fa-car"></i>&nbsp;Total Vehiculos</span>
              <div class="count" align="center"><?=$vehiculo?></div>
              <a href="<?=$this->config->base_url()?>vehiculo/grilla" title=""><span class="count_bottom"><i class="green"><i class="fa fa-sort-left"></i></i>Ir a Vehiculos</span></a>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top">&nbsp;Notificacion conductor</span>
              <div class="count" align="center"><i class="fa fa-bell"></i></div>
             <a href="<?=$this->config->base_url()?>push_conductor/notificacion_conductor" title=""> <span class="count_bottom"><i class="green"><i class="fa fa-sort-left"></i></i>ir a Notificaciones</span></a>
            </div>
          </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
            <div class="left"></div>
            <div class="right">
              <span class="count_top"><i></i>Notificacion Cliente</span>
                <div class="count" align="center"><i class="fa fa-bell-o"></i></div>

             <a href="<?=$this->config->base_url()?>push_cliente/notificacion_cliente" title=""> <span class="count_bottom"><i class="green"><i class="fa fa-sort-left"></i></i>Ir a Notificaciones</span></a>
            </div>
          </div>

        </div>
        <!-- /top tiles -->
<!-- la ubicacion de los conductores -->
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile">

              <div class="row x_title">
                
                <div class="col-md-12" align="center">
<h3>Ultima Ubicacion de Conductores</h3>

             
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12" align="center">
               <?php if ($ubicacion==''): ?>
 <img src="https://maps.googleapis.com/maps/api/staticmap?center=4.65239,-74.0522022&scale=1&zoom=15&size=800x600&key=AIzaSyAkk307RSWm1Uzb0Oarsc3fqsTbe3u6-f4" width="800" height="600" >
<?php else:?>
  <img src=" https://maps.googleapis.com/maps/api/staticmap?size=1000x800&scale=1&zoom=15&markers=
icon:https://goo.gl/5XdjjN
<?php if ($ubicacion): ?>
  <?php foreach ($ubicacion as $key): ?>
    <? $lat_lng = explode(",",$key->lat_lng);
    $lat=$lat_lng[0];/*latitud*/
    $lng=$lat_lng[1];/*longitud*/
    ?>
    %7C<?=$lat;?>
    <?=$lng;?>
  <?php endforeach ?>
<?php endif ?>
&key=AIzaSyAkk307RSWm1Uzb0Oarsc3fqsTbe3u6-f4
"  width="800" height="800">
<?php endif ?>
              </div>

              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />
<!-- / -->

<!-- grafico1 -->
<div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel tile">
                <div id="grafico" style="width:100%; height:400px;">
              </div>
              <div class="clearfix"></div>
            </div>
          </div>

<!-- ******** -->
        <!-- footer content -->
        <!-- /footer content -->
      </div>