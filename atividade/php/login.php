<?php
session_start();
if(isset($_POST['email'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    require 'Usuario.class.php';
    $usuario = new Usuario();
    $conn = $usuario->conectar();
    if($conn){
        $email = $usuario->checkUser($email);
        if($email){
            $user = $usuario->checkPass($email, $senha);
            if($user){
                $_SESSION['nome'] = "Teste";
                header("Location:home.php");
            }else{
                echo "Usuario ou senha errados, seu burro apressado!";
            }
        }else{
            echo "Esse usuario eu nunca vi meu nobre...";
        }
    }else{
        echo "Erro ao se conectar... não tente novamente";
    }
}else{
    echo "Banco não veio, nunca mais tente de novo...";
}

