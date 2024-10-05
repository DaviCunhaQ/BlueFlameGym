<?php
    
    include_once('config.php');

    $idficha = $_GET['idficha'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            text-transform: uppercase;
        }

        .container a {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            transition: background-color 0.3s ease;
        }

        .container a:hover {
            background-color: #0056b3;
        }

        .container span {
            display: block;
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
            <span>VOCÊ TEM CERTEZA EM DELETAR?</span>
            <?php
                echo"<a href='fichas.php'>não</a>";
                echo"<a href='idcerteza.php?idficha=$idficha'>sim</a>";
            ?>
    </div>
</body>
</html>