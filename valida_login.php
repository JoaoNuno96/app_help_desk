<?php

	session_start();

//variável verifica se a autenticacao foi realizada

$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => "Administrativo" , 2 => "Usuário");

//relaçao usuarios do sistema

$usuarios_app = [
	["id" => 1, "email" => "admn@teste.pt", "senha" => "123456", "perfil_id" => 1],
	["id" => 2, "email" => "user@teste.pt", "senha" => "123456", "perfil_id" => 1],
	["id" => 3, "email" => "jose@teste.pt", "senha" => "123456", "perfil_id" => 2],
	["id" => 4, "email" => "maria@teste.pt", "senha" => "123456", "perfil_id" => 2]
];

foreach($usuarios_app as $user){

	if($user["email"] == $_POST["email"] && $user["senha"] == $_POST["senha"]){
		$usuario_autenticado = true;
		$usuario_id = $user["id"];
		$usuario_perfil_id = $user["perfil_id"];
	}

}

if($usuario_autenticado == true){
		$_SESSION['autenticado'] = "SIM";
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header("Location: home.php");
	}else{
		$_SESSION['autenticado'] = "NAO";
		header("Location: index.php?login=erro");
	}



?>