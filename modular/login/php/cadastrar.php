<?php
require 'Usuario.class.php';
$usuario = new Usuario();
$conn = $usuario->conecta();

if( $conn ){
    if (isset($_POST['usuario'])){
        $nome = addslashes( $_POST['usuario'] );
        $senha   = addslashes( $_POST['senha'] );
        $email   = addslashes( $_POST['email'] );

        $user = $usuario->checkUser($email);

        if($user){
            echo"<script>
                    alert('Você já está cadastrado mano. Vá embora daqui!'
                </script>";
            exit();
        }else{
            $user = $usuario->inserirUsuario($nome, $email, $senha);
            if($user){
                echo"Usuário cadastrado! Fnalmente...";
            }else{
                echo"Erro meu nobre!";
            }
        }

    }else{
        echo"Erro no Post!";
    }
}else{
    echo"<script>
            alert('Banco indisponível, tente novamente mais tarde...')
        </script>";
}