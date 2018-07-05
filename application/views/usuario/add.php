  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Agregar Usuario</strong></h3></label>
             <hr>
        <form  role="form" action="<?php echo $this->config->base_url();?>usuario/guardar_usuario_vehiculo" method="POST"  enctype="multipart/form-data">
     <!--  <div class="form-group">
        <label>Genero</label>
       <div>
        <input type="radio" name="radio_genero" value="1" checked="true">&nbsp; Masculino
        <input type="radio" name="radio_genero" value="2">&nbsp; Femenino
       </div>
      </div> -->
      <div class="form-group">
      <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control" name="txt_fecha_nac" value="<?= set_value("txt_fecha_nac")?>" placeholder="Ingrese Fecha de Nacimiento">
      </div>
      <input type="hidden" name="id_pais" value="114">
       <!-- <div class="form-group">
        <label>Pais</label>
         <select class="selectpicker form-control" name="id_pais" id="id_pais" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Pais</option>
           <?php if ($pais): ?>
             <?php foreach ($pais as $key): ?>
                <option data-tokens="<?= $key->id.", ".$key->pais?>" value="<?= $key->id?>"><?= $key->pais?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
        </select>
      </div> -->
      <div class="form-group">
      <label>Ciudad</label>
        <select class="form-control" name="id_ciudad" id="id_ciudad" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Ciudad</option>
           <?php if ($ciudad): ?>
             <?php foreach ($ciudad as $key): ?>
                <option data-tokens="<?= $key->id.", ".$key->descripcion?>" value="<?= $key->id?>"><?= $key->descripcion?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
        </select>
      </div>
      <div class="form-group">
        <label>Cedula</label>
      <input type="text" class="form-control" name="txt_cedula" value="<?= set_value("txt_cedula")?>" placeholder="Ingrese Cedula">
      </div>
      <div class="form-group">
        <label>Nombres y Apellidos</label>
         <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?= set_value("txt_nombre")?>" placeholder="Ingrese Nombre" required>
      </div>
     
       <div class="form-group">
        <label>Direccion</label>
         <textarea name="txt_direccion" class="form-control" placeholder="Ingrese Direccion"><?= set_value("txt_direccion")?></textarea>
      </div>
      <div class="form-group">
        <label>Telefono</label>
       <input type="text" class="form-control" name="txt_telf" value="<?= set_value("txt_telf")?>" placeholder="Ingrese Telefono">
      </div>
      <div class="form-group">
        <label>login</label>
       <input type="email" class="form-control" name="txt_login" value="<?= set_value("txt_login")?>" placeholder="Ingrese Login (email)">
      </div>
      <div class="form-group">
        <label>Clave</label>
         <input type="password" name="txt_clave_1" id="txt_clave_1" class="form-control" value="<?= set_value("txt_clave_1")?>" placeholder="Ingrese Clave" required>
      </div>
      <div class="form-group">
        <label>Repita su Clave</label>
         <input type="password" name="txt_clave_2" id="txt_clave_2" class="form-control" value="<?= set_value("txt_clave_2")?>" placeholder="Repita su Clave" required>
      </div>
      </div>
      <hr>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              <a href="<?=$this->config->base_url()?>usuario/grilla_conductor" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>