<?php
    session_start();
    include_once('config.php');
    $idficha = $_GET['idficha'];
    $sqlidficha = "SELECT idficha FROM ficha WHERE idficha = '$idficha'";
    $resultsqlidficha = $conexao->query($sqlidficha);
    if ($resultsqlidficha->num_rows > 0){
        $_SESSION['idficha'] = $idficha;
        header('Location: estruturaficha.php');
    };

?>