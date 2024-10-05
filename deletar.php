<?php

    if(!empty($_GET['idusuario_padrao'])){
        include_once('config.php');

        $id = $_GET['idusuario_padrao'];

        $sqlSelect = "SELECT*FROM usuario_padrao WHERE idusuario_padrao = $id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            $sqlDelete = "DELETE FROM usuario_padrao WHERE idusuario_padrao = $id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    
    header('Location: corpinho.php');

?>