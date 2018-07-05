<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <link href="<?=$this->config->base_url()?>assets/img/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
        foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
  <title>INICIO</title>
  <link href="<?= $this->config->base_url();?>assets/css/animate.min.css" rel="stylesheet">
  <link href="<?= $this->config->base_url();?>assets/css/bootstrap-select.min.css" rel="stylesheet">
<!--*******************************************************************-->
  <script src="<?php echo $this->config->base_url();?>assets/js/jquery-1.9.1.js" type="text/javascript"></script>
 <!--  <script src="<?= $this->config->base_url();?>assets/js/bootstrap.min.js"></script> -->
  <script src="<?php echo $this->config->base_url();?>assets/js/bootstrap-select.min.js" type="text/javascript"></script>
<!-- <link href="<?= $this->config->base_url();?>assets/css/custom.css" rel="stylesheet"> -->
<link href="<?= $this->config->base_url();?>assets/css/menu.css" rel="stylesheet">

  <link href="<?= $this->config->base_url();?>assets/css/pedido.css" rel="stylesheet">
  <link href="<?= $this->config->base_url();?>assets/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?= $this->config->base_url();?>assets/css/floatexamples.css" rel="stylesheet" type="text/css" />
  <script src="<?= $this->config->base_url();?>assets/js/nprogress.js"></script>
  <script src="<?= $this->config->base_url();?>assets/js/highcharts.js"></script>
</head>
<style>
  a.sin_raya{
     text-decoration:none;
   }
</style>
<body style="background: #F7F7F7">
 



