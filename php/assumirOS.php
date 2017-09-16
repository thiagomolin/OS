<?php

$id = $_POST['id'];
$id_usuario = $_POST['id_usuario'];

$conn = new mysqli("10.0.0.105", "root", "", "os");
$conn->query('SET NAMES utf8');

$sql = "UPDATE os SET fk_usuario = '$id_usuario', dt_assumida = now(), fk_status = 2 WHERE id = '$id'"; 
$conn->query($sql);

header('location:../html/index.php?assumida=success');
