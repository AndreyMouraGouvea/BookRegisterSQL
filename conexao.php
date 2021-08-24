<?php
$servidor = "localhost";
$usuario = "root";
$senha = "usbw";
$banco = "meubanco";
$con = new mysqli($servidor,$usuario,$senha,$banco);
if(!$con){
    echo "Erro de Conexão!".$con->error;
}

?>