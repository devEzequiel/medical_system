<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/password-login.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h1 id="h1-redefine">Cadastre uma nova senha</h1>
            <form id="form-redefine"  action="scripts/updatePass.php" method="post">
                <label for="email-redefine" class="label-redefine">Email de Cadastro:</label></br>
                <input type="mail" id="email-redefine" class="email-redefine" name="email" placeholder="Digite seu email" required>
                
                <label for="email-codigo" class="label-redefine">Código Recebido:</label></br>
                <input type="mail" id="email-codigo" class="email-redefine" name="hash" placeholder="Insira o Código" required>
                
                <label for="email-senha" class="label-redefine">Nova Senha:</label></br>
                <input type="mail" id="email-senha" class="email-redefine" name="pass" placeholder="Indira uma nova senha" required>

                <input type="submit" class="senha-redefine" value="Alterar Senha">
            </form>
            <a id="voltar" href="<?php echo BASE_URL?>password-login.php">Voltar</a>
        </div>
    </div>
</body>
</html>