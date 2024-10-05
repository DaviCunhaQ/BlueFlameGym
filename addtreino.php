<?php

session_start();
include_once ('config.php');

$idficha = $_SESSION['idficha'];
$idtreino = $_SESSION['idtreino'];
$sqlexec = "SELECT*FROM exercicio WHERE treino_idtreino = '$idtreino' ORDER BY idexercicio";
$resultexec = $conexao->query($sqlexec);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>ADD TREINO</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #0099ff, #010b1f);
            width: 100vw;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header a {
            color: #010b1f;
            text-decoration: none;
            font-weight: bold;
            margin-right: 20px;
        }

        .header a:hover{
            transition: all .3s;
            color: #007acc;
        }

        .header .btn-add-exercise {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #010b1f;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-add-exercise:hover {
            background-color: #80BFF7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
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

        img {
            border-radius: 5px;
        }

        td a{
            text-decoration: none;
            color: #010b1f;
        }

        .btn {
            display: block;
            width: 100%;
            max-width: 200px;
            padding: 10px 20px;
            margin: 20px auto;
            background-color: #0099ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #007acc;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="header">
            <a href="estruturaficha.php">VOLTAR <i class="bi bi-arrow-left-circle-fill"></i></a>
            <a href="addexec.php" class="btn-add-exercise">ADICIONAR EXERCÍCIO</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Séries</th>
                    <th scope="col">Repetições</th>
                    <th scope="col">Descanso</th>
                    <th scope="col">Alterar</th>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($user_data_exec = mysqli_fetch_assoc($resultexec)) {
                    echo "<tr>";
                    echo "<td>" . "<img style='width: 80px;' src=" . $user_data_exec['exercicio_foto'] . ">" . "</td>";
                    echo "<td>" . $user_data_exec['exercicio_nome'] . "</td>";
                    echo "<td>" . $user_data_exec['exercicio_sets'] . "</td>";
                    echo "<td>" . $user_data_exec['exercicio_reps'] . "</td>";
                    echo "<td>" . $user_data_exec['exercicio_desc'] . "</td>";
                    echo "
                                <td>
                                    <a href='deletarexec.php?idexercicio=$user_data_exec[idexercicio]'>
                                        deletar
                                    </a>
                                </td>
                                ";
                }
                ;

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>