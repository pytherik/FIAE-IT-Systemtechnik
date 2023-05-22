<?php
require 'helpers.php';

/*trigger_error('Dumpfbacken-Alarm', E_USER_NOTICE);
trigger_error('Vollspacken-Warning', E_USER_WARNING);
trigger_error('Unfähigkeits-Error', E_USER_ERROR);*/

function errorHandler(
  int $type,
  string $msg,
  ?string $file=null,
  ?int $line=null
) {
  echo "$type: $msg in $file on line $line";
  exit;
}

error_reporting(E_ALL & ~E_WARNING);

set_error_handler('errorHandler', E_ALL);
echo $x;
