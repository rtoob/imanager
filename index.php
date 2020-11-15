<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="formulario";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error";
	}
?>
<!DOCTYPE html>
<html lang="he" dir="rtl">
    <head>
        <meta charset="utf-8"> 
		<title>iManager</title>
		<!-- Compiled and minified CSS Materialize FrameWork -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<!-- My CSS style -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    </head>
    <body>

			<!-- Form -->
				<div class="contenedor">
					<form action="tabla.php" class="formulario" id="formulario" name="formulario" method="POST">
						<div class="contenedor-inputs">
							<input type="text" name="name" placeholder="שם מלא">
								<div class="roles">
									<label> תפקיד </label>
									<select name="roles">
											<option value="" disabled selected> לבחור תפקיד</option>
											<option value="1">Manager</option>
											<option value="2">Sales</option>
											<option value="3">Customer Service</option>
											<option value="4">development</option>
											<option value="5">IT</option>
									</select>
						</div>
						
				<div class="sexo">
					<input type="radio" name="sexo" id="hombre" value="זכר">
					<label class="label-radio hombre" for="hombre">זכר</label>

					<input type="radio" name="sexo" id="mujer" value="נקבה">
					<label class="label-radio mujer" for="mujer">נקבה</label>
				</div>


				<div class="input-field col s12">
   			 <select name="hobbies" multiple="multiple">
					<option value="" disabled selected>לבחור תחביב</option>

	 				 <option value="1">Computer Programming</option>
	 					 <option value="2">Photography</option>
	 						 <option value="3">Cooking</option>
	 							 <option value="4">Dance</option>
	 								 <option value="5">Learning</option>
   				 </select>
		
  </div>
	
<br>
<br>

				<ul class="error" id="error"></ul>
			</div>
			<br>
			<br>
		
		<input type="submit" class="btn" name="registrarse" value="שלח" style="background-color: #90a4ae;">

			<br>
			<br>
		</form>


	
	</div>
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
	crossorigin="anonymous"></script>
	
	<!-- Compiled and minified JavaScript MaterializeCSS-->
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
		$hobbies=$_POST["hobbies"];
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
