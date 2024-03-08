<?php
require_once 'config.php';

$usuario = "WarllesNoleto";
$Senha = "Warlles992433584@";

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $usuariodigitado = $_POST["usuario"];
    $senhadigitada = $_POST["senha"];
}

if(($usuariodigitado === $usuario) and ($senhadigitada === $Senha))
{
    $sql = "SELECT * FROM orcamentos";
    $result = $conn->query($sql);
}else {
    echo"<h1>Senha Incorreta!</h1>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoletoTech - Painel de controle</title>
    <link rel="stylesheet" href="estilos/painel-de-controle.css">
</head>
<body>

    <header class="header">
        <a href="index.html" class="logo">Noleto<span class="destaque-logo">Tech</span></a>
        <a href="index.html#orcamentos" class="botao-destaque">Faça Seu orçamento!</a>
    </header>

    <main class="container">
        <form method="post" class="formulario" id="orcamentos">
        
            
                <div class="conteudo-formulario">
                    <label>Usuário: <span class="destaque-label">*</span></label>
                    <input type="text" name="usuario" placeholder="Digite o seu usuário" required class="caixa-de-dados-formulario">
                </div>
                <div class="conteudo-formulario">
                    <label>Senha: <span class="destaque-label">*</span></label>
                    <input type="password" name="senha" placeholder="digite sua senha" required class="caixa-de-dados-formulario">
                </div>
            
            <button type="submit" class="botao-formulario">Entrar</button>
        </form>

<section class="mensagens-banco-de-dados">
    
            <?php if(isset($result) && $result->num_rows > 0) : ?>
                <h2>Mensagens</h2>
                <ul>
                    <?php while($row = $result->fetch_assoc()) : ?>
                        <li>
                            <strong>ID: </strong> <?php echo $row["id"]; ?> <br>
                            <strong>Nome: </strong> <?php echo $row["nome"]; ?> <br>
                            <strong>Telefone: </strong> <?php echo $row["telefone"]; ?> <br>
                            <strong>E-mail: </strong> <?php echo $row["email"]; ?> <br>
                            <strong>Solicitação: </strong> <?php echo $row["solicitacao"]; ?> <br>
                            <strong>Data e Hora: </strong> <?php echo $row["data"]." às ".$row["hora"]; ?> <br>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p>Nenhuma mensagen encontrada!</p>
            <?php endif; ?>
</section>

    </main>

    <footer class="footer">
        <p>Todos os direitos reservados</p>
        <p class="destaque-footer">Termos de privacidade - Todos os direitos reservados – Termos de Uso</p>
    </footer>
</body>
</html>