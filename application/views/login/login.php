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
          <form class="form-horizontal" role="form" action="<?php echo $this->config->base_url();?>login/login_manual" method="POST"  enctype="multipart/form-data">
          <div class="account-top" align="center">
          <?php if ($login): ?>
            <center><a  class=" btn btn-primary btn-lg" href="<?= $login ?>"><i class="fa fa-facebook-official"></i>&nbsp; Inicia sesion con Facebook</a></center>
          <?php endif ?>                
          </div>
            <div class="account-top" align="center">
              <h3>Usuarios Registrados</h3>
            </div>
            <div class="address" align="left">
              <span>Email</span>
              <input type="email" class="form-control" name="txt_login" value="<?= set_value("txt_login")?>" required >
            </div>
            <div class="address" align="left">
              <span>Password</span>
              <input type="password" class="form-control" name="txt_password" value="<?= set_value("txt_password")?>" required >
            </div>
            <br>
            <div>
              <input type="submit" class="btn btn-success btn-lg" value="Login">
            </div>
            <div class="address" align="right">
              <a class="forgot" href="<?=$this->config->base_url()?>login/olvido_pass">Olvidó Su Password?</a>
             
            </div>
            <div class="address" align="right">
                No tiene Cuenta?&nbsp;<a class="btn btn-default" href="<?=$this->config->base_url()?>login/registro_usuario">Registrese</a>
            </div>
           </form>
            </div>
</div>
</div>
