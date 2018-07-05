
  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
			<div class="animated fadeIn" align="center">
         <label><h3><strong>Conductor encontrado</strong></h3></label>
         <hr>
         <?php if ($servicio): ?>
          <?php foreach ($servicio as $key): ?>
             
          <div class="col-md-12 col-sm-12 col-xs-12">
            <img width="200" height="200" src="<?= $this->config->base_url();?>/assets/img/<?=$key->adjunto?>" alt="..." align=center>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
            <hr>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label><h3><strong>Nombre:</strong>&nbsp;<?=$key->nombre?></h3></label>
              
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label><h3><strong>Tipo:</strong>&nbsp;<?=$key->descripcion_tipo?></h3></label>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-3">
              <label><h3><strong>Marca:</strong>&nbsp;<?=$key->descripcion_marca?></h3></label>
            </div>
              <div class="col-md-3 col-sm-3 col-xs-3">
              <label><h3><strong>Modelo:</strong>&nbsp;<?=$key->descripcion_modelo?></h3></label>
            </div>
          </div>
      </div>
          <?php endforeach ?> 
         <?php endif ?>

      <hr>
      <div class="form-group" align="center">
  <form  role="form" action="<?php echo $this->config->base_url();?>servicio/cancelar_servicio" method="POST"  enctype="multipart/form-data">
  <hr>
      <?php if ($servicio): ?>
       <!--  <input type="hidden" name="id_servicio" value="<?=$id_servicio?>"> -->
      <?php endif ?>
        <label>En instantes el conductor se comunicara con usted, si desea ver el recorrido, descargue la aplicacion para su movil Te Transportamos</label>
        <div>
        <hr>
        <a href="<?=$this->config->base_url()?>principal" class="btn btn-success btn-lg" title="">Continuar</a>
        </div>

      </div>
      </div>
  </form>
  <input type="txt" id="demo" name="">
    
  </div>
      </div>