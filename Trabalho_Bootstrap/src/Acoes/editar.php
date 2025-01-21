<?php

$db = new PDO(dsn: 'sqlite:registros.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$linha = $_GET['linha'] ?? null;

if ($linha) {

    $veiculos = $db->query('SELECT * FROM veiculos')->fetchAll(PDO::FETCH_ASSOC);

    $veiculo = $veiculos[$linha - 1] ?? null;

    if (!$veiculo) {
        die('Veículo não encontrado.');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $db->prepare("UPDATE veiculos SET placa = ?, renavam = ?, modelo = ?, marca = ?, ano = ?, cor = ? WHERE id = ?");
        $stmt->execute([
            $_POST['placa'],
            $_POST['renavam'],
            $_POST['modelo'],
            $_POST['marca'],
            $_POST['ano'],
            $_POST['cor'],
            $veiculo['id']
        ]);
        header('Location: ../index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Veículo</title>
</head>
<body>
    <h1>Editar Veículo</h1>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($veiculo['id']) ?>">
        <label>Placa:</label>
        <input type="text" name="placa" value="<?= htmlspecialchars($veiculo['placa']) ?>" required><br>
        <label>Renavam:</label>
        <input type="text" name="renavam" value="<?= htmlspecialchars($veiculo['renavam']) ?>" required><br>
        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?= htmlspecialchars($veiculo['modelo']) ?>" required><br>
        <label>Marca:</label>
        <input type="text" name="marca" value="<?= htmlspecialchars($veiculo['marca']) ?>" required><br>
        <label>Ano:</label>
        <input type="number" name="ano" value="<?= htmlspecialchars($veiculo['ano']) ?>" required><br>
        <label>Cor:</label>
        <input type="text" name="cor" value="<?= htmlspecialchars($veiculo['cor']) ?>" required><br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>