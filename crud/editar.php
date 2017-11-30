<?php
   if (isset($_GET['editar'])) {
   	$editar_sku = $_GET['editar'];
   
   	$consulta = "SELECT * FROM producto WHERE sku = $editar_sku";
   	$ejecutar = mysqli_query($con, $consulta);
   
   	$fila = mysqli_fetch_array($ejecutar);
   
   	$sku = $fila['sku'];
   	$nombre = $fila['nombre'];
    	$descripcion = $fila['descripcion'];
    	$valor = $fila['valor'];
    	$tienda = $fila['tienda'];
   }
   
   ?>
<br />
<div class="page-header clearfix">
   <h2 class="pull-left">Editar información del producto</h2>
</div>
<form method="POST" action="">
   <label>SKU</label>
   <input type="text" name="sku" class="form-control" value="<?php echo $sku; ?> "><br />
   <label>Nombre</label>
   <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?> "><br />
   <label>Descripción</label>
   <input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?> "><br />
   <label>Valor</label>
   <input type="text" name="valor" class="form-control" value="<?php echo $valor; ?> "><br />
   <label>Tienda</label>
   <input type="text" name="tienda" class="form-control" value="<?php echo $tienda; ?> "><br />
   <input type="submit" class="btn btn-primary" name="actualizar" value="Actulizar Datos">
</form>
<?php 
   if (isset($_POST['actualizar'])) {
   	
   
   $actualizar_sku = $_POST['sku'];
   $actualizar_nombre = $_POST['nombre'];
   $actualizar_descripcion = $_POST['descripcion'];
   $actualizar_valor = $_POST['valor'];
   $actualizar_tienda = $_POST['tienda'];
   
   
   $actualizar = "UPDATE producto SET sku= '$actualizar_sku', nombre= '$actualizar_nombre', descripcion= '$actualizar_descripcion', valor= '$actualizar_valor', tienda= '$actualizar_tienda' WHERE sku='$editar_sku'";
   
   $ejecutar = mysqli_query($con, $actualizar);
   if ($ejecutar) {
   	echo "<script>alert('Datos actualizados')</script>";
   	echo "<script>window.open('formulario.php', '_self')</script>";
   }
   
   }
   ?>