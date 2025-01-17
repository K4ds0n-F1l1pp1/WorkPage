<?= include __DIR__ .'/eventos/processa.php'; ?>

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
        <label for="motoristas_id">Selecione o Motorista:</label>
        <select name="motoristas_id" id="motoristas_id" required>
            <option value="">Escolha um motorista</option>
            <?php foreach ($motoristas as $motora): ?>
                <option value="<?= $motora['id'] ?>">
                    <?= $motora['nome'] ?> (ID: <?= $motora['id'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="veiculos_id">Selecione o Veículo:</label>
        <select name="veiculos_id" id="veiculos_id" required>
            <option value="">Escolha um veículo</option>
            <?php foreach ($veiculos as $veiculo): ?>
                <option value="<?= $veiculo['id'] ?>">
                    <?= $veiculo['modelo'] ?> - <?= $veiculo['placa'] ?> (ID: <?= $veiculo['id'] ?> - <?= $veiculo['renavam'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <button type="submit">Salvar Associação</button>
    </form>
</body>
</html>