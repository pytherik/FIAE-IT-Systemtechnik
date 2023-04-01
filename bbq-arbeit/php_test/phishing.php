<?php
// Landingpage vom heise kapern
// auslesen des Quelltexts von hsise.de

$content = file_get_contents('http://www.heise.de');
// Quelltext lokal sichern
file_put_contents('phishing.html', $content);

// links anpassen mit <base href="http://www.heise.de">
// Text auf eigenem Server manipulieren.
