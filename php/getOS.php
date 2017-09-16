<?php


$conn = new mysqli("10.0.0.105", "root", "", "os");
$conn->query('SET NAMES utf8');

$sql = "SELECT os.id, os.fk_status, os.fk_usuario, os.fk_aplicacao, os.fk_prioridade, os.fk_tipo_servico, usuario.nm_usuario, os.ds_servico, aplicacao.nm_aplicacao, tipo_servico.ds_tipo_servico, prioridade.ds_prioridade, status.ds_status, os.dt_registro, os.dt_conclusao, os.dt_assumida 
        FROM os 
        INNER JOIN aplicacao ON os.fk_aplicacao = aplicacao.id 
        INNER JOIN prioridade ON os.fk_prioridade = prioridade.id 
        INNER JOIN status ON os.fk_status = status.id 
        INNER JOIN tipo_servico ON os.fk_tipo_servico = tipo_servico.id 
        LEFT JOIN usuario ON usuario.id = os.fk_usuario
        ORDER BY prioridade.nr_grau_prioridade DESC"; 
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)){
    $OSs[] = $row;
}
