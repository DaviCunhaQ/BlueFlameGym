<?php

session_start();
include_once ('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('Location: login.php');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}
;


$sql = "SELECT*FROM usuario_padrao ORDER BY idusuario_padrao DESC";

$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="menu.js" defer></script>
    <script src="principal.js" defer></script>
    <title>USUARIOS</title>
</head>

<body>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .cab {
            background-color: #010b1f;
            width: 100%;
            height: 90px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cab img {
            float: left;
            padding: 0px 30px 0 25px;
        }

        .link {
            font-size: 14px;
            padding: 0px 30px 0 25px;
        }

        .link a i {
            margin-right: 2px;
        }

        .link a {
            margin: 0 10px;
            background-color: transparent;
            border: 1px solid #fff;
            border-radius: 20px;
            color: #fff;
            text-decoration: none;
            padding: 2px 14px 2px 14px;
        }

        .link a:hover {
            transition: all .3s;
            border: 1px solid #0099ff;
            box-shadow: 0 0 10px #00bfff;
        }

        .cadastro_usuario {
            background-color: #f9f9f9;
            padding: 2rem 6rem;
            display: flex;
            justify-content: space-between;
        }

        .cadastro_usuario h4 {
            margin-top: 10px;
            color: #010b1f;
            text-transform: uppercase;
            font-size: 19px;
        }

        .Btn {
            font-size: 13px;
            padding: 0 12px;
            background-color: transparent;
            border: 1.5px solid #010b1f;
            border-radius: 30px;
        }

        .Btn a {
            color: #010b1f;
            text-decoration: none;
        }

        .Btn:hover {
            transition: all .3s;
            box-shadow: 0 0 10px #0099ff;
            border: 1.5px solid #0099ff;
        }
        .Btn a:hover{
            color: #0099ff;
        }

        /* INICIO TABELA */
        main {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            min-height: 100vh;
            background-color: #f9f9f9;
            /* Cor de fundo opcional para melhor visualização */
        }

        .tabela {
            margin-top: -15px;
            border-radius: 30px;
            border-collapse: collapse;
            width: 90vw;
            /* Define a largura da tabela para 85% da largura da viewport */
            box-shadow: 0 7px 10px #c8c8c8;
            background-color: #fff;
        }

        .tabela th,
        .tabela td {
            padding: 15px;
            /* Espaçamento interno das células */
            text-align: left;
        }

        .tabela th {
            margin-top: 8px;
            color: #fff;
            background-color: #010b1f;
        }

        .tabela td a {
            text-decoration: none;
            margin-bottom: 5px;
            color: #000;
        }

        .tabela td a:hover {
            transition: all .5s;
            color: #0099ff;
        }
        table tbody{
            border-radius: 30px;
        }

        /* Alterna a cor das linhas */
        table tbody tr:nth-child(odd) td {
            background-color: #e9f5ff; /* Cor para linhas ímpares */
        }

        table tbody tr:nth-child(even) td {
            background-color: #d0e9ff; /* Cor para linhas pares */
        }

        table a {
            margin-right: 10px; /* Espaçamento entre os links */
        }

        .tabela img{
            height: 64px;
            width: 64px; 
            border-radius: 40px;
        }



        /*
Responsive HTML Table With Pure CSS - Web Design/UI Design

Code written by:
👨🏻‍⚕️ Coding Design (Jeet Saru)

> You can do whatever you want with the code. However if you love my content, you can **SUBSCRIBED** my YouTube Channel.

🌎link: www.youtube.com/codingdesign 
*/
    </style>


    <header class="section__container">
        <div class="cab">
            <div class="nav__logo">
                <img style="border-radius: 20px; width: 115px;" src="src/img/logohome.png" alt="logo" />
            </div>
            <div class="link">
                <a href="sistema.php"><i class="bi bi-houses-fill"></i> HOME</a>
                <a href="fichas.php"><i class="bi bi-clipboard2-check-fill"></i> FICHAS</a>
                <a href="logout_personal.php"><i class="bi bi-arrow-left-circle-fill"></i> LOGOUT</a>
            </div>
        </div>

    </header>

    <!-- <section class="banner" style="background: #fff;">
        <div class="flex2">
        </div>
    </section> -->
    <div class="cadastro_usuario">
        <h4>Listagem de Usuários</h4>
        <button class="Btn">
            <a href="cadastro.php">
                CADASTRAR USUARIO
            </a>
        </button>
    </div>
    <main>
        <section class="table_body">
            <table class="tabela">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Ficha</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . "<img src=" . $user_data['usuario_foto'] . ">" . "</td>";
                        echo "<td>" . $user_data['usuario_nome'] . "</td>";
                        echo "<td>" . $user_data['usuario_telefone'] . "</td>";
                        echo "<td>" . $user_data['ficha_idficha'] . "</td>";
                        echo "<td>" . $user_data['usuario_email'] . "</td>";
                        echo "<td>" . $user_data['usuario_senha'] . "</td>";
                        echo "
                        <td>
                            <a href='editar.php?idusuario_padrao=$user_data[idusuario_padrao]'>
                                Editar 
                            </a>
                            <br>
                            <a href='deletar.php?idusuario_padrao=$user_data[idusuario_padrao]'>
                                Deletar
                            </a>
                            <br>
                            <a href='idenviardica.php?idusuario_padrao=$user_data[idusuario_padrao]'> 

                                Enviar dica
                            </a>
                        </td>
                        ";
                    }
                    ;
                    ?>
                </tbody>
            </table>
        </section>
    </main>


    <script>
        var Texto = document.getElementById("text")

        function alterarLargura(valor, duracao) {
            $('h2').animate({ width: '+=${valor}' }, duracao)
        }
        alterarLargura(100, 100, () => {
            alterarLargura(-300, 'slow')
        })
    </script>


</body>

</html>