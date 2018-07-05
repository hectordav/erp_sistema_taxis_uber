  <script>
var myVar = setInterval(buscar_conductor, 3000);

function buscar_conductor() {
 /* event.preventDefault();*/
  var valor;
  $.ajax({
    url: "<?=$this->config->base_url()?>/servicio/buscar_conductor_2",
    type:"POST",
    data: $("#form-guardar").serialize(),
    success:function(respuesta){
        valor=respuesta;
        document.getElementById('demo').value=valor;
  }
});
  var valor2=document.getElementById("demo").value;
    if (valor2=='') {
          document.getElementById('encontrado').style.display = 'none';
          document.getElementById('buscando').style.display = 'block';
        }else{
         if (valor2=='no hay nadie') {
         }else{
           document.getElementById('encontrado').style.display = 'block';
          document.getElementById('buscando').style.display = 'none';
         }
        }
}

</script>
  <div class="right_col" role="main">
	 <div class="x_panel">
    <div class="animated bounceInDown" align="left">
  <?= validation_errors('<div class="alert alert-danger">','</div> ')?>
    </div>
     <div id="encontrado" class="animated fadeIn" style="display: none;" align="center">
      <label><h3><strong>Conductor Encontrado</strong></h3></label>
      <div align="center">
       <hr>
        <a href="<?=$this->config->base_url()?>servicio/conductor_encontrado" class="btn btn-primary btn-lg" title="">Continuar</a>
      </div>
    </div>
			<div class="animated fadeIn" align="center" id="buscando" style="display: block;">
         <label><h3><strong>Buscando Conductor Disponible</strong></h3></label>
         <hr>
          <img width="200" height="200" src="<?= $this->config->base_url();?>/assets/img/radar_4.gif" alt="..." align=center>
      </div>
      <hr>
      <div class="form-group" align="center" id="buscando" style="display: block;">
  
      <?php if ($id_servicio): ?>
        <input type="hidden" name="id_servicio" value="<?=$id_servicio?>">
      <?php endif ?>
      <div id="buscando" style="display: block;">
        <a class="btn btn-warning" href="<?=$this->config->base_url()?>servicio/cancelar_servicio/<?=$id_servicio?>" title="">Cancelar Servicio</a>
      </div>
      </div>
      </div>

  <input type="txt" id="demo" name="">
   
  </div>
      </div>