<?php
session_start();
if($_SESSION['nome']){
    $nome = $_SESSION['nome'];
    echo "Seja muito bem agradado, $nome";

}else{
    echo "Essa não éw a primeira etapa, logue primeiro";
}