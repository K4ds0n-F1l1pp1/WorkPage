<?php include __DIR__ . '/init.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Motoristas</title>
    <link rel="shortcut icon" href="imagens/logistica.png">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="header">
        <h1>Gerenciamento de Veículos</h1>
    <div class="navegacao_drivers">
        <nav>
            <a href="/index.php">Home</a>
            <a href="veiculos.php">Gerenciar Veículos</a>
            <a href="reports.php">Reports</a>
        </nav>
    </div>
    </header>
    <main class="main">
        <h2>Motoristas</h2>
        <form action="drivers.php" method="POST">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" id="nome" name="nome" maxlength="255"required>

            <label for="cpf"><strong>CPF:</strong></label>
            <input type="char(11)" id="cpf" name="cpf" maxlength="11" required>

            <label for="RG"><strong>RG:</strong></label>
            <input type="text" id="rg" name="rg" maxlength="20" required>

            <label for="data_nascimento"><strong>Data de Nascimento:</strong></label>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <label for="telefone"><strong>Telefone:</strong></label>
            <input type="CHAR(20)" id="telefone" name="telefone" maxlength="20" required>

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
                        $_POST['telefone']
                    ]);
                }

                $drivers = $db->query('SELECT * FROM drivers')->fetchAll(PDO::FETCH_ASSOC);
                foreach ($drivers as $motoristas) {
                    echo "<tr>
                            <td>{$motoristas['id']}</td>
                            <td>{$motoristas['nome']}</td>
                            <td>{$motoristas['cpf']}</td>
                            <td>{$motoristas['data_nascimento']}</td>
                            <td>{$motoristas['telefone']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer class="footer">
        <p>&copy; Gerenciador de Riscos e Rotas - 2025</p>
    </footer>
</body>
</html>