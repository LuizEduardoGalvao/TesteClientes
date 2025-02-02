<?php
    session_start();

    //PUXANDO A CONEXAO COM O BANCO DE DADOS
    require_once "config.php";


    //METODO POST PARA LOGIN/CADASTRO
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    //FAZ O SELECT NO BANCO DE DADOS VERIFICANDO SE TEM ALGUMA CONTA CADASTRADA, CASO NAO TENHA VAI APARECER QUE TEM ALGO INCORRETO 
    $sql = "SELECT * FROM users WHERE name = ? AND email = ?";

    
    $stmt = $conn->prepare($sql);
    $stmt ->bind_param("ss", $name, $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc(); 

        if (password_verify($password, $row['password'])) {

            $_SESSION["loggedin"] = true; 

            header("Location: site.php"); 
            exit; 

        }
    }

    else {
        $error = "Usuário ou senha incorretos";
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css"> 
</head>
<body>
    
    <h1>Login</h1>
    
    <form method="post" action="index.php">
        Nome: <input type="text" name="name" required><br>

        E-mail: <input type="email" name="email" required><br>

        Senha: <input type="password" name="password" required><br>

        <input type="submit" value="Logar">

    </form>
    <br>
    <a href="cadastrar.php">Ainda não é cadastrado?</a>

</body>
</html>