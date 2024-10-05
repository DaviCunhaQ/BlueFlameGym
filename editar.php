<?php

if (!empty($_GET['idusuario_padrao'])) {

    include_once ('config.php');

    $id = $_GET['idusuario_padrao'];

    $sqlSelect = "SELECT*FROM usuario_padrao WHERE idusuario_padrao = $id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['usuario_nome'];
            $telefone = $user_data['usuario_telefone'];
            $email = $user_data['usuario_email'];
            $senha = $user_data['usuario_senha'];
        }
        ;
    } else {
        header('Location: corpinho.php');
    }
    ;


}
$sqltreino = "SELECT*FROM treino ORDER BY idtreino DESC";
$resulttreino = $conexao->query($sqltreino);

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script>
        function formatar(mascara, documento) {
            var i = documento.value.length;
            var saida = mascara.substring(0, 1);
            var texto = mascara.substring(i)

            if (texto.substring(0, 1) != saida) {
                documento.value += texto.substring(0, 1);
            }
        }
    </script>

    <script type="text/javascript" src="cidades.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="cadastro2.css">
    <title>DaleDelivery</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background: linear-gradient(135deg, #0099ff, #010b1f);
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container .title::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 30px;
            background: linear-gradient(135deg, #0099ff, #010b1f);
        }

        .container form .user-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: calc(100% / 2 - 20px);
        }

        .input-box {
            flex: 1 1 calc(50% - 10px);
            margin: 5px;
        }

        .input-box.full-width {
            flex: 1 1 100%;
            display: flex;
            justify-content: center;
        }

        .input-box.full-width input {
            width: 50%;
        }

        .user-details .input-box .details {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .user-details .input-box input {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box input:hover {
            border-color: #0099ff;
        }

        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            color: #fff;
            outline: none;
            border: none;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            border-radius: 5px;
            background: linear-gradient(135deg, #0099ff, #010b1f);
            cursor: pointer;
        }

        form .button input:hover {
            background: linear-gradient(-135deg, #0099ff, #010b1f);
        }

        form .button p {
            color: #111;
            font-size: 14px;
            text-align: center;
            margin-top: 15px;
        }

        form .button p a {
            text-decoration: none;
            color: #ff6247;
        }

        #cidade {
            height: 45px;
            width: 100%;
            background-color: #fff;
            outline: none;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user-details .input-box #cidade:hover {
            border-color: #ff6247;
        }

        .text-fild {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .text-fild .label {
            margin-bottom: 5px;
            font-weight: 500;
        }

        select {
            background-color: #fff;
            margin-bottom: 15px;
            flex-direction: column;
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            border-bottom-width: 2px;
        }

        select:hover {
            border-color: #0099ff;
        }

        /* Estilos básicos para option */
        option {
            padding: 10px;
            background-color: #fff;
        }

        input[name="fotoexec"] {
            padding: 8px 3px;
        }

        .title a {
            float: right;
            color: #010b1f;
            text-transform: uppercase;
            text-decoration: none;
            font-size: 16px;
        }

        .title a i {

            font-size: 18px;
            padding: 0 5px;
        }




        @media(max-width: 584px) {
            .container {
                max-width: 100%;
            }

            form .user-details .input-box {
                margin-bottom: 15px;
                width: 100%;
            }

            .container form .user-details {
                max-height: 300px;
                overflow-y: scroll;
            }

            .user-details::-webkit-scrollbar {
                width: 0;
            }
        }
    </style>
    <div class="container">
        <div class="title">
            Cadastre-se
            <a href="corpinho.php">voltar <i class="bi bi-arrow-left-circle-fill"></i></a>

        </div>
        <form action="saveEdit.php" method="POST">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Nome</span>
                    <input type="text" placeholder="Digite Seu Nome" name="nome" value="<?php echo $nome ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Telefone</span>
                    <input type="text" placeholder="Digite Seu Telefone" name="telefone" required maxlength="13"
                        onkeypress="formatar('##-#####-####', this)" value="<?php echo $telefone ?>">
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Digite Seu Email" name="email" value="<?php echo $email ?>"
                        required>
                </div>
                <div class="input-box">
                    <span class="details">Senha</span>
                    <input type="text" placeholder="Digite Sua Senha" value="<?php echo $senha ?>" required>
                </div>
                <div class="input-box">
                    <span class="details">Confirme Senha</span>
                    <input type="password" placeholder="Confirme Sua Senha" name="senha" value="<?php echo $senha ?>"
                        required>
                </div>
                <div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Atualizar" name="update" id="update">
            </div>
        </form>
    </div>
</body>

</html>