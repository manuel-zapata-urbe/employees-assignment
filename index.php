<?php
$amountOfEmployees = 2;
$formTitles = [
  0 => 'Primer Empleado',
  1 => 'Segundo Empleado',
  2 => 'Tercer Empleado'
];
$formNames = [
  0 => 'firstEmployee[]',
  1 => 'secondEmployee[]',
  2 => 'thirdEmployee[]'
];
$inputClasses = 'border border-blue-300 rounded-md focus:ring-2 focus:ring-blue-600 mx-4 my-2
p-3 hover:ring-1 hover:ring-blue-400 w-1/2 text-sm text-black';

$employeesList = [
  0 => 'firstEmployee',
  1 => 'secondEmployee',
  2 => 'thirdEmployee'
];
$employees = array();
$wasSubmitted = $_POST['submit'];

/**
 * This creates an associative array like this:
 * Array (
 *  "firstEmployee" => Array(...props),
 *  ...
 * );
 *
 * The 0..5 is because $_POST is an array containing the submitted values and we
 * need a way to get each one.
 */
for ($employeeIndex = 0; $employeeIndex <= $amountOfEmployees; $employeeIndex++) {
  $employees[$employeesList[$employeeIndex]] = array(
    'name' => (string) $_POST[$employeesList[$employeeIndex]][0],
    'age' => (int) $_POST[$employeesList[$employeeIndex]][1],
    'id' => (string) $_POST[$employeesList[$employeeIndex]][2],
    'salary' => (int) $_POST[$employeesList[$employeeIndex]][3],
    'department' => (string) $_POST[$employeesList[$employeeIndex]][4],
    'workplace' => (string) $_POST[$employeesList[$employeeIndex]][5],
  );
}

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
  <title>Empleados</title>
</head>

<body>
  <main class='w-9/12 m-auto p-2'>
    <div class='text-center border-2 border-blue-300 rounded-md m-5 p-3'>
      <?php if (!isset($wasSubmitted)) : ?>
        <h2 class='text-xl my-7'>
          Página que permite subir la información de <strong class='text-blue-500'>tres</strong> empleados
        </h2>
        <form method='POST' action=<?php echo $_SERVER['PHP_SELF']; ?>>
          <div>
            <?php
            for ($index = 0; $index <= $amountOfEmployees; $index++) {
              echo "<p class='tracking-wider my-3'>$formTitles[$index]</p>";
              echo "<input name='$formNames[$index]' class='$inputClasses' placeholder='Ingrese el nombre' type='text' required/>";
              echo "<input name='$formNames[$index]' class='$inputClasses' placeholder='Ingrese la edad' type='number' required/>";
              echo "<input name='$formNames[$index]' class='$inputClasses' placeholder='Ingrese la cédula' type='number' required/>";
              echo "<input name='$formNames[$index]' class='$inputClasses' placeholder='Ingrese el salario' type='number' required/>";
              echo "<input name='$formNames[$index]' class='$inputClasses' placeholder='Ingrese el departamento' type='text' required/>";
              echo "<input name='$formNames[$index]' class='$inputClasses' placeholder='Ingrese el área de trabajo' type='text' required/>";
            }
            ?>
          </div>
          <button class='bg-blue-400 hover:bg-blue-500 text-white py-3 px-4 rounded-md my-3' type='submit' name='submit'>Enviar</button>
        </form>
      <?php else : ?>
        <h2 class='text-xl my-7'>
          Información de los <strong class='text-blue-500'>empleados</strong>
        </h2>
        <pre class='w-0 px-24'><?php echo print_r($employees, true); ?></pre>
      <?php endif; ?>

      <p class='italic opacity-75 my-3'>Manuel Zapata - 27.971.134 - N1013</p>

    </div>
  </main>
</body>

</html>