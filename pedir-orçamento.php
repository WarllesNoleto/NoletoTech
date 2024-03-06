<?php
// Verifica se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $nome = limpar_dados($_POST['nome']);
    $telefone = limpar_dados($_POST['telefone']);
    $email = limpar_dados($_POST['email']);
    $solicitacao = limpar_dados($_POST['solicitacao-de-orcamentos']);

    // Configurações do banco de dados
    $servername = "localhost";
    $username = "root"; // seu nome de usuário do MySQL
    $password = ""; // sua senha do MySQL
    $dbname = "noletodev"; // nome do seu banco de dados

    // Conectando ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Prepara a consulta SQL usando prepared statement
    $sql = "INSERT INTO solicitacao_de_orcamentos (nome, telefone, email, solicitacao) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $telefone, $email, $solicitacao);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Orçamento enviado com sucesso!";
    } else {
        echo "Erro ao enviar o orçamento: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}

// Função para limpar os dados
function limpar_dados($dados) {
    $dados = trim($dados);
    $dados = stripslashes($dados);
    $dados = htmlspecialchars($dados);
    return $dados;
}
?>
