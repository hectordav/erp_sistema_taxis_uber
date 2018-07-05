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
              <div class="account-top" align="center">              
          </div>
            <div class="account-top" align="center">
            <h3>Se ha enviado un email para recuperacion de su cuenta; Revise su Bandeja de Correo</h3>
            </div>
           
            <br>
            <div>
             <a href="<?=$this->config->base_url()?>login" class="btn btn-success" title="">Volver</a>
            </div>
       
            </div>
</div>
</div>
