<?php

session_start();
include_once ('config.php');
$idusuario_padrao = $_SESSION['idusuario_padrao'];

$sqldica = "SELECT * FROM dica WHERE usuario_padrao_idusuario_padrao = '$idusuario_padrao' ORDER BY iddica DESC";

$resultdica = $conexao->query($sqldica);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dicas</title>

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
            font-size: 16px;
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

        .container {
            width: 50%;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px #00bfff;
            border-radius: 8px;
        }

        .ft {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(src/img/ft-person12.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed; */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f6f8;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .delete-link {
            color: #d9534f;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #d9534f;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .delete-link:hover {
            background-color: #d9534f;
            color: #fff;
        }
        .link a i {
            margin-right: 2px;
        }

        @media (max-width: 600px) {
            header {
                font-size: 0.9em;
            }

            header a {
                margin: 0 10px;
            }

            th,
            td {
                padding: 10px;
            }

            .delete-link {
                padding: 5px;
            }
        }
    </style>

</head>

<body>
    <header class="section__container">
        <div class="cab">
            <div class="nav__logo">
                <img style="border-radius: 20px; width: 115px;" src="src/img/logohome.png" alt="logo" />
            </div>
            <div class="link">
                <a href="sistema_usuario.php"><i class="bi bi-houses-fill"></i> HOME</a>
                <a href="treino_user.php"><i class="bi bi-clipboard2-fill"></i> MINHA FICHA</a>
                <a href="logout.php"><i class="bi bi-arrow-left-circle-fill"></i> LOGOUT</a>
            </div>
        </div>

    </header>

    <div class="ft">
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Dicas</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user_data_dica = mysqli_fetch_assoc($resultdica)) {
                        echo "<tr>";
                        echo "<td>" . $user_data_dica['dica_desc'] . "</td>";
                        echo "<td><a href='deletardica.php?iddica=$user_data_dica[iddica]'><i class='bi bi-trash-fill'></i></a></td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>