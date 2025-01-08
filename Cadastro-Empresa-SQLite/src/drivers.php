<?php include __DIR__ . '/init.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Motoristas</title>
    <link rel="shortcut icon" href="/imagens/logistica.png">
    <link rel="stylesheet" href="/css/style_drivers.css">
    <link rel="stylesheet" href="/css/style_table.css">
</head>
<body>
    <header class="header">
        <h1>Gerenciamento de Veículos</h1>
    <div class="navegacao_drivers">
        <nav>
            <ul>
                <li>
                    <button onclick="location.href='/index.php'" type="button">
                    Home</button>
                </li>
                <li>
                    <button onclick="location.href='veiculos.php'" type="button">
                    Gerenciar Veículos</button>
                </li>
                <li>
                    <button onclick="location.href='reports.php'" type="button">
                    Reports</button>
                </li>
            </ul>
        </nav>
    </div>
    </header>
    <main class="main">
        <h2>Motoristas</h2>
        <form action="drivers.php" method="POST">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" id="nome" name="nome" maxlength="255"required>

            <label for="RG"><strong>RG:</strong></label>
            <input type="text" id="rg" name="rg" maxlength="20" required>

            <label for="cpf"><strong>CPF:</strong></label>
            <input type="char(11)" id="cpf" name="cpf" maxlength="11" required>

            <label for="telefone"><strong>Telefone:</strong></label>
            <input type="CHAR(20)" id="telefone" name="telefone" maxlength="20" required>

            <button type="submit">Adicionar Motorista</button>
        </form>
        <h3>Motoristas cadastrados</h3>

        <div class="tabela_top">
            <table class="tabela">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $stmt = $db->prepare(query: "INSERT INTO drivers (nome, rg, cpf, telefone) VALUES (?,?,?,?)");
                        $stmt->execute(params: [
                            $_POST['nome'],
                            $_POST['rg'],
                            $_POST['cpf'],
                            $_POST['telefone']
                        ]);
                    }

                    $drivers = $db->query('SELECT * FROM drivers')->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($drivers as $motoristas) {
                        echo "<tr>
                                <td>{$motoristas['id']}</td>
                                <td>{$motoristas['nome']}</td>
                                <td>{$motoristas['rg']}</td>
                                <td>{$motoristas['cpf']}</td>
                                <td>{$motoristas['telefone']}</td>
                            </tr>";
                    }
                    ?>
            </table>
        </div>
        <h1>Excluir Registro</h1>
    <form method="POST" action="removedor.php">
        <label for="removerMotoristas.php">Digite o ID que deseja excluir:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Excluir</button>
    </form>

    <form method="GET" action="editar_motoristas.php">
        <label for="id">Digite o ID do motorista:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Editar</button>
    </form>
    </main>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer class="footer">
        <p>&copy; Gerenciador de Riscos e Rotas - 2025</p>
    </footer>
</body>
</html>