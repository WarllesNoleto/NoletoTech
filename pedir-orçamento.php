<?php
// Verifica se os dados foram submetidos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $solicitacao = $_POST['solicitacao-de-orcamentos'];

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

    // Prepara a consulta SQL
    $sql = "INSERT INTO solicitacao_de_orcamentos (nome, telefone, email, solicitacao) VALUES ('$nome', '$telefone', '$email', '$solicitacao')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Orçamento enviado com sucesso!";
    } else {
        echo "Erro ao enviar o orçamento: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}
?>
