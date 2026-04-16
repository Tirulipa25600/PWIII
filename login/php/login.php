<?php
session_start();
require "Usuario.class.php";
$usuario = new Usuario();

$connection = $usuario->conecta();
if( $connection ){
   
    if( isset($_POST['email'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $user = $usuario->checkUser( $email );
        
        if( $user ){
            $user = $usuario->checkPass($email, $senha);
            echo "usuario e senha";
            $_SESSION['nome'] = $nome;
            header("Location:home.php");
        }else{
            echo "Usuario nao cadastrado!";
            header("Location:cadastrar.php");
        }
    } 
}else{
    echo "Banco indisponivel. Tente mais Tarde!";
    exit();
}