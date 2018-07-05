  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
				<div class="animated fadeIn" align="left">
           <label><h3><strong>Ver Usuario Cliente</strong></h3></label>
           <hr>
      <form  role="form" action="<?php echo $this->config->base_url();?>usuario/guardar_usuario_vehiculo" method="POST"  enctype="multipart/form-data">
    <div class="form-group">
      <label>Genero</label>
     <div>
      <?php if ($usuario): ?>
        <?php foreach ($usuario as $key): ?>
          <?php if ($key->id_genero==1): ?>
           <input type="text" class="form-control" name="" value="Masculino"  readonly="true">
          <?php else: ?>
           <input type="text" class="" name="" value="Femenino"  readonly="true">
          <?php endif ?>
       
     </div>
    </div>
    <div class="form-group">
    <label>Fecha de Nacimiento</label>
    <?$fecha=date('d-m-y',strtotime($key->fecha_nac))?>
      <input type="text" class="form-control" name="txt_fecha_nac" value="<?=$fecha?>"  readonly="true">
    </div>
    <div class="form-group">
      <label>Cedula</label>
    <input type="text" class="form-control" name="txt_cedula" value="<?= $key->cedula_cliente?>" readonly="true">
    </div>
    <div class="form-group">
      <label>Nombre</label>
       <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?= $key->nombre?>"  readonly="true" required>
    </div>
     <div class="form-group">
      <label>Direccion</label>
       <textarea name="txt_direccion" class="form-control" readonly="true"><?= $key->direccion?></textarea>
    </div>
    <div class="form-group">
      <label>Telefono</label>
     <input type="text" class="form-control" name="txt_telf" value="<?= $key->telf?>"  readonly="true" >
    </div>
      <div class="form-group">
        <label>login/email</label>
       <input type="email" class="form-control" name="txt_login" value="<?= $key->login?>" readonly="true" >
      </div>    
    </div>

     <?php endforeach ?>
      <?php endif ?>  
           <hr>
            <div class="form-group" align="center">
              
              <a href="<?=$this->config->base_url()?>usuario/grilla_conductor" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>