<?php

    if(!empty($_GET['iddica'])){
        include_once('config.php');

        $iddica = $_GET['iddica'];

        $sqlSelectdica = "SELECT*FROM dica WHERE iddica = $iddica";

        $result = $conexao->query($sqlSelectdica);

        if($result->num_rows > 0){
            $sqlDeletedica = "DELETE FROM dica WHERE iddica = $iddica";
            $resultDeletedica = $conexao->query($sqlDeletedica);
        }
    }
    
    header('Location: dicas.php');

?>