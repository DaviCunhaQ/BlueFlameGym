<?php
session_start();
    if(isset($_POST['submit-personal']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
        //acessa
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM personal WHERE personal_email = '$email' and personal_senha = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('Location: login_personal.php');
        }
        else{
            $_SESSION['email'] = 'email';
            $_SESSION['senha'] = 'senha';
            header('Location: sistema.php');
        }
    }
    else{
        //não acessa
        header('Location: login_personal.php');
    }

?>