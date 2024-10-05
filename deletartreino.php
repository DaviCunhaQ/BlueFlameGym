<?php

    if(!empty($_GET['idtreino'])){
        include_once('config.php');

        $idtreino = $_GET['idtreino'];

        $sqlSelect_treino = "SELECT*FROM treino WHERE idtreino = $idtreino";

        $result_treino = $conexao->query($sqlSelect_treino);

        if($result_treino->num_rows > 0){
            $sqlDelete_treino = "DELETE FROM treino WHERE idtreino = $idtreino";
            $resultDelete_treino = $conexao->query($sqlDelete_treino);
        }
    }
    
    header('Location: estruturaficha.php');

?>