<?php include __DIR__ . '/init.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Veículos</title>
</head>
<body>
    <h<header class="header">
        <h1>Gerenciamento de Veículos</h1>
        <nav>
            <a href="/index.php">Home</a>
            <a href="driver.php">Manage Drivers</a>
            <a href="report.php">Reports</a>
        </nav>
    </header>
    <main class="main">
    <h2>Veículos</h2>
        <form action="vehicle.php" method="post">
            <label for="Placa">Placa:</label>
            <input type="char(7)" id="plate" name="placa" maxlength="7" required>

            <label for="renavam">Renavam:</label>
            <input type="char(20)" id="renavam" name="renavam" maxlength="30">

            <label for="model">Modelo:</label>
            <input type="char(20)" id="model" name="modelo" maxlength="20" required>

            <label for="brand">Marca::</label>
            <input type="char(20)" id="brand" name="marca" maxlength="20" required>

            <label for="year">Ano:</label>
            <input type="year" id="year" name="ano" required>

            <label for="color">Cor:</label>
            <input type="char(20)" id="color" name="cor" maxlength="20" required>

            <button type="submit">Adicionar Veículo</button>
        </form>

        <h3>Veículos Disponíveis</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Ano</th>
                    <th>Cor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $stmt = $db->prepare("INSERT INTO veiculos (placa, renavam, modelo, marca, ano, cor) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute([
                        $_POST['placa'],
                        $_POST['ranavam'],
                        $_POST['modelo'],
                        $_POST['marca'],
                        $_POST['ano'],
                        $_POST['cor']
                    ]);
                }

                $veiculos = $db->query('SELECT * FROM veiculos')->fetchAll(PDO::FETCH_ASSOC);
                foreach ($veiculos as $veiculo) {
                    echo "<tr>
                            <td>{$veiculo['id']}</td>
                            <td>{$veiculo['placa']}</td>
                            <td>{$veiculo['modelo']}</td>
                            <td>{$veiculo['marca']}</td>
                            <td>{$veiculo['ano']}</td>
                            <td>{$veiculo['cor']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer class="footer">
        <p>&copy; 2025 Vehicle Management System</p>
    </footer>
</body>
</html>