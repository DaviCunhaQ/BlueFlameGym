<?php
    session_start();
    include_once('config.php');
    $idtreino = $_GET['idtreino'];
    $sqlidtreino = "SELECT idtreino FROM treino WHERE idtreino = '$idtreino'";
    $resultsqlidtreino = $conexao->query($sqlidtreino);
    if ($resultsqlidtreino->num_rows > 0){
        $_SESSION['idtreino'] = $idtreino;
        header('Location: addtreino.php');
    };

?>