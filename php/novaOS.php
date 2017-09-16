<?php

$ds_servico = $_POST['ds_servico'];
$fk_tipo_servico = $_POST['fk_tipo_servico'];
$fk_aplicacao = $_POST['fk_aplicacao'];
$fk_prioridade = $_POST['fk_prioridade'];


$conn = new mysqli("10.0.0.105", "root", "", "os");
$conn->query('SET NAMES utf8');

$sql = "INSERT INTO os (ds_servico, fk_tipo_servico, fk_aplicacao, fk_prioridade) 
        VALUES ('$ds_servico', '$fk_tipo_servico', '$fk_aplicacao', '$fk_prioridade')"; 

$conn->query($sql);


header('location:../html/index.php');