<?php
include("check.php");
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
        <h1 id="h1">Mudar Palavra Passe</h1>
            <?php
            echo "Olá " .$user_check . ",<br> Aqui poderás mudar a sua palavra passe.";
            ?>
        <form action="" method="POST" align="center">
            <br><br>
            <input type="password" name="pass" placeholder="Palavra Passe Nova"  style="height:50px; width:300px "><br><br>
            <input type="password" name="repetepass" placeholder="Repete a Palavra Passe" style="height:50px; width:300px "><br><br><br>
            <input id="botao" type="submit" name="password_reset" value="Alterar">
            <?php
            $error = ""; // Variável que guarda os erros
            if (isset($_POST['password_reset'])) {
            if (empty($_POST['pass']) || empty($_POST['repetepass'])) {
            $error ="Ambos os campos têm que ser preenchidos.";
            } else {
                $passnova = $_POST['pass'];
                $passrepetida=$_POST['repetepass'];
                if ($passnova != $passrepetida){
                    $error = "Ambos os campos têm que ser iguais.";
                } else {
                    $passmd5=md5($passnova);

                    $alterar ="UPDATE `login` SET `password`='$passmd5' WHERE `users`='$user_check'";

                    if (mysqli_query($db, $alterar) == true){
                        $error = "Password alterada com sucesso.";
                    } else {
                        $error = "Erro a alterar a palavra pass.";
                  }
                }
              }
            }
            ?>
            <br><br>
            <div class="error"><?php echo $error; ?></div>
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
