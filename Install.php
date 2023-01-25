<?php
    //install.php 
    //Ele vai criar a base de dados

    include 'config.php';

    //criar a base de dados
    $ligacao = new PDO("mysql:host=$host",$user,$password);
    $motor =$ligacao->prepare("CREATE DATABASE $base_dados");
    $motor->execute();
    $ligacao = null;

    echo'<p> Base de dados criada com sucesso.</p><hr>';
    
    $ligacao = new PDO("mysql:dbname=$base_dados;host=$host",$user,$password);
    // Criar a tabela users

    $sql = "CREATE TABLE users(
        id_user     INT NOT NULL PRIMARY KEY,
        username    VARCHAR(30),
        pass        VARCHAR(100),
        avatar      VARCHAR(250)
        
        )";

        $motor = $ligacao->prepare($sql);
        $motor->execute();

    echo '<p>Tabela "users" criada com sucesso.</p>';

    // Criar a tabela POSTS

    $sql = "CREATE TABLE posts(
        id_post     INT NOT NULL PRIMARY KEY,
        id_user     INT NOT NULL,
        titulo      VARCHAR(100),
        mensagem    TEXT,
        data_post   DATETIME,
        FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE)";

        $motor = $ligacao->prepare($sql);
        $motor->execute();
        $ligacao = null;

    echo '<p>Tabela "posts" criada com sucesso.</p>';
    echo '<p>Processo de criação da base de dados terminado com sucesso.</p>';


?>