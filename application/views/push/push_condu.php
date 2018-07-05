  <script> 
function cuenta(){ 
        var resta=235-document.forms[0].txt_mensaje.value.length;
        document.forms[0].caracteres.value=resta; 
} 
</script>
  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
   <?$correcto =$this->session->flashdata('alerta');?> 
         <?php if ($correcto): ?>
           <div class="animated bounceInDown">
             <div class="alert alert-info alert-dismissible" role="alert">       
             <strong><?= $correcto?></strong>
              <br>
              </div>
            </div>
      <?php endif ?>
</div>
  				<div class="animated fadeIn" align="left">
             <label><h3><strong>Enviar Notificacion a Conductores</strong></h3></label>
             <hr>
    <form  role="form" action="<?php echo $this->config->base_url();?>push_conductor/enviar_push_conductor" method="POST"  enctype="multipart/form-data">
      <div class="form-group">
        <label>Conductor</label>
        <select class="form-control" name="id_cliente" id="id_cliente" data-show-subtext="true" data-live-search="true"  required="required">
          <option data-tokens="" value="">Seleccione Conductor</option>
          <option data-tokens="" value="0">Todos</option>
           <?php if ($conductor): ?>
             <?php foreach ($conductor as $key): ?>
                <option data-tokens="<?= $key->id_usuario.", ".$key->nombre?>" value="<?= $key->id_usuario?>"><?= $key->nombre?></option>
             <?php endforeach ?>
           <?php else: echo "no hay Resultados" ?>
           <?php endif ?>
        </select>
      </div>
      <div class="form-group">
      <label>Titulo</label>
        <input type="text" class="form-control" name="txt_titulo" value="<?= set_value("txt_titulo")?>" placeholder="Ingrese Titulo del Mensaje" required>
      </div>
      <div class="form-group">
        <label>Mensaje</label>
      <textarea maxlength="235"  name="txt_mensaje" class="form-control" placeholder="Ingrese Mensaje" onKeyDown="cuenta()" onKeyUp="cuenta()" required ><?= set_value("txt_mensaje")?></textarea>
      </div>
      <div class="form-group" align="right">
     <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-11 col-sm-11 col-xs-11" align="right">
      <h4><span class="label label-default">Caracteres Restantes</span></h4>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-1" align="right">
         <input type="text" class="form-control" name=caracteres size=4 readonly="true"> 
      </div>
     </div>
       
      </div>
           <hr>
            <div class="form-group" align="center">
              <button type="submit" class="btn btn-lg btn-success">&nbsp;Enviar &nbsp;<i class="fa fa-share-square-o"></i></button>
              <a href="<?=$this->config->base_url()?>principal" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>