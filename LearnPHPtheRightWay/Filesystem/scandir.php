<?php

require '../helpers.php';


$dirs = scandir(__DIR__);
ppa($dirs);
$dirs = scandir('../');
ppa($dirs);

foreach ($dirs as $dir) {
  if(is_file("../$dir")){
    $fs = filesize("../$dir");
    $pi = pathinfo("../$dir");
    ppa($pi);
//    echo "$dir is a file: $fs Bytes<br>";
  } else if (is_dir("../$dir")) {
    $pi = pathinfo("../$dir");
    ppa($pi);
    echo "$dir is a dir<br>";
  } else {
    echo "$dir is a nothing<br>";
  }
}
