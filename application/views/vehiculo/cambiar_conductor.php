  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
				<div class="animated fadeIn" align="left">
           <label><h3><strong>Cambiar Conductor</strong></h3></label>
           <hr>
      <form  role="form" action="<?php echo $this->config->base_url();?>vehiculo/actualizar_conductor" method="POST"  enctype="multipart/form-data">
    
    <div class="form-group">
    <?php if ($vehiculo): ?>
  <?php foreach ($vehiculo as $key): ?>
  <label>Tipo</label>
      <input type="text" class="form-control" name="" value="<?=$key->descripcion_tipo?>" readonly="true">
      </div>
      <input type="hidden" name="id_vehiculo" value="<?=$key->id_vehiculo?>">
  <div class="form-group">
    <label>Marca</label>
      <input type="text" class="form-control" name="" value="<?=$key->descripcion_marca?>" readonly="true">
  </div>
  <div class="form-group">
    <label>Modelo</label>
       <input type="text" class="form-control" name="" value="<?=$key->descripcion_modelo?>"  readonly="true">
  </div>
  <div class="form-group">
    <label># Placa</label>
       <input type="text" name="txt_placa" id="txt_placa" class="form-control" value="<?=$key->placa?>"" placeholder="Ingrese placa del Vehiculo" required  readonly="true">
  </div>
  <hr>
   <?php endforeach ?>
<?php endif ?>
</div>
</div>
 <div class="x_panel">
 <div class="col-md-12 col-sm-12 col-xs-12">
<p></p>
    <div class="form-group">
      <label><h3><strong>Conductor Asignado</strong></h3></label>
        <hr>
        </div>
  <?php if ($vehiculo): ?>
    <?php foreach ($vehiculo as $data): ?>
   <div class="form-group">
    <label>Conductor</label>
       <input type="text" name="txt_placa" id="txt_placa" class="form-control" value="<?=$key->nombre?>" placeholder="" required  readonly="true">
  </div>
  <?php endforeach ?> 
  <?php endif ?>
 
       <div class="form-group">
    <label>Nuevo Conductor</label>
        <select class="form-control" name="id_conductor" id="id_conductor" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Nuevo Conductor</option>
           <?php if ($usuario): ?>
             <?php foreach ($usuario as $key): ?>
                <option data-tokens="<?= $key->id_usuario.", ".$key->nombre?>" value="<?= $key->id_usuario?>"><?= $key->nombre?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
        </select>
  </div>
   <hr>
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