<?php
session_start();
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        //acessa
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario_padrao WHERE usuario_email = '$email' and usuario_senha = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else{
            $_SESSION['email'] = 'email';
            $_SESSION['senha'] = 'senha';
            header('Location: sistema_usuario.php');
        }
    }
    else{
        //não acessa
        header('Location: login.php');
    }
    

?>