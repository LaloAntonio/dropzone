<?php 
$target_dir = "upload/";
$target_file = $target_dir.basename($_FILES['file']['name']);
$msg = "";
if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
	$msg = "Subido Correctamente";
}else{
	$msg = "Error al Subir";
}
echo $msg;
 ?>
