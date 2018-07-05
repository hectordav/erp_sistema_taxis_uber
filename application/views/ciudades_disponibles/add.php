  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Agregar Ciudad Disponible para la Aplicacion</strong></h3></label>
             <hr>
    <form  role="form" action="<?php echo $this->config->base_url();?>ciudad_disp/guardar_ciudad" method="POST"  enctype="multipart/form-data">
       <div class="form-group">
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
      </div>
      <div class="form-group">
      <label>Ciudad</label>
        <select class="form-control" name="id_ciudad" id="id_ciudad" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Ciudad</option>
        </select>
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