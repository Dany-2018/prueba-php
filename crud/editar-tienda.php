<?php
   if (isset($_GET['editar'])) {
   	$editar_id = $_GET['editar'];
   
   	$consulta = "SELECT * FROM tienda WHERE id = $editar_id";
   	$ejecutar = mysqli_query($con, $consulta);
   
   	$fila = mysqli_fetch_array($ejecutar);
   
   	$id = $fila['id'];
    	$nombre = $fila['nombre'];
    	$geo = $fila['geolocalizacion'];
    	$fecha = $fila['fecha'];
   }
   
   ?>
<br />
<form method="POST" action="">
   <h1>Editar información de la tienda</h1>
   <input type="number" name="id" class="form-control" value="<?php echo $id; ?> "><br />
   <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?> "><br />
   <input type="text" name="geolocalizacion" class="form-control" value="<?php echo $geo; ?> "><br />
   <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?> "><br />
   <input type="submit" class="btn btn-primary" name="actualizar" value="Actulizar Datos">
</form>
<?php 
   if (isset($_POST['actualizar'])) {
   	
   
   $actualizar_id = $_POST['id'];
   $actualizar_nombre = $_POST['nombre'];
   $actualizar_geolocalizacion = $_POST['geolocalizacion'];
   $actualizar_fecha = $_POST['fecha'];
   
   
   
   $actualizar = "UPDATE tienda SET id= '$actualizar_id', nombre= '$actualizar_nombre', geolocalizacion= '$actualizar_geolocalizacion', fecha= '$actualizar_fecha'  WHERE id='$editar_id'";
   
   $ejecutar = mysqli_query($con, $actualizar);
   if ($ejecutar) {
   	echo "<script>alert('Datos actualizados')</script>";
   	echo "<script>window.open('tienda.php', '_self')</script>";
   }
   
   }
   ?>