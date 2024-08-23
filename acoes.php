<?php
session_start();
require 'config.php';
//FUNCAO PARA CRIAR USUARIOS
//VARIAVEL RECEBE O INPUT INSERIDO PELO USUARIO
if (isset($_POST['create_usuario'])) {
	$name = $_POST["Name"];
	$cpf = $_POST["Cpf"];
	$email = $_POST["Email"];
	$numero = $_POST["Numero"];
	$endereco = $_POST["Endereco"];
	
	//INSERINDO OS DADOS NO BANCO DE DADOS
	$query = "Insert into dados (name,cpf,email,numero,endereco) VALUES ('$name', '$cpf', '$email', '$numero', '$endereco' )";

    $result = mysqli_query($conn, $query);

	//VERIFICACAO SE DER CERTO OU NAO
	if (mysqli_affected_rows($conn) > 0) {
		$_SESSION['mensagem'] = 'Cliente Adicionado com sucesso';
		header('Location: site.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Cliente não foi Adicionado';
		header('Location: site.php');
		exit;
	}


}
//FUNCAO PARA EDITAR DADOS DO CLIENTE
if (isset($_POST['update_usuario'])) {
	$dados_id = mysqli_real_escape_string($conn, $_POST['dados_id']);
	$nome = mysqli_real_escape_string($conn, trim($_POST['name']));
	$cpf = mysqli_real_escape_string($conn, trim($_POST['cpf']));
	$email= mysqli_real_escape_string($conn, trim($_POST['email']));
	$numero = mysqli_real_escape_string($conn, trim($_POST['numero']));
	$endereco = mysqli_real_escape_string($conn, trim($_POST['endereco']));

	//COMANDO EM SQL PARA FAZER O UPDATE
	$sql = "UPDATE dados SET name = '$nome', cpf = '$cpf',  email = '$email', numero = '$numero', endereco = '$endereco' ";
	
	$sql .= " WHERE id = '$dados_id'";
	mysqli_query($conn, $sql);
	//VERIFICA SE DEU CERTO OU NAO
	if (mysqli_affected_rows($conn) > 0) {
		$_SESSION['mensagem'] = 'Usuário atualizado com sucesso';
		header('Location: site.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Usuário não foi atualizado';
		header('Location: site.php');
		exit;
	}
}
//METODO PARA EXCLUIR 
if (isset($_POST['delete_usuario'])) {
	$dados_id = mysqli_real_escape_string($conn, $_POST['delete_usuario']);
	$sql = "DELETE FROM dados WHERE id = '$dados_id'";
	mysqli_query($conn, $sql);
	//VERIFICA SE DEU CERTO OU NAO
	if (mysqli_affected_rows($conn) > 0) {
		$_SESSION['message'] = 'Usuário deletado com sucesso';
		header('Location: site.php');
		exit;
	} else {
		$_SESSION['message'] = 'Usuário não foi deletado';
		header('Location: site.php');
		exit;
	}
}
?>