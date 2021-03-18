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
            <h1>Esqueceu a senha?</h1>
            <p>Não tem problema! Informe seu email e enviaremos um código de confirmação.</p>
            <form action="scripts/forgotPass.php" method="post">
                <label for="email-missing">Email de Cadastro:</label></br>
                <input type="mail" id="email-missing" name="email" placeholder="Digite seu email" required>

                <?php 
                    if (isset($_GET['erro']) && $_GET['erro'] == "email"){
                ?>
                    <p>Não tem problema! Informe seu email e enviaremos um código de confirmação.</p>
                <?php
                    }
                ?>

                

                <input type="submit" id="senha-missing" value="Receber Código">
            </form>
            <a id="voltar" href="<?php echo BASE_URL?>">voltar</a>
        </div>
    </div>
</body>
</html>