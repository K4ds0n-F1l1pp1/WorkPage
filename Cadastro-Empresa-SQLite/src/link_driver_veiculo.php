<?php

$db = new PDO('sqlite:db/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$drivers = $db->query("SELECT * FROM drivers")->fetchAll(PDO::FETCH_ASSOC);
$veiculos = $db->query("SELECT * FROM veiculos")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $driver_id = $_POST['drivers_id'];
    $vehicle_id = $_POST['veiculo_id'];

    $stmt = $db->prepare("UPDATE drivers SET veiculo_id = ? WHERE id = ?");
    $stmt->execute([$veiculo_id, $drivers_id]);

    echo "Motorista atualizado com sucesso!";
    header("Location: ../../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ligar Motoristas aos Veículos</title>
</head>
<body>
    <h1>Associar Motorista a Veículo</h1>

    <form method="POST">
        <label for="drivers_id">Selecione o Motorista:</label>
        <select name="drivers_id" id="drivers_id" required>
            <option value="">Escolha um motorista</option>
            <?php foreach ($drivers as $driver): ?>
                <option value="<?= $drivers['id'] ?>">
                    <?= $driver['nome'] ?> (ID: <?= $drivers['id'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="veiculo_id">Selecione o Veículo:</label>
        <select name="veiculo_id" id="veiculo_id" required>
            <option value="">Escolha um veículo</option>
            <?php foreach ($veiculos as $veiculo): ?>
                <option value="<?= $veiculo['id'] ?>">
                    <?= $veiculo['modelo'] ?> - <?= $veiculo['placa'] ?> (ID: <?= $veiculo['id'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <button type="submit">Salvar Associação</button>
    </form>
</body>
</html>