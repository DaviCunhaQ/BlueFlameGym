<?php

session_start();
include_once 'config.php';
$idtreino = $_SESSION['idtreino'];
$sqlexec = "SELECT*FROM exercicio WHERE treino_idtreino = '$idtreino' ORDER BY idexercicio DESC";
$resultsqlexec = $conexao->query($sqlexec);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>

<body>
    <style>
        #checklist {
            --text: #414856;
            --check: #4f29f0;
            --disabled: #c3c8de;
            --width: 100px;
            --height: 180px;
            --border-radius: 10px;
            width: var(--width);
            height: var(--height);
            border-radius: var(--border-radius);
            position: relative;
            padding: 30px 85px;
            display: grid;
            grid-template-columns: 30px auto;
            align-items: center;
            justify-content: center;
        }

        #checklist label {
            color: var(--text);
            position: relative;
            cursor: pointer;
            display: grid;
            align-items: center;
            width: fit-content;
            transition: color 0.3s ease;
            margin-right: 20px;
        }

        #checklist label::before,
        #checklist label::after {
            content: "";
            position: absolute;
        }

        #checklist label::before {
            height: 2px;
            width: 8px;
            left: -27px;
            border-radius: 2px;
            transition: background 0.3s ease;
        }

        #checklist label:after {
            height: 4px;
            width: 4px;
            top: 8px;
            left: -25px;
            border-radius: 50%;
        }

        #checklist input[type="checkbox"] {
            -webkit-appearance: none;
            -moz-appearance: none;
            position: relative;
            height: 15px;
            width: 15px;
            outline: none;
            border: 0;
            margin: 0 15px 0 0;
            cursor: pointer;
            background: var(--background);
            display: grid;
            align-items: center;
            margin-right: 20px;
        }

        #checklist input[type="checkbox"]::before,
        #checklist input[type="checkbox"]::after {
            content: "";
            position: absolute;
            height: 2px;
            top: auto;
            background: #0099ff;
            border-radius: 2px;
        }

        #checklist input[type="checkbox"]::before {
            width: 0px;
            right: 60%;
            transform-origin: right bottom;
        }

        #checklist input[type="checkbox"]::after {
            width: 0px;
            left: 40%;
            transform-origin: left bottom;
        }

        #checklist input[type="checkbox"]:checked::before {
            animation: check-01 0.4s ease forwards;
        }

        #checklist input[type="checkbox"]:checked::after {
            animation: check-02 0.4s ease forwards;
        }

        #checklist input[type="checkbox"]:checked+label {
            color: var(--disabled);
            animation: move 0.3s ease 0.1s forwards;
        }

        #checklist input[type="checkbox"]:checked+label::before {
            background: var(--disabled);
            animation: slice 0.4s ease forwards;
        }

        #checklist input[type="checkbox"]:checked+label::after {
            animation: firework 0.5s ease forwards 0.1s;
        }

        @keyframes move {
            50% {
                padding-left: 8px;
                padding-right: 0px;
            }

            100% {
                padding-right: 4px;
            }
        }

        @keyframes slice {
            60% {
                width: 100%;
                left: 4px;
            }

            100% {
                width: 100%;
                left: -2px;
                padding-left: 0;
            }
        }

        @keyframes check-01 {
            0% {
                width: 4px;
                top: auto;
                transform: rotate(0);
            }

            50% {
                width: 0px;
                top: auto;
                transform: rotate(0);
            }

            51% {
                width: 0px;
                top: 8px;
                transform: rotate(45deg);
            }

            100% {
                width: 5px;
                top: 8px;
                transform: rotate(45deg);
            }
        }

        @keyframes check-02 {
            0% {
                width: 4px;
                top: auto;
                transform: rotate(0);
            }

            50% {
                width: 0px;
                top: auto;
                transform: rotate(0);
            }

            51% {
                width: 0px;
                top: 8px;
                transform: rotate(-45deg);
            }

            100% {
                width: 10px;
                top: 8px;
                transform: rotate(-45deg);
            }
        }

        @keyframes firework {
            0% {
                opacity: 1;
                box-shadow: 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0, 0 0 0 -2px #4f29f0;
            }

            30% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                box-shadow: 0 -15px 0 0px #4f29f0, 14px -8px 0 0px #4f29f0, 14px 8px 0 0px #4f29f0, 0 15px 0 0px #4f29f0, -14px 8px 0 0px #4f29f0, -14px -8px 0 0px #4f29f0;
            }
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-transform: uppercase;
        }

        .ft {
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(src/img/ft-person12.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }


        .header {
            text-transform: uppercase;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header a {
            font-size: 20px;
            text-transform: uppercase;
            color: #010b1f;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .header h1 {
            font-size: 20px;
        }

        .header a:hover {
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

        th,
        td {
            margin: 0;
            padding: 15px;
            text-align: center;
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

        td a {
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
    <div class="ft">
        <div class="container">
            <div class="header">
                <h1>Exercícios</h1>
                <a href="treino_user.php">VOLTAR <i class="bi bi-arrow-left-circle-fill"></i></a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th scope="col">foto</th>
                        <th scope="col">nome</th>
                        <th scope="col">séries</th>
                        <th scope="col">repetições</th>
                        <th scope="col">descanso</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user_data_exec = mysqli_fetch_assoc($resultsqlexec)) {
                        echo "<tr>";
                        echo "<td>" . "<img style='width: 200px;' src=" . $user_data_exec['exercicio_foto'] . ">" . "</td>";
                        echo "<td id='checklist'>
                    <input checked='' value='1' name='r' type='checkbox' id='01'>
                    <label for='01'>" . $user_data_exec['exercicio_nome'] . "</td></label>
                  </td>";
                        echo "<td>" . $user_data_exec['exercicio_sets'] . "</td>";
                        echo "<td>" . $user_data_exec['exercicio_reps'] . "</td>";
                        echo "<td>" . $user_data_exec['exercicio_desc'] . "</td>";
                        echo "</tr>";
                    }
                    ;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>