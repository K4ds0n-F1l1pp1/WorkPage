<?= include __DIR__ . '/processa.php'; ?> 

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Eventos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../imagens/calendario (1).png">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Gerenciar Eventos, Motoristas e Veículos</h1>

    <div>
        <form>
            <input type="date" class="form-control">
        </form>
    </div><br>

    <form method="POST" action="adicionar.php" class="mb-4">
        <h3>Adicionar Evento</h3>

        <select class="form-select" aria-label="Default select example">    
            <option selected>Selecione o motivo</option>
            <option value="1">Pausa</option>
            <option value="2">Acidente</option>
            <option value="3">Café</option>
            <option value="4">Almoço</option>
            <option value="5">Janta</option>
            <option value="6">Mimir</option>
        </select>
        <br> 
        <h3>Associar Motoristas e Veículos</h3>
        <div class="mb-3">
            <label for="motoristas_id" class="form-label">Motorista:</label>
            <select name="motoristas_id" id="motoristas_id" class="custom-select col-4" required>
                    <option value="">Escolha um motorista</option>
                    <?php foreach ($motoristas as $motora): ?>
                        <option value="<?= $motora['id'] ?>">
                            <?= $motora['nome'] ?> (ID: <?= $motora['id'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
        </div>
        <button type="submit" name="add_evento" class="btn btn-primary">Salvar Evento</button>
        <a href="../../index.php" name="voltar" class="btn btn-primary">Voltar</a>
    </form>
</body>
</html>