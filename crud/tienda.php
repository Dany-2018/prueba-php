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
         width: 700px;
         margin: 0 auto;
         }
         table tr td:last-child a{
         margin-right: 15px;
         }
         .page-header h2{
         margin-top: 0;
         }
      </style>
      <title>Crud tienda </title>
   </head>
   <body>
      <div class="wrapper">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="page-header clearfix">
                     <h2 class="pull-left">Información de la tienda</h2>
                     <a href="index.html" class="btn btn-success pull-right">Volver al menu principal</a>
                  </div>
                  <form method="POST" action="tienda.php">
                     <label>ID tienda</label>
                     <input type="number" name="id" class="form-control" placeholder="Escriba el ID de la tienda " required><br/>
                     <label>Nombre de la tienda</label>
                     <input type="text" name="nombre" class="form-control" placeholder="Escriba el Nombre de la tienda " required><br/>
                     <label>Geolocaización</label>
                     <input type="text" name="geo" class="form-control" placeholder="Escriba Geolocaización de la tienda " required><br/>
                     <label>Fecha de apertura</label>
                     <input type="date" name="fecha" class="form-control" placeholder="Escriba la Fecha de apertura de la tienda" required><br/>
                     <input type="submit" name="insert" class="btn btn-primary" value="Adicionar">	
                  </form>
                  <?php
                     if (isset($_POST['insert'])) {
                     
                     	$id = $_POST['id'];
                     	$nombre = $_POST['nombre'];
                     	$geo = $_POST['geo'];
                     	$fecha = $_POST['fecha'];
                     	
                     
                     
                     	$insertar = "INSERT INTO tienda (id, nombre, geolocalizacion, fecha) VALUES ('$id','$nombre','$geo','$fecha')";
                     
                     	$ejecutar = mysqli_query($con, $insertar);
                     
                     	if ($ejecutar) {
                     		echo "<h3>Se creo correctamente la tienda</h3>";
                     	}
                     
                     }
                     
                     ?>
                  <br/>
                  <table width="500" border="2" style="background: #f9f9f9;" class="table table-bordered table-striped">
                     <th>ID</th>
                     <th>Nombre tienda</th>
                     <th>Geolocalición</th>
                     <th>Fecha de Apertura</th>
                     <th>Editar </th>
                     <th>Borrar</th>
                     <?php
                        $consulta ="SELECT * FROM tienda";
                        
                        $ejecutar = mysqli_query($con, $consulta);
                        
                        $i = 0;
                        
                        while ( $fila = mysqli_fetch_array($ejecutar)) {
                         	$id = $fila['id'];
                         	$nombre = $fila['nombre'];
                         	$geo = $fila['geolocalizacion'];
                         	$fecha = $fila['fecha'];
                        
                         	$i++;
                        
                        ?>
                     <tr align="center">
                        <td><?php echo "$id"; ?></td>
                        <td><?php echo "$nombre"; ?></td>
                        <td><?php echo "$geo"; ?></td>
                        <td><?php echo "$fecha"; ?></td>
                        <td><a href="tienda.php?editar=<?php echo $id; ?>"><span class='glyphicon glyphicon-pencil'></span></a></td>
                        <td><a href="tienda.php?borrar=<?php echo $id; ?>"><span class='glyphicon glyphicon-trash'></span></a></td>
                     </tr>
                     <?php } ?>
                  </table>
                  <?php
                     if (isset($_GET['editar'])) {
                     	include("editar-tienda.php");
                     }
                     
                     ?>
                  <?php 
                     if (isset($_GET['borrar'])) {
                     	
                     	$borrar_id = $_GET['borrar'];
                     
                     	$borrar = "DELETE FROM tienda WHERE id='$borrar_id'";
                     	$ejecutar =  mysqli_query($con, $borrar);
                     
                     	if ($ejecutar) {
                     	echo "<script>alert('Tienda borrada')</script>";
                     	echo "<script>window.open('tienda.php', '_self')</script>";
                     }
                     
                     }
                     
                     ?>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>