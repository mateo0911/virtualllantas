<?php
include 'varconstan.php';
include 'conexion.php';
$db = Db::Connect(HOST, USER, PASS, DB) or die('Error al conectarse a la base de datos');//metodos estaticos solo uso ::
?>