<?php
    session_start();
    include_once('config.php');
    $idusuario_padrao = $_GET['idusuario_padrao'];
    $sqlidusuario_padrao = "SELECT idusuario_padrao FROM usuario_padrao WHERE idusuario_padrao = '$idusuario_padrao'";
    $resultsqlidusuario_padrao = $conexao->query($sqlidusuario_padrao);
    if ($resultsqlidusuario_padrao->num_rows > 0){
        $_SESSION['idusuario_padrao'] = $idusuario_padrao;
        header('Location: enviardica.php');
    };

?>