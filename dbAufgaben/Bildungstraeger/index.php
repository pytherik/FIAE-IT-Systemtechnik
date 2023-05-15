<?php
include 'config.php';

spl_autoload_register(function($class){
  include sprintf('classes/%s.php', $class);
});

$id = (new Bildungstraeger())->getAllAsObjects();
echo "<pre>";
print_r($id);
echo "</pre>";