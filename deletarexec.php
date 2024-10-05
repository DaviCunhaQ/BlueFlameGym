<?php

    if(!empty($_GET['idexercicio'])){
        include_once('config.php');

        $idexercicio = $_GET['idexercicio'];

        $sqlSelect_exec = "SELECT*FROM exercicio WHERE idexercicio = $idexercicio";

        $resultexec = $conexao->query($sqlSelect_exec);

        if($resultexec->num_rows > 0){
            $sqlDelete_exec = "DELETE FROM exercicio WHERE idexercicio = $idexercicio";
            $resultDelete_exec = $conexao->query($sqlDelete_exec);
        }
    }
    
    header('Location: addtreino.php');

?>