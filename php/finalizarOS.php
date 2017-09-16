<?php

$id = $_POST['id'];

$conn = new mysqli("10.0.0.105", "root", "", "os");
$conn->query('SET NAMES utf8');

$sql = "UPDATE os SET dt_conclusao = now(), fk_status = 3 WHERE id = '$id'"; 
$conn->query($sql);

header('location:../html/index.php?finalizada=success');
