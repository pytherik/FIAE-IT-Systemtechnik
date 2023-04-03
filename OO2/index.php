<?php
include './classes/Employee.php';
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=">
  <title>pampeldoc</title>
  <style>
      body {
          background-color: #444;
          color: #ddd;
          font-size: 1.4rem;
      }
  </style>
</head>
<body>
<?php
$employee1 = new Employee('Hansi', 'Pample', 1);
$employee2 = new Employee('Hans', 'Wurst', 2);
$employee3 = new Employee('Grobi', 'Bird', 3);

// Wie erzwinge ich, dass alle benötigten Parameter auch gesetzt werden?
// Man schreibt einen Konstruktor in der Klasse Employee.
$employees = [$employee1, $employee2, $employee3];
foreach ($employees as $employee) {
  echo "Vorname: " . $employee->getFirstname() . "<br>";
  echo "Nachname: " . $employee->getLastname() . "<br>";
  echo "Id: " . $employee->getDepartmentId() . "<br>";
  $employee->store();
}
// Wir brauchen Persistenz, d.h. wir wollen die Daten so speichern können,
// dass sie nicht verloren gehen, wenn das Programm stoppt.
?>
</body>
</html>
