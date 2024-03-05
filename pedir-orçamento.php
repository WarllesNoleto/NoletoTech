<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conexão com o banco de dados usando PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Define o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepara a consulta SQL para inserir os dados do formulário na tabela "Orcamentos"
    $stmt = $conn->prepare("INSERT INTO Orcamentos (nome, telefone, email, solicitacao) VALUES (:nome, :telefone, :email, :solicitacao)");
    
    // Associa os valores do formulário aos parâmetros da consulta SQL
    $stmt->bindParam(':nome', $_POST['nome']);
    $stmt->bindParam(':telefone', $_POST['telefone']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':solicitacao', $_POST['solicitacao-de-orcamento']);
    
    // Executa a consulta SQL
    $stmt->execute();

    // Redireciona de volta para a página inicial após o envio do formulário
    header("Location: index.html");
    exit();
} catch(PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
}
?>
