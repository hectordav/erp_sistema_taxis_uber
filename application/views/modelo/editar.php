  <div class="right_col" role="main">
	    	<div class="x_panel">
        <div class="animated bounceInDown" align="left">
      
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Editar Modelo</strong></h3></label>
             <hr>
        <form  role="form" action="<?php echo $this->config->base_url();?>modelo/actualizar_modelo" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
              <label>Tipo</label>
          <select class="selectpicker form-control" name="id_tipo" id="id_tipo" data-show-subtext="true" data-live-search="true"  required="required">
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
              <?php if ($modelo): ?>
                <?php foreach ($modelo as $key): ?>
                  <input type="hidden" name="txt_id_modelo" value="<?=$key->id?>">
                  <input type="text" name="txt_modelo" id="txt_modelo" class="form-control" value="<?= $key->descripcion ?>" placeholder="Ingrese Modelo" required>
                <?php endforeach ?>
              <?php endif ?>
               
            </div>
            <hr>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i>&nbsp;Guardar</button>
              <a href="<?=$this->config->base_url()?>modelo/grilla" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>