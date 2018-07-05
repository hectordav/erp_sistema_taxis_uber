  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div> 
				<div class="animated fadeIn" align="left">
           <label><h3><strong>Ver Vehiculo</strong></h3></label>
           <hr>
      <form  role="form" action="<?php echo $this->config->base_url();?>usuario/guardar_usuario_vehiculo" method="POST"  enctype="multipart/form-data">
    
    <div class="form-group">
    <?php if ($vehiculo): ?>
  <?php foreach ($vehiculo as $key): ?>
  <label>Tipo</label>
      <input type="text" class="form-control" name="" value="<?=$key->descripcion_tipo?>" readonly="true">
      </div>
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
  <div class="form-group">
    <label>Año</label>
       <input type="number" name="txt_ano" id="txt_ano" class="form-control" value="<?= $key->ano?>" placeholder="Ingrese Año del Vehiculo" required readonly="true">
  </div>
  <div class="form-group">
    <label># Licencia</label>
       <input type="text" name="txt_licencia" id="txt_licencia" class="form-control" value="<?= $key->licencia?>" placeholder="Ingrese Numero de Licencia" required readonly="true">
  </div>
  <div class="form-group">
      <label>Vencimiento de la Licencia</label>
      <?$fecha_vence_licencia=date('d-m-Y',strtotime($key->vencimiento_licencia))?>
        <input type="text" class="form-control" name="txt_licencia_vence" value="<?=$fecha_vence_licencia?>" placeholder="Ingrese Fecha de Vencimiento de la Licencia" readonly="true">
  </div>
  <div class="form-group">
    <label>Empresa</label>
      <input type="text" class="form-control" name="" value="<?=$key->nombre_empresa?>" readonly="true">
  </div>
   <div class="form-group">
    <label>Numero Interno del Vehiculo</label>
      <input type="text" name="txt_num_interno_vehiculo" id="txt_num_interno_vehiculo" class="form-control" value="<?= $key->numero_interno_vehiculo?>" readonly="true">
  </div>
  <div class="form-group">
    <label>Numero Tarjeta de Operacion</label>
      <input type="text" name="txt_num_tarjeta_operacion" id="txt_num_tarjeta_operacion" class="form-control" value="<?= $key->tarjeta_operacion?>" readonly="true">
  </div>
   <div class="form-group">
    <label>Numero Interno de Contrato</label>
      <input type="text" name="txt_num_interno_contrato" id="txt_num_interno_contrato" class="form-control" value="<?= $key->num_interno_contrato?>" readonly="true">
    </div>
   <div class="form-group">
    <label>Convenio</label>
      <input type="text" name="txt_convenio" id="txt_convenio" class="form-control" value="<?= $key->convenio?>"  readonly="true">
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
          <label><h3><strong>Imagenes del Vehiculo</strong></h3></label>
        <hr>
        </div>
  <?php if ($adjunto): ?>
    <?php foreach ($adjunto as $data): ?>
    <div class="col-md-3 col-sm-3 col-xs-3">
   <a data-toggle="modal" href="#<?=$data->id?>" class="thumbnail" style="height:auto;">
      <img src="<?=$this->config->base_url()?>assets/img/<?=$data->adjunto?>">
    </a>
     </div>
     <!--******************** la modal ************************ -->
     <div class="modal fade "id="<?=$data->id?>">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
      <div class="container">
        <div class="row">

<div class="col-md-12 col-sm-12 col-xs-12" align="center">
  <img class="img-responsive"src="<?=$this->config->base_url()?>assets/img/<?=$data->adjunto?>">
</div>
              </div><!-- termina el content -->
            </div> <!-- termina el modal dialog -->
        </div> <!-- termina la ventana modal -->
       </div>
     </div>
  <?php endforeach ?> 
  <?php endif ?>
  </div>
  
           <hr>
            <div class="form-group" align="center">
              
              <a href="<?=$this->config->base_url()?>vehiculo/grilla" title="" class="btn btn-warning btn-lg"><i class="fa fa-exclamation-triangle"></i>&nbsp;Volver</a>
            </div>
          </form>  
  				</div>
	    	</div>
		  </div>