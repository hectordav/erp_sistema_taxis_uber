<div align="center">
<div class="col-md-6 col-md-offset-3" align="center" style="padding: 50px;">
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

    <div style="padding: 20px;">      
    </div>
    <div class="x_panel animated bounceInDown">
          <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>login/reset_pass" method="POST"  enctype="multipart/form-data">
          <div class="account-top" align="center">              
          </div>
            <div class="account-top" align="center">
            <h3>Ingrese Su nueva Clave</h3>
            </div>
          <?php if ($id_usuario): ?>
            <input type="hidden" name="txt_id_usuario" value="<?=$id_usuario?>">
          <?php endif ?>
            <div class="address" align="left">
              <span>Clave</span>
              <input type="password" class="form-control" name="txt_clave_1" value="<?= set_value("txt_clave_1")?>" required placeholder="Ingrese su clave">
            </div>
            <div class="address" align="left">
              <span>Repita su Clave</span>
              <input type="password" class="form-control" name="txt_clave_2" value="<?= set_value("txt_clave_2")?>" required placeholder="Repita nuevamente su clave">
            </div>
            <br>
            <div>
              <input type="submit" class="btn btn-success btn-lg" value="Resetear Password">
            </div>
           </form>
            </div>
</div>
</div>
