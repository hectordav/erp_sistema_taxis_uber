<div align="center">
<div class="col-md-8 col-md-offset-2" align="center" style="padding: 50px;">
<br>
<br>
<br>
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
 <div class="x_panel animated bounceInLeft">
  <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>login/guardar_usuario_cliente" method="POST"  enctype="multipart/form-data">
            <div class="account-top" align="center">
              <h3><strong>Registro de Usuarios</strong></h3>
            </div>
            <!-- <div class="address" align="left">
              <span>Genero</span>
              <div>
                <input type="radio" name="radio_genero" value="1" checked="true">&nbsp;Masculino &nbsp;
              <input type="radio" name="radio_genero" value="2">&nbsp;Femenino
              </div>
            </div> -->
            <div class="address" align="left">
              <span>Cedula</span>
              <input  class="form-control" name="txt_cedula" value="<?= set_value("txt_cedula")?>" required >
            </div>
            <div class="address" align="left">
              <span>Nombre</span>
              <input class="form-control" name="txt_nombre" value="<?= set_value("txt_nombre")?>" required >
            </div>
          	<div class="address" align="left">
              <span>Direccion</span>
            	<textarea name="txt_direccion" class="form-control"><?= set_value("txt_direccion")?></textarea>
            </div>
            <div class="address" align="left">
              <span>Telf</span>
            <input class="form-control" name="txt_telf" value="<?= set_value("txt_telf")?>" required >
            </div>
             <div class="address" align="left">
            <span>Login/Email</span>
            <input type="email" class="form-control" name="txt_login" value="<?= set_value("txt_login")?>" required >
            </div>
            <div class="address" align="left">
            <span>Fecha de Nacimiento</span>
            <input type="date" class="form-control" name="txt_fecha_nac" value="<?= set_value("txt_login")?>" placeholder="">
            </div>
             <div class="address" align="left">
              <span>Clave</span>
            <input type="password" class="form-control" name="txt_clave_1" value="<?= set_value("txt_clave_1")?>" required >
            </div>
            <div class="address" align="left">
              <span>Repita su Clave</span>
            <input type="password" class="form-control" name="txt_clave_2" value="<?= set_value("txt_clave_2")?>" required >
            </div>
            <br>
            <input type="submit" class="btn btn-primary btn-lg" value="Registrese">    
            <div class="address" align="right">
            <br>
                Ya esta registrado?&nbsp;&nbsp;<a class="btn btn-default" href="<?=$this->config->base_url()?>login" title="">Inicie Sesion</a>
            </div>
           </form>
            </div>
  </div>
</div>
