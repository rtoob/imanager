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
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
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
											<option value="Manager">Manager</option>
											<option value="Sales">Sales</option>
											<option value="Customer Service">Customer Service</option>
											<option value="development">development</option>
											<option value="IT">IT</option>
									</select>
						</div>
						
				<div class="sexo">
					<input type="radio" name="sexo" id="hombre" value="זכר">
					<label class="label-radio hombre" for="hombre">זכר</label>

					<input type="radio" name="sexo" id="mujer" value="נקבה">
					<label class="label-radio mujer" for="mujer">נקבה</label>
				</div>


				<div name="hobbies" class="input-field col s12">
				<select name="hobbies[]" id="hobbies" multiple>
					<option value="" disabled selected>לבחור תחביב</option>
	 				 <option value="Computer Programming">Computer Programming</option>
	 					 <option value="Photography">Photography</option>
	 						 <option value="Cooking">Cooking</option>
	 							 <option value="Dance">Dance</option>
	 								 <option value="Learning">Learning</option>
   				 </select>
		
  </div>
	
<br>
<br>

				<ul class="error" id="error"></ul>
			</div>
			<br>
			<br>
		
		<input type="submit" class="btn"  name="registrarse" value="שלח" style="background-color: #90a4ae;">

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
	<script src="js/hobbies.js"></script>
	<script>
	 $(document).ready(function(){
    $('select').formSelect();
  });
	</script>
<script type="text/javascript">
        $(document).ready(function() {
            $('.hobbies').select2();
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
