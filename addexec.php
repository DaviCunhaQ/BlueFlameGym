<?php

session_start();
$idficha = $_SESSION['idficha'];
$idtreino = $_SESSION['idtreino'];

if (isset($_POST['submit-exec'])){

    include_once ('config.php');
    $nomeexec = $_POST['nome-exercicio'];
    $fotoexec = $_FILES['foto'];
    $nomedafotoexec = $fotoexec['name'];
    $novo_nomeexec = uniqid();
    $pastaexec = './foto_exec/';
    $extensaoexec = strtolower(pathinfo($nomedafotoexec, PATHINFO_EXTENSION));
    if ($extensaoexec != 'jpg' && $extensaoexec != 'png')
        die('TIPO DE ARQUIVO INDESEJADO');
    $pathexec = $pastaexec . $novo_nomeexec . "." . $extensaoexec;
    $deucertoexec = move_uploaded_file($fotoexec["tmp_name"], $pathexec);
    $reps = $_POST['reps'];
    $sets = $_POST['sets'];
    $descanso = $_POST['descanso'];


    if ($deucertoexec) {
        $resultexec = mysqli_query($conexao, "INSERT INTO exercicio(exercicio_nome, exercicio_sets, exercicio_reps, exercicio_desc, exercicio_foto, treino_idtreino)
                VALUES ('$nomeexec', '$sets', '$reps', '$descanso', '$pathexec', '$idtreino')");
        header("Location:addtreino.php");
    } else
        echo ('falha ao enviar arquivo');
};



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>ADICIONAR EXERCÍCIO</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background-image:  linear-gradient(to right, #0099ff, #010b1f);
            text-transform: uppercase;
        }

        .number-control {
            display: flex;
            align-items: center;
        }
        .number-control input{
            border: none;
            padding: 5px 0;
            width: 100%;
        }

        .number-left::before,
        .number-right::after {
            content: attr(data-content);
            background-color: linear-gradient(to right, #0099ff, #010b1f);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid black;
            width: 20px;
            color: white;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .number-left::before {
            content: "-";
        }

        .number-right::after {
            content: "+";
        }

        .number-quantity {
            padding: 0.25rem;
            border: 0;
            width: 50px;
            -moz-appearance: textfield;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .number-left:hover::before,
        .number-right:hover::after {
            background-color: #666666;
        }


        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 30%;
        }
        .box a{
            margin-bottom: 7px;
            text-decoration: none;
            color: #0099ff;
            display: flex;
            justify-content: center;
        }
        .box a i{
            margin-right: 2px;
        }

        fieldset {
            border: 3px solid dodgerblue;
        }

        legend {
            letter-spacing: 2px;
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }

        .inputBox {
            position: relative;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }

        #submit-exec {
            background-image: linear-gradient(to right, #0099ff, #010b1f);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit-exec:hover {
            background-image: linear-gradient(to right, #0099ff, #010b1f);
        }
    </style>
</head>

<body>
    <div class="box">
        <form enctype="multipart/form-data" action="addexec.php" method="POST">
            <a href="addtreino.php">VOLTAR  <i class="bi bi-arrow-left-circle-fill"></i></a>
            <fieldset>
                <legend><b>Adicionar Exercício</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome-exercicio" id="nome-exercicio" class="inputUser" required>
                    <label for="nome-exercicio" class="labelInput">Nome do Exercício</label>
                </div>
                <br><br>
                <p>Repetições</p>
                <div class="number-control">

                    <input type="number" name="reps" class="number-quantity">

                </div>
                <br><br>
                <p>Séries</p>
                <div class="number-control">

                    <input type="number" name="sets" class="number-quantity">

                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="descanso" id="descanso" class="inputUser" required>
                    <label for="descanso" class="labelInput">Descanso</label>
                    <br><br>
                </div>

                <div class="inputBox">
                    <span class="details">Foto</span>
                    <input type="file" name="foto" id="foto" class="inputUser" required>
                </div>
                    <br><br>
                    <input type="submit" name="submit-exec" id="submit-exec">
            </fieldset>
        </form>
    </div>
</body>

</html>