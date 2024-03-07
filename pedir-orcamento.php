<?php

// PEGANDO DADOS VINDO DO FORMULÁRIO
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$solicitacao_orcamento = $_POST["solicitacao_orcamento"];
$data_atual = date("d/m/Y");
$hora_atual = date("H:i:s");

//CONFIGURAÇÃO DE CREDENCIAIS
$server = "localhost";
$usuario = "root";
$senha = "";
$banco = "noleto_tech";

//CONEXÃO COM BANCO DE DADOS
$conn = new mysqli($server, $usuario, $senha , $banco);


//VERFIFICAR CONEXÃO
if ($conn->connect_error) {
    die("Falha ao se comunicar com banco de dados: ". $conn->connect_error);
}

$smtp = $conn->prepare("INSERT INTO  solicitacao_de_orcamentos (nome, telefone, email, solicitacao_orcamento, data, hora) VALUES (?,?,?,?,?,?)");
$smtp->bind_param("ssssss", $nome, $telefone, $email, $solicitacao_orcamento, $data_atual, $hora_atual);

if ($smtp->execute()){
    echo"Mensagem Enviada com sucesso!";
}else{
    echo "Erro no envio da mensagem ".$smtp->error;;
}

$smtp->close();
$conn->close();

?>