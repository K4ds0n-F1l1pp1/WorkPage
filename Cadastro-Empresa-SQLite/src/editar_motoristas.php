<?php

$db = new PDO('sqlite:db/database.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM drivers WHERE id = ?");
    $stmt->execute([$id]);
    $drivers = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$drivers) {
        echo "Motorista com ID $id não encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $veiculo_id = $_POST['veiculo_id'];

    $stmt = $db->prepare(query: "UPDATE drivers SET nome = ?, rg = ?, cpf = ?, telefone = ?, veiculo_id = ? WHERE id = ?");
    $stmt->execute([$nome, $rg, $cpf, $telefone, $veiculo_id, $id]);

    header("Location: drivers.php");
    exit;
}

$veiculos = $db->query("SELECT * FROM veiculos")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style_editar.css">
    <title>Editar Motorista</title>
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
                    <button onclick="location.href='drivers.php'" type="button">
                    Gerenciar Motoristas</button>
                </li>
                <li>
                    <button onclick="location.href='reports.php'" type="button">
                    Reports</button>
                </li>
            </ul>
        </nav>
    </header>
    <h1>Editar Motorista</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($drivers['id']) ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($drivers['no    me']) ?>" required>
        <br>
        
        <label for="rg">RG:</label>
        <input type="text" name="rg" id="rg" value="<?= htmlspecialchars($drivers['rg']) ?>" required>
        <br>
        
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?= htmlspecialchars($drivers['cpf']) ?>" required>
        <br>
        
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($drivers['telefone']) ?>">
        <br>
        
        <label for="veiculo_id">ID do Caminhão:</label>
        <input type="number" name="veiculo_id" id="veiculo_id" value="<?= htmlspecialchars($drivers['veiculo_id']) ?>">
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