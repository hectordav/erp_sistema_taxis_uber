      <!-- page content -->
      <div class="right_col" role="main">

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
 <img src="https://maps.googleapis.com/maps/api/staticmap?center=4.65239,-74.0522022&zoom=10&size=960x400&key=AIzaSyAkk307RSWm1Uzb0Oarsc3fqsTbe3u6-f4">
<?php else:?>
  <img src=" https://maps.googleapis.com/maps/api/staticmap?size=960x400&markers=
icon:https://goo.gl/5XdjjN
<?php if ($ubicacion): ?>
  <?php foreach ($ubicacion as $key): ?>
    <? $lat_lng = explode(",",$key->lat_lng);
    $lat=$lat_lng[0];/*latitud*/
    $lng=$lat_lng[1];/*longitud*/
    ?>
    %7C<?=$lat?>
    <?=$lng?>
  <?php endforeach ?>
<?php endif ?>
&key=AIzaSyAkk307RSWm1Uzb0Oarsc3fqsTbe3u6-f4
" align="center">
<?php endif ?>
              </div>

              <div class="clearfix"></div>
            </div>
          </div>

        </div>
        <br />
<!-- / -->
      </div>