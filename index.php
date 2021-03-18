
<?php
session_start();
require "config.php";
if (isset($_SESSION['logged']) and $_SESSION['logged'] === true){
    header ("Location: http://localhost/GitHub/hospital_system/web_medico/home.php");
}
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/index.css">
    <link rel="shortcut icon" href="#">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?php echo BASE_URL?>assets/js/change_tab.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL?>assets/js/swap_background.js" type="text/javascript"></script>
    <script src="<?php echo BASE_URL?>assets/js/users.js" type="text/javascript"></script>
    <title>Login</title>
</head>
<body>
    <header>

    </header>
    <div class="container">
        <div id="div1" class="box aba">
            <form id="login" method="post" action="<?php echo BASE_URL?>scripts/login.php">
                <div class="div_text_login">
                    <h2 class="text_login">SYSTEM MEDIC</h2>
                    <h3 class="text_login">LOGIN</h3>
                </div>
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Seu Email" required/>
                <div>
                    <input type="password" id="pass" class="form-control form-control-lg" name="pass" placeholder="Senha" required/>
                </div>
                <div>
                    <a href="<?php echo BASE_URL?>password-login.php">Esqueceu a senha?</a>
                </div>
                <div>
                    <input type="submit" value="Entrar" id="login" name="enviar_login" class="btn">
                </div>
            </form>
            <div id="text_error"></div>
        </div>
        <div id="div2" class="box aba"> 
            <form id="register" action="<?php echo BASE_URL?>scripts/insert.user.php" method="post">
                <div class="div_text_login">
                    <h2 class="text_login">SYSTEM MEDIC</h2>
                    <h3 class="text_login">CADASTRAR</h3>
                </div>
                <div>
                    <input type="text" id="names" class="form-control form-control-lg name_register" name="name"  placeholder="Nome" required/>
                </div>
                <div>
                    <input type="email" id="emails" class="form-control form-control-lg mail_register" name="email" placeholder="Email" required/>
                </div>
                <div>
                    <input type="password" class="form-control form-control-lg password_register" name="pass" placeholder="Senha" id="pwds" required/>
                </div>
                <div>
                    <input type="submit" value="Cadastrar" name="enviar" class="btn" id="sign-up">
                </div>
            </form>
            <div id="text_register_error"></div>
            <div id="text_register_confirm"></div>
        </div>
        <div id="sem-linha">
                <a href="#div1" class="Login_btn borda clean_text_register" id="btn-one">LOGIN</a>
                <a href="#div2" class="Login_btn borda clean_text">CADASTRO</a>
        </div>
    </div>
</body>
</html>