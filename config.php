<?php

if(!isset($_SESSION)){
session_start();
}


    $servername = "localhost";
    $username = "luiz";
    $password = "123456";
    $dbname = "loginn";


    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>