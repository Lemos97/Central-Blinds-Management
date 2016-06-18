<?php
session_start();
include('conn.php');
$error = ""; // Variável que guarda os erros
if(isset($_POST["submit"]))
{
    if(empty($_POST["utilizador"]) || empty($_POST["senha"]))
    {
        $error = "Both fields are required.";
    }else
    {
        // Definição dos campos de utilizador e password
        $username=$_POST['utilizador'];
        $password=$_POST['senha'];
        // Proteção contra MySqlInjection
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($db, $username);
        $password = mysqli_real_escape_string($db, $password);
        $password = md5($password);
        // Verificação dos campos de username e password da bd
        $sql="SELECT id FROM login WHERE users='$username' and password='$password'";
        $result=mysqli_query($db,$sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        // Se o username e a password existirem na bd, cria uma sessão;
        // Senão dá erro.
        if(mysqli_num_rows($result) == 1)
        {
            $_SESSION['username'] = $username; // Inicio da sessão
            header("location: config.php"); // Redirecionamento para a página config.php
        }else
        {
            $error = "Incorrect username or password.";
        }
    }
}
?>