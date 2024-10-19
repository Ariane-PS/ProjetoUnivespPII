<?php
session_start();
require 'conexao.php';
if (isset($_POST['create_usuario'])) {
	$ferramenta = mysqli_real_escape_string($conexao, trim($_POST['ferramenta']));
	$obra = mysqli_real_escape_string($conexao, trim($_POST['obra']));
	$data_locacao = mysqli_real_escape_string($conexao, trim($_POST['data_locacao']));
	$loja = mysqli_real_escape_string($conexao, trim($_POST['loja']));
	// $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : '';
	$sql = "INSERT INTO ferramentas (ferramenta, obra, data_locacao, loja) VALUES ('$ferramenta', '$obra', '$data_locacao', '$loja')";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Ferramenta adicionada com sucesso';
		header('Location: home.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Ferramenta não foi adicionada';
		header('Location: home.php');
		exit;
	}
}
if (isset($_POST['update_ferramenta'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
	$ferramenta = mysqli_real_escape_string($conexao, trim($_POST['ferramenta']));
	$obra = mysqli_real_escape_string($conexao, trim($_POST['obra']));
	$data_locacao = mysqli_real_escape_string($conexao, trim($_POST['data_locacao']));
	$loja = mysqli_real_escape_string($conexao, trim($_POST['loja']));
	$sql = "UPDATE ferramentas SET ferramenta = '$ferramenta', obra = '$obra', data_locacao = '$data_locacao', loja = '$loja'";
	$sql .= " WHERE id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['mensagem'] = 'Ferramenta atualizado com sucesso';
		header('Location: home.php');
		exit;
	} else {
		$_SESSION['mensagem'] = 'Ferramenta não foi atualizado';
		header('Location: home.php');
		exit;
	}
}
if (isset($_POST['delete_usuario'])) {
	$usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);
	$sql = "DELETE FROM ferramentas WHERE id = '$usuario_id'";
	mysqli_query($conexao, $sql);
	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['message'] = 'Ferramenta deletado com sucesso';
		header('Location: home.php');
		exit;
	} else {
		$_SESSION['message'] = 'Ferramenta não foi deletada';
		header('Location: home.php');
		exit;
	}
}
?>