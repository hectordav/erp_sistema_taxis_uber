  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Crear Codigo Promocion</strong></h3></label>
             <hr>
    <form  role="form" action="<?php echo $this->config->base_url();?>codigo_promo/guardar_codigo_promo" method="POST"  enctype="multipart/form-data">
      <div class="form-group">
        <label>Tipo Codigo</label>
        <select class="form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Tipo de codigo</option>
           <?php if ($tipo_codigo): ?>
             <?php foreach ($tipo_codigo as $key): ?>
                <option data-tokens="<?= $key->id.", ".$key->descripcion?>" value="<?= $key->id?>"><?= $key->descripcion?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
        </select>
      </div>
      <div class="form-group">
      <label>Codigo Generado</label>
        <input type="text" class="form-control" name="txt_codigo_generado" value="<?=$codigo_aleatorio?>" placeholder="Ingrese Codigo">
      </div>
      <div class="form-group">
        <label>Valor</label>
      <input type="text" class="form-control" name="txt_valor" value="<?= set_value("txt_valor")?>" placeholder="Ingrese Valor de Codigo">
      </div>
      <div class="form-group">
        <label>Fecha</label>
         <input type="date" name="txt_fecha_i" id="txt_fecha_i" class="form-control" value="<?= set_value("txt_fecha_i")?>" placeholder="" required>
      </div>
       <div class="form-group">
        <label>Fecha Vencimiento</label>
         <input type="date" name="txt_fecha_f" id="txt_fecha_f" class="form-control" value="<?= set_value("txt_fecha_f")?>" placeholder="" required>
      </div>
           <hr>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              <a href="<?=$this->config->base_url()?>codigo_promo/grilla" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>