<?php
include 'classes/Song.php';

$songs = [
  new Song(1,'Everything\'s ruined', 'Faith No More'),
  new Song(2, 'Von jetzt an gings bergab', 'Hildegard Knef'),
  new Song(3, 'Let\'s go, get stoned', 'Sublime')
];

echo json_encode($songs);