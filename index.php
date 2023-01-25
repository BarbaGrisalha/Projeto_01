<?php
//index.php
session_start();

$sessao_user = null;

if(isset($_SESSION['user']))
{
    include 'cabecalho.php';
    echo '<div class="mensagem"><strong>' . $_SESSION['user'] . '</strong> já se encontra logado no site<br><a href="forum.php">Avancar</a></div>';
    include 'rodape.php';
    exit;

}

include 'cabecalho.php';
if($sessao_user == null){
    include 'login.php';
}
include 'rodape.php';


?>