<?php 
date_default_timezone_set("America/Mexico_City");
include 'connecdb.php';
$location = 'upload/';
$date = date("Y-m-d-h-i-s");
if (isset($_FILES['file']) && $_FILES['file']['name'][0]) {
	for ($i=0;$i<count($_FILES['file']['name']);$i++) { 
		$origen=$_FILES["file"]["tmp_name"][$i];
		$namefile=$_FILES["file"]["name"][$i];
		$destino=$location.$namefile;
		if (@move_uploaded_file($origen, $destino)) {
			$insert = "INSERT INTO imagenoticia VALUE ('','$namefile','$date')";
			$query = mysqli_query($mysqli,$insert);
			if ($query) {
				echo "<br> Dato ingresado";
			}
		}else {
			echo "<br>No se ha podido mover el archivo: ".$namefile;
		}
	}
}else {
	echo "<br>No se ha subido ninguna imagen";
}
?>
