<?php

session_start();
include_once ('config.php');
$sqlfichas = "SELECT*FROM ficha ORDER BY ficha_nome";
$resultfichas = $conexao->query($sqlfichas);
$sqlexec = "SELECT*FROM exercicio ORDER BY idexercicio DESC";
$resultexec = $conexao->query($sqlexec);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>FICHAS</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

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
            padding: 2rem 3rem;
            display: flex;
            justify-content: space-between;
        }

        .cadastro_usuario h4 {
            margin-top: 10px;
            color: #010b1f;
            margin-left: 50px;
            text-transform: uppercase;
            font-size: 19px;
        }
        .Btn {
            font-size: 16px;
            padding: 0 13px;
            margin-right: 50px;
            background-color: transparent;
            border: 1.5px solid #010b1f;
            border-radius: 30px;
        }

        .Btn a {
            color: #010b1f;
            text-decoration: none;
        }
        .Btn a:hover{
            color: #0099ff;
        }

        .Btn:hover {
            border: 1px solid #0099ff;
            transition: all .3s;
            box-shadow: 0 0 10px #0099ff;
        }

        main {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            background-color: #f9f9f9; /* Cor de fundo opcional para melhor visualização */
            height: 100vh;
        }

        /* Estilo para a tabela */
        table {
            width: 90%; /* Define a largura da tabela para 90% do contêiner */
            height: 100px;
            border-radius: 30px;
            margin: 0 auto; /* Garante que a tabela esteja centralizada */
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 10px 10px #c8c8c8;
        }

        table th, table td {
            padding: 15px; /* Espaçamento interno das células */
            text-align: left; /* Alinhamento do texto */
        }

        table th {
            color: #fff;
            background-color: #010b1f;
        }

        table a {
            color: #000;
            text-decoration: none;
            margin-right: 10px; /* Espaçamento entre os links */
        }
        
        table a:hover {
            transition: all .5s;
            color: #0099ff;
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


    </style>
    <header class="section__container">
        <div class="cab">
            <div class="nav__logo">
                <img style="border-radius: 20px; width: 115px;" src="src/img/logohome.png" alt="logo" />
            </div>
            <div class="link">
                <a href="sistema.php"><i class="bi bi-houses-fill"></i> HOME</a>
                <a href="corpinho.php"> <i class="bi bi-people-fill"></i> USUARIOS</a>
                <a href="logout_personal.php"><i class="bi bi-arrow-left-square-fill"></i> LOGOUT</a>
            </div>
        </div>

    </header>

    <div class="cadastro_usuario">
        <h4>LISTAGEM DE FICHAS</h4>
        <button class="Btn"><a href="criar_ficha.php">CRIAR FICHA</a></button>
    </div>
    
    <main>
        <table>
            <thead>
                <tr>
                    <th scope="col">N° da Ficha</th>
                    <th scope="col">nome</th>
                    <th scope="col">ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data_fichas = mysqli_fetch_assoc($resultfichas)) {
                    echo "<tr>";
                    echo "<td>" . $user_data_fichas['idficha'] . "</td>";
                    echo "<td>" . $user_data_fichas['ficha_nome'] . "</td>";
                    echo "<td>
                            <a href='estruturafichaid.php?idficha=$user_data_fichas[idficha]'>

                                Editar        
                            </a>
                            <a href='deletarficha.php?idficha=$user_data_fichas[idficha]'>
                                Deletar
                            </a>
                            </td>";
                    // $user_data_exec = mysqli_fetch_assoc($resultexec);
                    // echo "<td>
                    //             <button><a href='addexec.php?idtreino=$user_data_treino[idtreino]'>Adicionar Exercício</a></button>
                    //         </td>";
                }
                ;
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>