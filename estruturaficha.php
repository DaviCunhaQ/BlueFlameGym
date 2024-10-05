<?php

session_start();
include_once ('config.php');

$idficha = $_SESSION['idficha'];

$sqltreino = "SELECT*FROM treino WHERE ficha_idficha = '$idficha' ORDER BY idtreino";

$resulttreino = $conexao->query($sqltreino);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Montar ficha</title>

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Arial', sans-serif;
            color: #333;
            background: linear-gradient(135deg, #0099ff, #010b1f);
            width: 100vw;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 50vw;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            font-size: 20px;
            color: #333;
        }

        .container a {
            margin-right: 7px;
            color: #010b1f;
            text-decoration: none;
            font-weight: bold;
        }

        .container a:hover {
            color: #aaa;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        table a {
            text-decoration: none;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #010b1f;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #d0e9ff;
        }

        tr {
            background-color: #e9f5ff;
        }

        form.btn {
            width: 20%;
        }
        .btn-container {
            display: flex;
            justify-content: center;
        }
        .btn {
            padding: 0px 20px;
            border: none;
            color: #fff;
            background-color: #0099ff;
            text-align: center;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn input {
            width: 100%;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            color: #fff;
            background-color: #0099ff;
            border: none;
        }
        .btn:hover {
            background-color: #007acc;
        }
        .btn input:hover {
            background-color: #007acc;
        }
    </style>


</head>

<body>

    <div class="container">

        <div class="header">
            <h2>Estrutura da Ficha</h2>
            <div>
                <a href="fichas.php">VOLTAR <i class="bi bi-arrow-left-circle-fill"></i></a>
                <a href="criar_treino.php">ADD TREINO</a>
            </div>
        </div>

        <form action="estruturaficha.php" method="POST">

            <table>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome do treino</th>
                        <th scope="col">ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user_data_treino = mysqli_fetch_assoc($resulttreino)) {
                        echo "<tr>";
                        echo "<td>" . $user_data_treino['idtreino'] . "</td>";
                        echo "<td>" . $user_data_treino['treino_nome'] . "</td>";
                        echo "
                             <td>
                                 <a href='idaddtreino.php?idtreino=$user_data_treino[idtreino]'>
                                     Editar
                                 </a>
                                 <a href='deletartreino.php?idtreino=$user_data_treino[idtreino]'>
                                     Deletar
                                 </a>
                             </td>";
                    }
                    ;
                    ?>
                </tbody>
            </table>
            <br>
            <div class="btn-container">
                <button class="btn">
                    <input type="submit" value="Atualizar" name="submit-ficha-treino">
                </button>
        </form>
    </div>
    </div>
</body>

<!-- 'idaddtreino.php?idtreino=$user_data_treino[idtreino]' -->

</html>