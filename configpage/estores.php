<?php
include("AES.class.php");

$a = $_GET['open'];
$f = $_GET['close'];

if ($a == 1 || $a == 2)
	abrir($a);
if ($f == 1 || $f == 2)
        fechar($f);

$aviso ='';

function abrir($a){
    if ($a == 1)
 	$ip = '192.168.*.*'; //ESP8266 Ip Address
    $porta = 80;
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($socket, $ip, $porta);

    $msg = "ABRIR";
    $password = "1234567890abcdef";
    $metodo = "ECB";
    $iv = "";
    $aes = new AES($password, $metodo, $iv);
    $encrypted = $aes->encrypt($msg);

    $send = socket_send($socket, $encrypted, strlen($encrypted),0);
    if (isset($send)){
    socket_close($socket);
    $aviso = "Função abrir chamada";
    }
}

function fechar($f){

    if ($f == 1)
    $ip = '192.168.*.*'; //ESP8266 Ip Address
    $porta = 80;
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($socket, $ip, $porta);

    $msg = "FECHAR";
    $password = "1234567890abcdef";
    $metodo = "ECB";
    $iv = "";
    $aes = new AES($password, $metodo, $iv);
    $encrypted = $aes->encrypt($msg);

   $send= socket_send($socket, $encrypted, strlen($encrypted),0);
    if (isset($send)){
    	socket_close($socket);
   	$aviso = "Função abrir chamada";
    }
}
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
<div id="content" align="center">
    <h1 id="h1">Modo de Estores Manual</h1>
    <img id="Image-Maps-Com-image-maps-2016-04-13-111115" src="assets/CasaFrente2.png" border="0" width="900" height="700" orgWidth="900" orgHeight="700" usemap="#image-maps-2016-04-13-111115" alt="" />
    <map name="image-maps-2016-04-13-111115" id="ImageMapsCom-image-maps-2016-04-13-111115">
        <area  alt="" title="" href="estores.php?open=1" shape="rect" coords="200,467,255,490" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="estores.php?close=1" shape="rect" coords="258,467,315,490" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="estores.php?open=2" shape="rect" coords="574,467,631,490" style="outline:none;" target="_self"     />
        <area  alt="" title="" href="estores.php?close=2" shape="rect" coords="633,467,690,490" style="outline:none;" target="_self"     />
        <area shape="rect" coords="898,698,900,700" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
    </map><div class="error"><?php echo $aviso ?></div>
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
