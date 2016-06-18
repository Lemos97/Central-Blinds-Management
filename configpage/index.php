<?php
include('login.php'); // Uso do ficheiro login.php

if ((isset($_SESSION['username']) != ''))
{
    header('Location: config.php');
}
?>
<!DOCTYPE html>
<html>
<head lang="pt">
    <meta charset="UTF-8">
    <title>GCE - Gestão Central de Estores</title>
    <link href="styles/styles.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
<div id="content">
<div id="logo" align="center">
    <img src="assets/Biggerlogotipo2.gif">
</div>
<div id="login">
    <form method="post" action="">
        <br/>
        Log In:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="text" name="utilizador" placeholder="Utilizador..." />
        <br/><br/>
        Password:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="password" name="senha" placeholder="Senha..." />
        <br/><br/>
        <input id="botao" name="submit" type="submit" value="Login"/>
        <br/><br/>
    </form>
    <div class="error"><?php echo $error;?></div>
</div>
</div>
</body>
</html>