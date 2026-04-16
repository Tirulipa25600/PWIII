<?php
session_start();

require "Usuario.class.php";
$usuario = new Usuario();

if( isset($_POST['nome']) ){
    $nome  = $_POST['nome']; 
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $conn = $usuario->conecta();
    
    if( $conn ){
        $user = $usuario->checkUser($email);
        if( !$user ){
            $user = $usuario->inserirUsuario($nome, $email, $senha);
            if($user){
                $_SESSION['nome'] = $nome;
                header("Location:home.php");
            }else{
                echo "Erro ao cadastrar o Usuario.";
            }
        }else{
            echo "Usuario JA CADASTRADO. Vá para o Login";
            exit();
        }
    }else{
        echo "Banco indisponivel, tente mais tarde!";
    }
}

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuario</title>
</head>
<body>
    <h2>Cadastro de Usuarios</h2>
    <form action="" method = "post">
        <input type="text"     name = "nome"  placeholder = "Informe o nome"> <br><br>
        <input type="text"     name = "email" placeholder = "Informe o email"><br><br>
        <input type="password" name = "senha" placeholder = "Informe a senha"><br><br>
        <input type="submit"   name = "btn" value="Cadastrar">
    </form>
    
</body>
</html>