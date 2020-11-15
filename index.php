<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
    <head>
        <meta charset="utf-8"> 
				<meta http-equiv="refresh" content="3" >
       <!--  <meta http-equiv="refresh" content="1" > -->

		<title>Formulario De Registro</title>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
			<!-- My CSS style-->
     <link rel="stylesheet" type="text/css" href="estilo.css">
		 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body>
		<div class="tabla">
			<table>
				<tr>
					<th>ID</th>
					<th>שם מלא</th>
					<th>תפקיד</th>
					<th>מגדר</th>
					<th>תחביבים</th>
				</tr>
				<a href="index.php" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>חזרה לרישום</a>

					<?php
						$consulta = "SELECT * FROM datos";
						$ejecutarConsulta = mysqli_query($enlace, $consulta);
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);

						if(!$ejecutarConsulta){
							echo"Error en la consulta";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
										<td>'.$fila[4].'</td>
										<td>'.$fila[0].'</td>
										<td>'.$fila[1].'</td>
										<td>'.$fila[2].'</td>
										<td>'.$fila[3].'</td>
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}


					?>
						
						
				
				
			</table>
		</div>
	</div>
	
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
	<script src="hobbies.js"></script>

	
	<!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	
	<script>
	 $(document).ready(function(){
    $('select').formSelect();
  });
	</script>
</body>
</html>

<?php



	if(isset($_POST['registrarse'])){
		$name =$_POST["name"];
		$roles=$_POST["roles"];
		$sexo=$_POST["sexo"];
		$hobbies = implode(', ', $_POST['hobbies']);
		$id= rand(1,99);
		$insertarDatos = "INSERT INTO datos VALUES('$name',
												   '$roles',
													'$sexo',
													'$hobbies',
													'$id')";

		$ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

		if(!$ejecutarInsertar){
			echo"Error En la linea de sql";
		}



	}
?>



