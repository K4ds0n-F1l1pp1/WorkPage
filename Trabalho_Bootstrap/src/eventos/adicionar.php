<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Eventos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Gerenciar Eventos, Motoristas e Veículos</h1>

    <form method="POST" action="processa.php" class="mb-4">
        <h3>Adicionar Evento</h3>
        <div class="mb-3">
            <label for="evento_nome" class="form-label">Nome do Evento:</label>
            <input type="text" class="form-control" id="evento_nome" name="evento_nome" required>
        </div>
        <div class="mb-3">
            <label for="evento_data" class="form-label">Data do Evento:</label>
            <input type="date" class="form-control" id="evento_data" name="evento_data" required>
        </div>

        <select class="form-select" aria-label="Default select example">
            <option selected>Selecione o motivo</option>
            <option value="1">Pausa</option>
            <option value="2">Acidente</option>
            <option value="3">Café</option>
            <option value="3">Almoço</option>
            <option value="3">Janta</option>
            <option value="3">Mimir</option>
        </select>
        <br> 
        <h3>Associar Motoristas e Veículos</h3>
        <div class="mb-3">
            <label for="motorista_id" class="form-label">Motorista:</label>
            <select class="form-select" id="motorista_id" name="motorista_id" required>
                <!-- Preencher com PHP -->
            </select>
        </div>
        <div class="mb-3">
            <label for="veiculo_id" class="form-label">Veículo:</label>
            <select class="form-select" id="veiculo_id" name="veiculo_id" required>
                <!-- Preencher com PHP -->
            </select>
        </div>
        <button type="submit" name="add_evento" class="btn btn-primary">Salvar Evento</button>
        <button type="submit" name="voltar" class="btn btn-primary">Voltar</button>
    </form>
</body>

</html>