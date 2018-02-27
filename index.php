<?php
 try{
     require_once('funciones/bd_conexion.php');
     $sql = 'SELECT * FROM contactos';
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
                  <h2>Nuevo Contacto</h2>
                  <form action="crear.php" method="post">
                          <div class="campo">
                              <label for="nombre">Nombre:</label>
                              <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                          </div>
                          <div class="campo">
                              <label for="numero">Teléfono:</label>      
                              <input type="text" name="numero" id="numero" placeholder="Número">
                          </div>
                          <input type="submit" value="Agregar">  
                  </form>  
        </div> <!--.contenido-->
        <div class="contenido existentes">
            <h2>Contactos existentes.</h2>
            <p>
                Numero de contactos: <?php echo $resultado->num_rows;?>
            </p>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Numero</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($registros = $resultado->fetch_assoc()){  ?>
                        <tr>
                            <td><?php echo$registros['nombre']; ?></td>
                            <td><?php echo$registros['telefono']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $registros['id']; ?>">
                                  Editar  
                                </a>
                            </td>
                            <td class="borrar">
                                <a href="borrar.php?id=<?php echo $registros['id']; ?>">
                                  Borrar  
                                </a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
</div>
<?php
  $conn->clone();
?>
</body>
</html>