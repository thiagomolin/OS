<?php

require_once('getUsuario.php');

session_start();

if(!empty($_POST['nm_usuario']) && !empty($_POST['senha'])){
    $nm_usuario = $_POST['nm_usuario'];
    $senha = $_POST['senha'];
    $_SESSION['senha'] = $senha;
    $_SESSION['nm_usuario'] = $nm_usuario;
}else{
    $nm_usuario = $_SESSION['nm_usuario'];
    $senha = $_SESSION['senha'];
}

$usuario = getUsuario($nm_usuario, $senha);


if($usuario == null){
    header('location:../html/login.php?incorreto=true');
}else{
    header('location:../html/index.php');
}