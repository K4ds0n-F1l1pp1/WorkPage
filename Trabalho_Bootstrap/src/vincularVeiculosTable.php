<? include __DIR__ . '/eventos/processa.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
    <title>Vincular Veículos</title>
</head>
<body class="text-dark m-5" style="background-color: #7E5EF2;">
    <h1>Gerenciamento de rotas</h1>

    <div class="bg-dark">
        <form method="post" action="vincularVeiculosTable.php" class="form-control">
            <div class="">
                <label for="veiculos_id">Veículo:</label>
                <select name="veiculos_id" id="veiculos_id" required>
                    <option value="">Escolha um veículo</option>
                    <?php foreach ($veiculos as $veiculo):?>
                        <option value="<?php echo $veiculo['id'];?>"><?php echo $veiculo['modelo'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <br>
            <div class="">
                <label for="motoristas_id">Motorista:</label>
                <select name="motoristas_id" id="motoristas_id" required>
                    <option value="">Escolha um motorista</option>
                    <?php foreach ($motoristas as $motora):?>
                        <option value="<?php echo $motora['id'];?>"><?php echo $motora['nome'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <br>
            <div class="">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" required>
                <label for="hora_inicio">Hora de Início:</label>
                <input type="time" name="hora_inicio" id="hora_inicio" required>
            </div>
            <br>

    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="../index.php" class="btn btn-primary">Voltar</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>
</html>