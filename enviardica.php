<?php

session_start();
include_once ('config.php');
$idusuario_padrao = $_SESSION['idusuario_padrao'];
if (isset($_POST['submit-dica'])) {
    $dica = $_POST['dica'];
    $resultdica = mysqli_query($conexao, "INSERT INTO dica(dica_desc, usuario_padrao_idusuario_padrao) VALUES ('$dica', '$idusuario_padrao')");
    echo "<p class='not;' style='color: #0099ff; display: flex; align-itens: center; text-align: center; background-color: #ccc; padding: 8px 8px; border-radius: 7px;' >
    DICA ENVIADA COM SUCESSO!
    </p>";
    echo "<br>";

}
;


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dica</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100vw;
            background: linear-gradient(135deg, #0099ff, #010b1f);
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            flex-direction: column;
        }

        .container {
            text-align: center;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 30%;
            max-width: 4500px;
        }

        .container a {
            display: inline-block;
            margin-bottom: 20px;
            color: #0099ff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .container a:hover {
            color: #010b1f;
        }

        .container h1 {
            margin-bottom: -10px;
            font-size: 24px;
            color: #333333;
        }

        .container textarea {
            margin: 8px;
            width: 90%;
            height: 100px;
            padding: 10px;
            align-items: center;
            border: 0.5px solid #ddd;
            border-radius: 5px;
            resize: none;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #333333;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        .container textarea:focus {
            border-color: #0099ff;
        }

        .container input[type="submit"] {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container input[type="submit"]:hover {
            background-color: #0056b3;
        }

        
    </style>
</head>

<body>
    <div class="container">
        <a href="corpinho.php">voltar <i class="bi bi-arrow-left-circle-fill"></i></a>
        <br>
        ÁREA DE ENVIAR DICAS
        <form action="enviardica.php" method="POST">
            <textarea name="dica" placeholder="Escreva a dica aqui"></textarea>
            <input type="submit" value="Enviar" name="submit-dica">
        </form>
    </div>
</body>

</html>