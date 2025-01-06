<?php include __DIR__ . '/init.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Motoristas</title>
    <link rel="shortcut icon" href="imagens/logistica.png">
</head>
<body>
    <header class="header">
        <h1>Gerenciamento de Veículos</h1>
        <nav>
            <a href="/index.php">Home</a>
            <a href="drivers.php">Gerenciar Motoristas</a>
            <a href="report.php">Reports</a>
        </nav>
    </header>
    <main class="main">
        <h2>Motoristas</h2>
        <form action="drivers.php" method="POST">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" id="nome" name="nome" maxlength="255"required>

            <label for="cpf"><strong>CPF:</strong></label>
            <input type="char(11)" id="cpf" name="cpf" required>

            <label for="data_nascimento"><strong>Data de Nascimento:</strong></label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="telefone"><strong>Telefone:</strong></label>
            <input type="CHAR(20)" id="telefone" name="telefone" required>

            <button type="submit" href="sucesso.php">Adicionar Motorista</button>
        </form>
        <h3>Motoristas cadastrados</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $stmt = $db->prepare("INSERT INTO drivers (nome, cpf, data_nascimento, endereco, telefone) VALUES (?,?,?,?,?)");
                    $stmt->execute([
                        $_POST['nome'],
                        $_POST['cpf'],
                        $_POST['data_nascimento'],
                        $_POST['endereco'],
                        $_POST['telefone']
                    ]);
                }?>
            </tbody>
        </table>
    </main>
    <footer class="footer">
        <p>&copy; Gerenciador de Riscos e Rotas - 2025</p>
    </footer>
</body>
</html>