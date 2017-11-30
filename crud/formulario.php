<!DOCTYPE html>
<meta charset="utf-8">
<?php
   $con = mysqli_connect("localhost", "root", "", "crud") or die("error");
   ?>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
       <style type="text/css">
         .wrapper{
         width: 750px;
         margin: 0 auto;
         }
         table tr td:last-child a{
         margin-right: 15px;
         }
      </style>
      <title>Crud php</title>
   </head>
   <body>
      <div class="wrapper">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-header clearfix">
                     <h3 class="pull-left">Creación de Productos asociados a la tienda</h3>
                     <a href="index.html" class="btn btn-success pull-right">Volver al menu principal</a>
                  </div>
                  <form method="POST" action="formulario.php">
                     <label>SKU</label>
                     <input type="number" name="sku" class="form-control" placeholder="Escriba id del producto " required><br/>
                     <label>Nombre</label>
                     <input type="text" name="nombre" class="form-control" placeholder="Escriba nombre producto " required><br/>
                     <label>Descripción</label>
                     <input type="text" name="descripcion" class="form-control" placeholder="Escriba la Descripción del producto " required><br/>
                     <label>Valor</label>
                     <input type="number" name="valor" class="form-control" placeholder="Escriba el valor del producto " required><br/>
                     <label>Tienda</label>
                     <input type="number" name="tienda" class="form-control" placeholder="Escriba el ID de la tienda " required><br/>
                     <input type="submit" name="insert" class="btn btn-primary" value="Adicionar">	
                  </form>
                  <div class="page-header clearfix">
                     <a href="tienda.php" class="btn btn-success pull-right">Ver listado de tiendas creadas </a>
                  </div>
                  <?php
                     if (isset($_POST['insert'])) {
                     
                     	$sku = $_POST['sku'];
                     	$nombre = $_POST['nombre'];
                     	$descripcion = $_POST['descripcion'];
                     	$valor = $_POST['valor'];
                     	$tienda = $_POST['tienda'];
                     
                     
                     	$insertar = "INSERT INTO producto (sku, nombre, descripcion, valor, tienda) VALUES ('$sku','$nombre','$descripcion','$valor','$tienda')";
                     
                     	$ejecutar = mysqli_query($con, $insertar);
                     
                     	if ($ejecutar) {
                     		echo "<h3>Se inserto correctamente el producto</h3>";
                     	}
                     
                     }
                     
                     ?>
                  <br/>
                  <table width="500" border="2" style="background: #f9f9f9;" class="table table-bordered table-striped">
                     <th>SKU</th>
                     <th>Nombre</th>
                     <th>Descripción</th>
                     <th>Valor</th>
                     <th>Tienda</th>
                     <th>Editar </th>
                     <th>Borrar</th>
                     <?php
                        $consulta ="SELECT * FROM producto";
                        
                        $ejecutar = mysqli_query($con, $consulta);
                        
                        $i = 0;
                        
                        while ( $fila = mysqli_fetch_array($ejecutar)) {
                         	$sku = $fila['sku'];
                         	$nombre = $fila['nombre'];
                         	$descripcion = $fila['descripcion'];
                         	$valor = $fila['valor'];
                         	$tienda = $fila['tienda'];
                        
                         	$i++;
                        
                         
                        
                        ?>
                     <tr align="center">
                        <td><?php echo "$sku"; ?></td>
                        <td><?php echo "$nombre"; ?></td>
                        <td><?php echo "$descripcion"; ?></td>
                        <td><?php echo "$valor"; ?></td>
                        <td><?php echo "$tienda"; ?></td>
                        <td><a href="formulario.php?editar=<?php echo $sku; ?>"><span class='glyphicon glyphicon-pencil'></span></a></td>
                        <td><a href="formulario.php?borrar=<?php echo $sku; ?>"><span class='glyphicon glyphicon-trash'></span></a></td>
                     </tr>
                     <?php } ?>
                  </table>
                  <?php
                     if (isset($_GET['editar'])) {
                     	include("editar.php");
                     }
                     
                     ?>
                  <?php 
                     if (isset($_GET['borrar'])) {
                     	
                     	$borrar_sku = $_GET['borrar'];
                     
                     	$borrar = "DELETE FROM producto WHERE sku='$borrar_sku'";
                     	$ejecutar =  mysqli_query($con, $borrar);
                     
                     	if ($ejecutar) {
                     	echo "<script>alert('Producto borrado')</script>";
                     	echo "<script>window.open('formulario.php', '_self')</script>";
                     }
                     
                     }
                     
                     ?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>