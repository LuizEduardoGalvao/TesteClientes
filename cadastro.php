<?php

    require_once "config.php"; 

    /* PEGANDO OS DADOS DIGITADOS PELO USUARIO E USANDO O METODO POST PARA INSERIR NO BANCO DE DADOS*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("sss", $name, $email, $hashed_password); 

        if ($stmt->execute()) {
            echo "Usuário criado com sucesso";
            header('Location: index.php');
        } else {
            echo "Erro: " . $sql . "<br>" . $coon->error;
        }

        $stmt->close();


    }
    $conn->close();