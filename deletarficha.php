<?php

    if(!empty($_GET['idficha'])){
        include_once('config.php');

        $idficha = $_GET['idficha'];

        $sqlSelect_ficha = "SELECT*FROM ficha WHERE idficha = '$idficha'";

        $resultficha = $conexao->query($sqlSelect_ficha);

        

        if($resultficha->num_rows > 0){
            $sqlDeletefichaidficha = "UPDATE usuario_padrao SET ficha_idficha = NULL WHERE ficha_idficha = '$idficha'";
            $resultDeletefichaidficha = $conexao->query($sqlDeletefichaidficha);
        }
    }
    
    header("Location: certezadeletarficha.php?idficha=$idficha");

?>