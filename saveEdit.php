<?php
    include_once('config.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sqlUpdate = "UPDATE usuario_padrao SET usuario_nome = '$nome', usuario_telefone = '$telefone',usuario_email = '$email', usuario_senha = '$senha'
        WHERE idusuario_padrao = '$id'";
        $result = $conexao->query($sqlUpdate);
    };

    header('Location:corpinho.php')
?>