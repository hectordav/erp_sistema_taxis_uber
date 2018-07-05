  <div class="right_col" role="main">
   <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
          <div class="animated fadeIn" align="left">
             <label><h3><strong>Ver Historial de Servicio</strong></h3></label>
             <hr>
    <form  role="form" action="<?php echo $this->config->base_url();?>codigo_promo/guardar_codigo_promo" method="POST"  enctype="multipart/form-data">
    <?php if ($servicio): ?>
        <?php foreach ($servicio as $key): ?>    
      <div class="form-group">
        <label>Fecha</label>
        <? $fecha=date('d-m-Y', strtotime($key->fecha))?>
       <input type="text" class="form-control" value="<?=$fecha?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Desde </label>
       <input type="text" class="form-control" value="<?=$key->desde?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Hasta</label>
       <input type="text" class="form-control" value="<?=$key->hasta?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Hora de Inicio</label>
       <input type="text" class="form-control" value="<?=$key->hora_i?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Hora Fin</label>
       <input type="text" class="form-control" value="<?=$key->hora_f?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Tiempo Transcurrido</label>
       <input type="text" class="form-control" value="<?=$key->tiempo_trans?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Monto</label>
       <input type="text" class="form-control" value="<?=$key->monto?>" readonly="true">
      </div>
      <div class="form-group">
        <label>Observaciones Cliente</label>
       <textarea name="" class="form-control" readonly="true"><?=$key->observacion_cliente?></textarea>
      </div
      <div class="form-group">
        <label>Observaciones Conductor</label>
       <textarea name="" class="form-control" readonly="true"><?=$key->observacion_conductor?></textarea>
      </div>
      <!-- ********end foreach******* -->
              <?php endforeach ?>
      <?php endif ?>
           <hr>
            <div class="form-group" align="center">
           
              <a href="<?=$this->config->base_url()?>historial_servicio/grilla_conductor" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
          </div>
        </div>
      </div>