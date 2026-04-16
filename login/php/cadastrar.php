<?php

if (isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
    $senha   = $_POST['senha'];
    $email   = $_POST['email'];
    echo "Nome - $usuario Email - $email Senha - $senha";
}