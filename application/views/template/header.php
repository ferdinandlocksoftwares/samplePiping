<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Merchant Refunds | <?php echo $title; ?></title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Merchant Refunds -->
  <link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/classes.css" rel="stylesheet">

  
  <?php
  //private CSS
  if(count($add_stylesheets) > 0){
    foreach ($add_stylesheets as $stylesheet):
      echo '<link href="'.$stylesheet.'" rel="stylesheet"/>';
    endforeach;
  }
  ?>

  
  <?php
  //private JS
  if(count($add_scripts) > 0){
    foreach ($add_scripts as $script):
      echo '<script';
      foreach ($script as $param => $value):
        echo ' '.$param.'="'.$value.'"';
      endforeach;
      echo '></script>';
    endforeach;
  }
  ?>
  
<!--
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/js/npm.js"></script> 
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.bxslider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.growl.js"></script>
-->



<!--<script src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.js"></script> -->

<?php
if(count($add_includes) > 0){
	foreach($add_includes as $script) include($script);
}
?>

</head>
<body>