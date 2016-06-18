<?php
// Ficheiro de verificação se existe sessão iniciada e utilizador ligado.
include('conn.php');
session_start();
$user_check=$_SESSION['username'];
$ses_sql = mysqli_query($db,"SELECT users FROM login WHERE users='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_user=$row['username'];
if(!isset($user_check)) {
    header("Location: index.php");
}
?>