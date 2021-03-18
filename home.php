<?php
require "scripts/authenticate.php";
require "config.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/home.css">
<link rel="stylesheet" href="<?php echo BASE_URL?>assets/css/formulario.css">
<link rel="shortcut icon" href="#">
<script src="<?php echo BASE_URL?>assets/js/change_tab.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL?>assets/js/swap_background.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL?>assets/Verification-form/mask_input.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL?>assets/js/insertMedic.js"></script>
<script src="<?php echo BASE_URL?>assets/js/screenMedics.js"></script>
<script src="<?php echo BASE_URL?>assets/js/deleteMedic.js"></script>
<script src="<?php echo BASE_URL?>assets/js/inputModal.js"></script>
<script src="<?php echo BASE_URL?>assets/js/updateMedic.js"></script>
<script src="<?php echo BASE_URL?>assets/js/searchDoctor.js"></script>
<script src="<?php echo BASE_URL?>assets/js/employees.js"></script>
<script src="<?php echo BASE_URL?>assets/js/emailDoc.js"></script>

<title>Home</title>
</head>
<body>
    <div id="mySidenav" class="sidenav">
        <ul id="sem-linha">
            <li><a href="#home" class="borda" id="borda1" >médicos</a></li>
            <li><a href="#Services" class="borda" id="borda2">funcionários</a></li>
            <li><a href="#Clientes" class="borda" id="borda3" data-toggle="modal" data-target="#site" >sobre o sistema</a></li>
            <li><a href="#Contato" class="borda" id="borda4"  data-toggle="modal" data-target="#site">CONTATO</a></li>
        </ul>
      
    </div>
    <header id="menu" >
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a  id="sem_requisicao" class="navbar-brand" href="#">SYSTEM MEDIC</a>
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li id="div_right" class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['login']; ?>
              </a>
              <div class="dropdown-menu cor-sair" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="scripts/logout.php" >Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <div id="pag">
        <?php include_once "assets/elements/tabmedico.php"?> <!-- Tabela com as informações dos médicos-->

        <?php include_once "assets/elements/tabfuncionario.php"?><!-- Tabela com as informações dos funcionarios-->
        
        <?php include_once "assets/elements/aboutsystem.php"?>
            
        <div id="Contato" class="aba" style="margin-left: 50px">

            <h3>Desenvolvedores:</h3><br>
            <h5>Diego Santos (Front-End):</h5><br>
            <a href="https://github.com/King-ego/">GitHub</a><br>
            <a href="https://www.linkedin.com/">LinkedIn</a><br>
            <a href="https://www.facebook.com/">Facebook</a><br>
            <a href="https://www.twitter.com/">Twitter</a><br>

            <br><br>
            <h5>Ezequiel Oliveira (Back-End & JQuery/Ajax):</h5><br>
            <a href="https://github.com/devEzequiel/">GitHub</a><br>
            <a href="https://www.linkedin.com/in/ezequiel-s-oliveira-a909b51b9/">LinkedIn</a><br>
            <a href="https://www.facebook.com/ezequiel.s.oliveira.79/">Facebook</a><br>
            <a href="https://www.twitter.com/">Twitter</a><br>


            
            

        </div>
    </div>

    <?php include_once "assets/modal/modal_medico.php"?> <!-- Janela modal com o formulario dos médicos-->
    <?php include_once "assets/modal/editing_mode_doctor.php"?><!--Janela modal de edição dos medicos-->
    <?php include_once "assets/modal/modal_mail_doctor.php"?>

    <?php include_once "assets/modal/modal_funcionarios.php"?> <!-- Janela modal com o formulario dos funcionarios-->
    <?php include_once "assets/modal/editing_mode_employee.php"?>
    <?php include_once "assets/modal/modal_mail_employee.php"?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </body>
</html>
