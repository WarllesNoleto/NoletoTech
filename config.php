<?php


//CONFIGURAÇÃO DE CREDENCIAIS
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'noletotech';

//CONEXÃO COM BANCO DE DADOS
$conn = new mysqli($server, $usuario, $senha, $banco);


//VERFIFICAR CONEXÃO
if ($conn->connect_error) {
    die("Falha ao se comunicar com banco de dados: ". $conn->connect_error);
}

?>