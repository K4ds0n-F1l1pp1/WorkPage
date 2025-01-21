<?php

try {
    $db = new PDO('sqlite:../db/registros.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$linha = $_GET['linha'] ?? null;

if ($linha) {

    $motoristas = $db->query('SELECT * FROM motoristas')->fetchAll(PDO::FETCH_ASSOC);

    $motora = $motoristas[$linha - 1] ?? null;

    if (!$motoristas) {
        die('Motorista não encontrado.');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
    
        $stmt = $db->prepare(query: "UPDATE motoristas SET nome = ?, rg = ?, cpf = ?, telefone = ? WHERE id = ?");
        $stmt->execute([$nome, $rg, $cpf, $telefone, $id]);

        header('Location: ../motoristas.php');
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
    <title>Editar Motorista</title>
</head>
<body class="container mt-5">
    <div class="mb-2 ">
    <h1 class="text-dark m-3">Editar Motoristas</h1>
        <form action="editar.php" method="POST" class="form-control p-5 bg-light">
            <div class="d-inline justify-content-center col-4">
                <div class="m-3">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($motora['id']) ?>">
                </div>
                <div class="m-3">
                    <label>Nome:</label>
                    <input type="text" name="placa" value="<?= htmlspecialchars($motora['nome']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>RG:</label>
                    <input type="text" name="rg" value="<?= htmlspecialchars($motora['rg']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>CPF:</label>
                    <input type="text" name="cpf" value="<?= htmlspecialchars($motora['cpf']) ?>"><br>
                </div>
                <div class="m-3">
                    <label>Telefone:</label>
                    <input type="text" name="telefone" value="<?= htmlspecialchars($motora['telefone']) ?>"><br>
                </div>
            </div>
            <div class="mt-4">
                <a href="../motoristas.php" name="add_evento" class="btn btn-primary">Salvar Alterações</a>
                <a href="../motoristas.php" name="voltar" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>