<?php

$db = new PDO('sqlite:db/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM veiculos WHERE id = ?");
    $stmt->execute([$id]);
    $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$vehicle) {
        echo "Veículo não encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $placa = $_POST['placa'];
    $renavam = $_POST['renavam'];
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];

    // Atualizar no banco de dados
    $stmt = $db->prepare("UPDATE veiculos SET placa = ?, renavam = ?, modelo = ?, marca = ?, ano = ?, cor = ? WHERE id = ?");
    $stmt->execute([$placa, $renavam, $modelo, $marca, $ano, $cor, $id]);

    header("Location: veiculos.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pr-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style_editar.css">
    <title>Editar Veículos</title>
</head>
<body>
    <header>
        <nav class="navegacao">
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
    </header>
    <br>
    <h1>Editar Veículo</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($vehicle['id']) ?>">
        <label for="placa">Placa:</label>
        <input type="text" name="placa" id="placa" value="<?= htmlspecialchars($vehicle['placa']) ?>" required>
        <br>
        <label for="renavam">Renavam:</label>
        <input type="text" name="renavam" id="renavam" value="<?= htmlspecialchars($vehicle['renavam']) ?>">
        <br>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" value="<?= htmlspecialchars($vehicle['modelo']) ?>" required>
        <br>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" id="marca" value="<?= htmlspecialchars($vehicle['marca']) ?>" required>
        <br>
        <label for="ano">Ano:</label>
        <input type="number" name="ano" id="ano" value="<?= htmlspecialchars($vehicle['ano']) ?>" required>
        <br>
        <label for="cor">Cor:</label>
        <input type="text" name="cor" id="cor" value="<?= htmlspecialchars($vehicle['cor']) ?>" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
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
