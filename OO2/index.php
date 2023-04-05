<?php
include 'config.php';
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

if (file_exists(PATH_DATA)){
  unlink(PATH_DATA);
}
$employee1 = new Employee('Hansi', 'Pample', 1);
$employee2 = new Employee('Hans', 'Wurst', 2);
$employee3 = new Employee('Grobi', 'Bird', 3);

$employees = [$employee1, $employee2, $employee3];

// Wie erzwinge ich, dass alle benötigten Parameter auch gesetzt werden?
// Man schreibt einen Konstruktor in der Klasse Employee.
// Wir brauchen Persistenz, d.h. wir wollen die Daten so speichern können,
// dass sie nicht verloren gehen, wenn das Programm stoppt//.

foreach ($employees as $employee) {
  $employee->store();
}


function output(array $newEmps):void
{
  foreach($newEmps as $newEmp) {
    echo $newEmp->getFirstname().','.$newEmp->getLastname().
      ','.$newEmp->getDepartmentId().'<br>';
  }
}

$emp = new Employee();
$employees = $emp->read();
echo "Vor der Änderung<br>";
output($employees);


// Um einen Employee ($newEmp[2]) zu löschen wird Methode delete aufgerufen
//$employees = $newEmps[1]->delete();

//$newEmps = $emp->read();
//output($newEmps);

// Um Attribute eines Employees zu ändern wird Methode update benötigt
$employees[0]->update('firstname' , 'Grobi');
$employees[2]->update('lastname' , 'Habich');
$employees[1]->update('id', 200042);
//$emp->update(1, ['firstname' => 'Grobi']);
//$emp->update(0, ['lastname' => 'Habich']);
//$emp->update(2, ['id' => 2167432]);

$employees = $emp->read();
echo "<br>Nach der Änderung<br>";
output($employees);
?>

</body>
</html>
