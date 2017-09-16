<?php


function getUsuario($nm_usuario, $senha){
    $conn = new mysqli("10.0.0.105", "root", "", "os");
    $conn->query('SET NAMES utf8');
    
    $sql = "SELECT * FROM usuario WHERE nm_usuario = '$nm_usuario' AND senha = '$senha' "; 
    $result = $conn->query($sql);
    
    $row = mysqli_fetch_array($result);
    
    return $row;
}

