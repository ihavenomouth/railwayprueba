<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba PHP+Apache</title>
  </head>
<body>

<h1>Probando la conexión</h1>

<?php

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
        echo '<p>No está instalada la extensión de PHP mysqli</p>';
} else {
    echo '<p>La extensión de PHP mysql se encuentra instalada.</p>';
}

try{
  $mysqli = new mysqli("127.0.0.1","root","Kilobyte1","bd",3306);
}
catch(Exception $e){
  echo "<p>Error al conectar: " . $e->getMessage() ,"</p>";
  exit();
}

echo "<p>Conexión establecida correctamente.</p>";
?>

<h2>Probando la tabla tareas</h2>

<?php  
$sql = "SELECT * FROM tareas";

if ($result = $mysqli -> query($sql)) {
  while ($row = $result -> fetch_row()) {
    printf ("ID(%s), Tarea: %s, Desc: %s, Completada: %s\n", $row[0], $row[1], $row[2], $row[3]);
  }
  $result -> free_result();
}
$mysqli -> close();
?>

</body>
</html> 
