  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
				<div class="animated fadeIn" align="left">
           <label><h3><strong>Editar Usuario</strong></h3></label>
           <hr>
      <form  role="form" action="<?php echo $this->config->base_url();?>usuario/actualizar_usuario_vehiculo" method="POST"  enctype="multipart/form-data">
      <?php if ($usuario): ?>
        <?php foreach ($usuario as $key): ?>
  <!--   <div class="form-group">
      <label>Genero</label>
     <div>
      <
          <?php if ($key->id_genero==1): ?>
           <input type="text" class="form-control" name="" value="Masculino"  ">
          <?php else: ?>
           <input type="text" class="form-control" name="" value="Femenino"  ">
          <?php endif ?>
       
     </div>
    </div> -->
    <div class="form-group">
    <input type="hidden" name="txt_id_usuario" value="<?=$key->id_usuario?>">
    <label>Fecha de Nacimiento</label>
    <?$fecha=date('d-m-y',strtotime($key->fecha_nac))?>
      <input type="date" class="form-control" name="txt_fecha_nac" value="<?=$fecha?>"  ">
    </div>
    <div class="form-group">
      <label>Cedula</label>
    <input type="text" class="form-control" name="txt_cedula" value="<?= $key->cedula_cliente?>" ">
    </div>
    <div class="form-group">
      <label>Nombre</label>
       <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?= $key->nombre?>"  " required>
    </div>
     <div class="form-group">
      <label>Direccion</label>
       <textarea name="txt_direccion" class="form-control" "><?= $key->direccion?></textarea>
    </div>
    <div class="form-group">
      <label>Telefono</label>
     <input type="text" class="form-control" name="txt_telf" value="<?= $key->telf?>"  " >
    </div>
    <div class="form-group">
      <label>login/email</label>
     <input type="email" class="form-control" name="txt_login" value="<?= $key->login?>" " >
    </div>
    
    </div>
    <hr>
     <?php endforeach ?>
      <?php endif ?>
     
            <div class="form-group" align="center">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i>&nbsp;Actualizar</button>
              <a href="<?=$this->config->base_url()?>usuario/grilla_conductor" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>