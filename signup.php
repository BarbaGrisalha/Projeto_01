<?php
    //signup.php 
    	session_start();
unset($_SESSION['user']);//aqui estamos a limpar a variável para evitar que entrem via "cookies2

include 'cabecalho.php';

//Verificar se foi inseridos dados de utilizador
if (!isset($_POST['btn_submit']))
{
    ApresentarFormulario();
}
else{
    RegistarUtilizador();
}
include 'rodape.php';

//Funções
function ApresentarFormulario(){
    //apresenta o formulário para adição do novo utilizador
    echo '<form class="form_signup" method="POST" action="signup.php?a=signup" enctype="multipart/form-data">
   
    <h3>Signup</h3><hr><br>
   Username:<br><input type="text" size="20" name="text_utilizador"><br><br>

   Password:<br><input type="password" size="20" name="text_password_1"><br><br>

   Reescrever Password:<br><input type="password" size="20" name="text_password_2"><br><br>
   
   <input type="hidden" name="MAX_FILE_SIZE" value="50000">

   Avatar:<input type="file" name="image_avatar"><br><small>(imagem do tipo <strong>JPG</strong>, tamanho máximo:<strong>50kb</strong>)</small><br><br>

   <input type="submit" name="btn_submit" value="Registar"><br><br>

   <a href="index.php">Voltar</a>

    </forma>
    ';
}
    
function RegistarUtilizador(){
    //executar as operações necessárias para o registo de um novo utilizador
    $utilizador = $_POST['text_utilizador'];
    $password_1 = $_POST['text_password_1'];
    $password_2 = $_POST['text_password_2'];
    $avatar = $_FILES['image_avatar'];
    $erro = false;

    //Verificação de erros do utilizador
    if($utilizador =="" || $password_1 == "" || $password_2 == ""){
        echo '<div class="erro">Não foram preenchidos os campos necessários.</div>';
        $erro = true;
    }
    else if($password_1 !=$password_2){
        echo '<div class="erro">As passwords não coincidem.</div>';
        $erro = true;
    } else if ($avatar['name'] != "" && $avatar['type'] != "image/jpeg") {
        echo '<div class="erro">Ficheiro de imagem inválido.</div>';
        $erro = true;

    }
   /* else if($avatar['name'] != "" && $avatar['size'] > $_POST ['MAX_FILE_SIZE']){
        echo '<div class="erro">Ficheiro de imagem maior de que o permitido</div>';
        $erro = true;
    }*/
    if($erro){
        ApresentarFormulario();
        include 'rodape.php';
        exit;
    }
}



    ?>