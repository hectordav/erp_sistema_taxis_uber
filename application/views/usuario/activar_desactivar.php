  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
      
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Activar/Desactivar Usuario</strong></h3></label>
             <hr>
        <form  role="form" action="<?php echo $this->config->base_url();?>usuario/activar_desactivar_usuario" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
              <label>Nivel</label>
              <?php if ($usuario): ?>
                <?php foreach ($usuario as $key): ?>
                <input type="hidden" name="txt_id_usuario" value="<?=$key->id_usuario?>">
              <input type="text" class="form-control" name="" value="<?=$key->descripcion_nivel?>" placeholder="" readonly="true">
            </div>
             <div class="form-group">
              <label>Nombre</label>
               <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?=$key->nombre?>" placeholder="Ingrese Nombre" required readonly="true">
            </div>
            <div class="form-group">
              <label>login</label>
              <input type="email" class="form-control" name="txt_login" value="<?=$key->login?>" placeholder="Ingrese Login (email)" readonly="true">
            </div>
            <div class="form-group">
              <label>Status</label>
               <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?=$key->descripcion_estado_usuario?>" placeholder="Ingrese Nombre" required readonly="true">
            </div>
           
                <?php endforeach ?>
              <?php endif ?>
             <div class="form-group">
              <label>Nuevo Estado</label>
               <select class="form-control" name="id_estado" id="id_estado" data-show-subtext="true" data-live-search="true"  required="required">
                    <option value="">Seleccione Estado</option>
                     <?php
                     if ($estado) {
                     foreach ($estado as $i) {
                             echo '<option value="'. $i->id .'">'.$i->descripcion.'</option>';
                            }
                     }else{
                     }
                        ?>
              </select>
            </div>
            <hr>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              <a href="<?=$this->config->base_url()?>usuario/grilla_cliente" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>