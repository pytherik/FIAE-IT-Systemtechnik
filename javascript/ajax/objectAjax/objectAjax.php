<?php
include 'classes/User.php';

$data = json_decode($_POST['user']);

$user = new User($data->name, $data->time);


//info echo json_encode($user) gibt keine private Attribute zurück.
// Deshalb die Methode getJSONEncode
//echo $user->getJSONEncode();

//info In der Klasse User muss JsonSerializable implementiert sein
// und eine Methode jsonSerialize vorhanden sein. Damit wird die
// Ausgabe der Attribute spezifiziert. Es ist eine eingebaute
// Funktionalität, deshalb geschieht der Aufruf der Methode bei der
// verwendung von json_encode($user) automatisch.
echo json_encode($user);

//info Um die so gewonnenen Daten beim Empfang in js korrekt zurück
// umwandeln zu können, dürfen im echo keinerlei andere informationen
// als der json encoded string vorhanden sein.(z.B <br> und anderes html)

