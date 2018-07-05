  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Agregar Vehiculo</strong></h3></label>
             <hr>
        <form  role="form" action="<?php echo $this->config->base_url();?>vehiculo/guardar_vehiculo" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label><h3> <strong>Datos del Vehiculo</strong></h3></label>
      <hr>
      </div>
      <div class="form-group">
        <label>Tipo</label>
        <select class="form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Tipo</option>
           <?php if ($tipo): ?>
             <?php foreach ($tipo as $key): ?>
                <option data-tokens="<?= $key->id.", ".$key->descripcion?>" value="<?= $key->id?>"><?= $key->descripcion?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
        </select>
            </div>
        <div class="form-group">
          <label>Marca</label>
            <select class="form-control" name="id_marca" id="id_marca" data-show-subtext="true" data-live-search="true"  required="required">
              <option data-tokens="" value="">Seleccione Marca</option> 
          </select>
        </div>
        <div class="form-group">
          <label>Modelo</label>
            <select class="form-control" name="id_modelo" id="id_modelo" data-show-subtext="true" data-live-search="true"  required="required">
              <option data-tokens="" value="">Seleccione Modelo</option> 
          </select>
        </div>
        <div class="form-group">
          <label># Placa</label>
             <input type="text" name="txt_placa" id="txt_placa" class="form-control" value="<?= set_value("txt_placa")?>" placeholder="Ingrese placa del Vehiculo" required>
        </div>
        <div class="form-group">
          <label>Año</label>
             <input type="number" name="txt_ano" id="txt_ano" class="form-control" value="<?= set_value("txt_ano")?>" placeholder="Ingrese Año del Vehiculo" required>
        </div>
        <div class="form-group">
          <label># Licencia</label>
             <input type="text" name="txt_licencia" id="txt_licencia" class="form-control" value="<?= set_value("txt_licencia")?>" placeholder="Ingrese Numero de Licencia" required>
        </div>
        <div class="form-group">
            <label>Vencimiento de la Licencia</label>
              <input type="date" class="form-control" name="txt_licencia_vence" value="<?= set_value("txt_licencia_vence")?>" placeholder="Ingrese Fecha de Vencimiento de la Licencia">
        </div>
        <div class="form-group">
          <label>Empresa</label>
            <select class="form-control" name="id_empresa" id="id_empresa" data-show-subtext="true" data-live-search="true"  required="required">
              <option data-tokens="" value="">Seleccione Empresa</option>
           <?php if ($empresa): ?>
             <?php foreach ($empresa as $key): ?>
                <option data-tokens="<?= $key->id.", ".$key->nombre?>" value="<?= $key->id?>"><?= $key->nombre?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
          </select>
        </div>
         <div class="form-group">
          <label>Numero Interno del Vehiculo</label>
            <input type="text" name="txt_num_interno_vehiculo" id="txt_num_interno_vehiculo" class="form-control" value="<?= set_value("txt_num_interno_vehiculo")?>" placeholder="Ingrese Numero Interno del Vehiculo" required>
        </div>
        <div class="form-group">
          <label>Numero Tarjeta de Operacion</label>
            <input type="text" name="txt_num_tarjeta_operacion" id="txt_num_tarjeta_operacion" class="form-control" value="<?= set_value("txt_num_tarjeta_operacion")?>" placeholder="Ingrese Numero de tarjeta de operacion" required>
        </div>
         <div class="form-group">
          <label>Numero Interno de Contrato</label>
            <input type="text" name="txt_num_interno_contrato" id="txt_num_interno_contrato" class="form-control" value="<?= set_value("txt_num_interno_contrato")?>" placeholder="Ingrese Numero Interno del contrato" required>
          </div>
         <div class="form-group">
          <label>Convenio</label>
            <input type="text" name="txt_convenio" id="txt_convenio" class="form-control" value="<?= set_value("txt_convenio")?>" placeholder="Ingrese Convenio" required>
          </div>
        <hr>
        </div>
        </div>
       <div class="x_panel">
        <div class="form-group">
          <label><h3><strong>Imagenes del Vehiculo</strong></h3></label>
        <hr>
        </div>
         <div class="form-group">
            <label>Adjunto 1</label>
             <input type="file" name="mi_archivo_1"> 
          </div>
          <div class="form-group">
            <label>Adjunto 2</label>
             <input type="file" name="mi_archivo_2"> 
          </div>
          <div class="form-group">
            <label>Adjunto 3</label>
             <input type="file" name="mi_archivo_3"> 
          </div>
          <div class="form-group">
            <label>Adjunto 4</label>
             <input type="file" name="mi_archivo_4"> 
          </div>
           <hr>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              <a href="<?=$this->config->base_url()?>vehiculo/grilla" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>