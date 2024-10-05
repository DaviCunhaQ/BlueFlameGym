<?php

session_start();
include_once ('config.php');
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('Location: login.php');
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
}
;

$idusuario_padrao = $_SESSION['idusuario_padrao'];
$selectfoto = "SELECT usuario_foto FROM usuario_padrao WHERE idusuario_padrao = '$idusuario_padrao'";
$resultselectfoto = $conexao->query($selectfoto);
$foto_user = $resultselectfoto->fetch_assoc()['usuario_foto'];
$selectnome = "SELECT usuario_nome FROM usuario_padrao WHERE idusuario_padrao = '$idusuario_padrao'";
$resultselectnome = $conexao->query($selectnome);
$nome_user = $resultselectnome->fetch_assoc()['usuario_nome'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            background-color: #010b1f;
            text-transform: uppercase;
        }

        .cab {
            background-color: #010b1f;
            width: 100%;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .cab img {
            float: left;
            padding: 15px 30px 0 25px;
        }

        .link {
            font-size: 17px;
            padding: 32px 30px 0 25px;
        }

        .link a i{
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
        .link a i {
            margin-right: 4px;
        }

        .header__container {
            height: 70vh;
            margin: 20px;
            padding-left: 15px;
            position: relative;
            padding-top: 2rem;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            align-items: center;
            gap: 2rem;
        }

        .header__content h4 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 600;
            color: #0099ff;
        }

        .header__content h1 {
            width: 50vw;
            margin-bottom: 1rem;
            font-size: 5rem;
            font-weight: 600;
            line-height: 6rem;
            color: #fff;
        }

        .header__content h1 span {
            -webkit-text-fill-color: transparent;
            -webkit-text-stroke: 2px #0099ff;
        }


        .header__content p {
            padding-right: 30px;
            margin-bottom: 2rem;
            color: #fff;
        }
        .header__image img{
            display: flex;
            justify-content: center;
            width: 850px; 
            margin: auto;
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
                <a href="treino_user.php"><i class="bi bi-clipboard2-fill"></i> MINHA FICHA</a>
                <a href="dicas.php"><i class="bi bi-chat-right-fill"></i> DICAS</a>
                <a href="logout.php"><i class="bi bi-arrow-left-circle-fill"></i> LOGOUT</a>
            </div>
        </div>

        <div class="header__container" data-aos="fade-down">
            <div class="header__content" data-aos="fade-right" data-aos-duration="1000">
                <span class="bg__blur"></span>
                <span class="bg__blur header__blur"></span>
                <h4>SEJA BEM-VINDO à</h4>
                <h1>SUA ÁREA DE <br> <span>TREINAMENTO</span></h1>
                <p>
                    Liberte o seu potencial e embarque numa jornada rumo a uma pessoa mais forte, em forma e mais
                    confiante.
                    Venha fazer parte da Blue Fame' e testemunhe a incrível transformação de que seu corpo é capaz!
                </p>
            </div>
            <div class="header__image" data-aos="zoom-in" data-aos-duration="1000">
                <img style="" src="src/img/Remove-bg.ai_1716333015658.png"
                    alt="header" />
            </div>
        </div>
    </header>
</body>
<script>
  AOS.init();
</script>

</html>