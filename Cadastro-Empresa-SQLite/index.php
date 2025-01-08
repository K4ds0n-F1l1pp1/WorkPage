<?php

$db = new PDO('sqlite:src/db/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "
    SELECT 
        drivers.id AS drivers_id, 
        drivers.nome AS drivers_nome, 
        drivers.rg AS drivers_rg, 
        drivers.cpf AS drivers_cpf, 
        drivers.telefone AS drivers_telefone, 
        veiculos.modelo AS veiculo_model, 
        veiculos.placa AS veiculo_plate 
    FROM 
        drivers
    LEFT JOIN 
        veiculos 
    ON 
        drivers.veiculo_id = veiculos.id
";
$results = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="src/imagens/caminhao-de-padaria.png">
    <link rel="stylesheet" href="css/style_table.css">
    <title>Página Inicial</title>
    <title>Motoristas e Veículos</title>
</head>

<body>
    <header class="header">
    <p> Olá, seja bem vindo ao sistema!</p>
    <h1>Gerenciamento de Veículos e Motoristas</h1>
    <div class="navegacao_drivers">
        <nav>
            <ul>
                <li>
                    <button onclick="location.href='src/veiculos.php'" type="button">
                    Gerenciar Veículos</button>
                </li>
                <li>
                    <button onclick="location.href='src/drivers.php'" type="button">
                    Gerenciar Motoristas</button>
                </li>
                <li>
                    <button onclick="location.href='src/reports.php'" type="button">
                    Reports</button>
                </li>
            </ul>
        </nav>
    </div>
    </header>
    <h1 class="texto_titulo">Lista de Motoristas e Veículos</h1>
    <div class="division">
        <button class="button_sem" onclick="location.href='src/link_driver_veiculo.php'">Associar Veículo ao Motorista</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID Motorista</th>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Veículo</th>
                <th>Placa</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($results) > 0): ?>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['drivers_id']) ?></td>
                        <td><?= htmlspecialchars($row['drivers_nome']) ?></td>
                        <td><?= htmlspecialchars($row['drivers_rg']) ?></td>
                        <td><?= htmlspecialchars($row['drivers_cpf']) ?></td>
                        <td><?= htmlspecialchars($row['drivers_telefone'] ?: 'N/A') ?></td>
                        <td><?= htmlspecialchars($row['veiculos_modelo'] ?: 'Sem Veículo') ?></td>
                        <td><?= htmlspecialchars($row['veiculos_placa'] ?: 'N/A') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum motorista cadastrado.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
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