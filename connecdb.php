<?php
$mysqli = new mysqli("localhost","root","","dropzone") or die("Connect failed: %s\n". $mysqli -> error);
$acentos = $mysqli->query("SET NAMES 'utf8'");
?>