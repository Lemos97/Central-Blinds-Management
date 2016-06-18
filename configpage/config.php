<?php
include("check.php");
include("estados.php");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>GCE - Gestão Central de Estores // Menu de Configuração</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<div id="content">
<div id="status">
    <h1 id="h1">Bem Vindo á Gestão Central de Estores , </h1>
    <p align="right">
        <?php echo $user_check; ?>
    </p>
</div>
</div>
<div id="BarraMenu">
    <div class="menudrop1">
        <button class="menu1">Configurações</button>
        <div class="ItensMenu">
            <a href="config.php">Página Inicial</a>
            <br/>
            <a href="manual.php">Modo Manual</a>
            <br/>
            <a href="horarios.php">Configuração de Horário</a>
            <br/>
        </div>
    </div>
    <div class="menudrop2">
        <button class="menu2">Perfil</button>
        <div class="ItensMenu2">
            <a href="password_reset.php">Mudar Palava-Passe</a>
            <br/>
            <a href="logout.php">Logout</a>
            <br/>
        </div>
    </div>
</div>
</body>
</html>
