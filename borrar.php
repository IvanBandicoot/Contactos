<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }

 try{
     require_once('funciones/bd_conexion.php');
     $sql = "DELETE FROM `contactos` WHERE `id`='{$id}';";
     $resultado = $conn->query($sql);
}catch(Exception $e){
 $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
</head>
<body>
    <div class="contenedor">
      <h1>Agenda de Contactos</h1>
        <div class="contenido"> 
          <?php
           if($resultado){
             echo "Contacto Borrado";
           }else{
               echo "Error ". $conn->error;
           }
          ?>
          <hr>
          <a class="volver" href="index.php">Volver a inicio</a>
        </div> <!--.contenido-->
    </div>
    <?php $conn->close();?>
</body>
</html>