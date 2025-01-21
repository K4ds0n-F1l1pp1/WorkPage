<?php

$db = new PDO('sqlite:../db/registros.sqlite');
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
        header('Location: ../veiculos.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Editar Veículo</title>
</head>
<body class="container mt-5">
    <div class="mb-2 ">
    <h1 class="text-dark m-3">Editar Veículo</h1>
        <form action="editar.php" method="POST" class="form-control p-5 bg-light">
            <div class="d-inline justify-content-center col-4">
                <div class="m-3">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($veiculo['id']) ?>">
                </div>
                <div class="m-3">
                    <label>Placa:</label>
                    <input type="text" name="placa" value="<?= htmlspecialchars($veiculo['placa']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>Renavam:</label>
                    <input type="text" name="renavam" value="<?= htmlspecialchars($veiculo['renavam']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>Modelo:</label>
                    <input type="text" name="modelo" value="<?= htmlspecialchars($veiculo['modelo']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>Marca:</label>
                    <input type="text" name="marca" value="<?= htmlspecialchars($veiculo['marca']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>Ano:</label>
                    <input type="number" name="ano" value="<?= htmlspecialchars($veiculo['ano']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>Cor:</label>
                    <input type="text" name="cor" value="<?= htmlspecialchars($veiculo['cor']) ?>"><br>
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary">Salvar Alterações</button>
                <a href="../veiculos.php" name="voltar" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>