<?php

session_start();
include_once 'config.php';
$idficha = $_SESSION['idficha'];
$idusuario_padrao = $_SESSION['idusuario_padrao'];
$sqlficha = "SELECT ficha_nome FROM ficha WHERE idficha = '$idficha' ORDER BY idficha";
$resultsqlficha = $conexao->query($sqlficha);
$sqltreino = "SELECT*FROM treino WHERE ficha_idficha = '$idficha' ORDER BY idtreino";
$resultsqltreino = $conexao->query($sqltreino);
$selectfoto = "SELECT usuario_foto FROM usuario_padrao WHERE idusuario_padrao = '$idusuario_padrao'";
$resultselectfoto = $conexao->query($selectfoto);
$foto_user = $resultselectfoto->fetch_assoc()['usuario_foto'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>

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
            height: 100px;
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
            box-shadow: 0 0 10px #00bfff;
            border-radius: 30px;
            width: 35%;
            margin: auto;
            display: flex;
            justify-content: center;
            padding: 20px 25px;
            text-transform: uppercase;
            font-size: 20px;
            flex-direction: column;
            background-color: #ddd;
        }

        .ft {
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url(src/img/ft-person12.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .text {
            margin: 0;
            font-size: 3rem;
            width: 100%;
            color: #010b1f;
            text-align: center;
        }

        .juntes {
            display: inline-block;
            justify-content: center;
        }

        th.treino {
            margin: 0;
            padding-bottom: -6px;
            padding-top: 29px;
            font-size: 2rem;
            color: #010b1f;
        }

        th.treino:hover {
            color: #042d7e;
        }

        .container a {
            text-decoration: none;
            color: #042d7e;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container a i{
            margin-left: 6px;
        }
        .link a i {
            margin-right: 2px;
        }
    </style>
</head>

<body>
    <header class="section__container">
        <div class="cab">
            <div class="nav__logo">
                <img style="border-radius: 20px; width: 165px;" src="src/img/logohome.png" alt="logo" />
            </div>
            <div class="link">
                <a href="sistema_usuario.php"><i class="bi bi-houses-fill"></i> HOME</a>
                <a href="dicas.php"><i class="bi bi-chat-right-fill"></i> DICAS</a>
                <a href="logout.php"><i class="bi bi-arrow-left-circle-fill"></i> LOGOUT</a>
            </div>
        </div>
    </header>

    <div class="ft">
        <div class="container">
            <table>
                <thead>
                    <tr class="juntes">
                        <h1 class="text">
                            <?php echo $resultsqlficha->fetch_assoc()['ficha_nome'];
                            echo "<img style='width: 55px; heigth:50px; border-radius: 30px; margin-top:20px; margin-left: 15px; margin-bottom:-10px; ' src=" . $foto_user . ">" ?>
                        </h1>
                    </tr>

                    <tr>
                        <?php

                        while ($user_data_treino = mysqli_fetch_assoc($resultsqltreino)) {
                            echo "<th scope='col' class='treino'>" . $user_data_treino['treino_nome'] . "</th>";
                            echo "<tr>";
                            echo "<td><a href='idverexec.php?idtreino=$user_data_treino[idtreino]'>ver exercícios <i class='bi bi-card-checklist'></i></a></td>";
                            echo "</tr>";
                        }
                        ;

                        ?>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>

</html>