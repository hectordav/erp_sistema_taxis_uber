<div align="center">
<div class="col-md-6 col-md-offset-3" align="center" style="padding: 100px;">
<div class="animated bounceInDown">
  <?$correcto =$this->session->flashdata('alerta');?> 
         <?php if ($correcto): ?>
         <div class="animated bounceInDown">
           <div class="alert alert-danger alert-dismissible">             
           <strong><?= $correcto?></strong>
            <br>
            </div>
        </div> <?php endif ?>
<!-- la parte de la validacion -->
<?= validation_errors('<div class="alert alert-danger ">','</div> ')?>
</div>
<br>
 <div class="x_panel animated bounceInDown">
          <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>cliente/actualizar_cliente" method="POST"  enctype="multipart/form-data">
          <div class="account-top" align="center">            
          </div>

            <div class="account-top" align="center">
              <h3>Ingrese los siguientes Datos para continuar</h3>
            </div>
            <?php if ($cliente): ?>
              <?php foreach ($cliente as $key): ?>
                <input type="hidden" name="txt_id_cliente" value="<?=$key->id?>">
              <?php endforeach ?>
            <?php endif ?>
            <div class="address" align="left">
              <span>Cedula</span>
              <input type="text" class="form-control" name="txt_cedula" value="<?= set_value("txt_cedula")?>" placeholder="Ingrese Cedula">
            </div>
            <div class="address" align="left">
              <span>Direccion</span>
              <textarea name="txt_direccion" class="form-control" placeholder="Ingrese direccion"><?= set_value("txt_direccion")?></textarea>
            </div>
            <div class="address" align="left">
              <span>Telefono</span>
              <input type="text" class="form-control" name="txt_telf" value="<?= set_value("txt_telf")?>" placeholder="Ingrese Telefono">
            </div>
              <div class="address" align="left">
              <span>Fecha de Nacimiento</span>
              <input type="date" class="form-control" name="txt_fecha_nac" value="<?= set_value("txt_fecha_nac")?>" placeholder="Ingrese Telefono">
            </div>
            <br>
               <input type="submit" class="form-control btn-success" value="Guardar">
           </form>
            </div>
  </div>
</div>
