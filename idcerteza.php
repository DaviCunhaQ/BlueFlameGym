<?php

include_once 'config.php';
$idficha = $_GET['idficha'];
$sqlDelete_ficha = "DELETE FROM ficha WHERE idficha = '$idficha'";
$resultDelete_ficha = $conexao->query($sqlDelete_ficha);
header('Location:fichas.php')

?>