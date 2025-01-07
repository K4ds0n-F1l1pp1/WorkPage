<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Veículos</title>
</head>
<body>
    <h1>Removedor de Veículos</h1>
</body>
</html>

<?php

$dbPath = __DIR__ . '/database.sqlite';
$PDO = new PDO("sqlite:$dbPath");

// Valida o ID recebido pelo GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: /removerMotorista.php?sucesso=0');
    exit;
}

$id = (int)$_GET['id']; // Converte o ID para inteiro

// Prepara a exclusão do vídeo
$sql = 'DELETE FROM veiculos WHERE id = ?';
$statement = $PDO->prepare($sql);
$statement->bindValue(1, $id);

// Executa a exclusão e redireciona com base no resultado
if ($statement->execute() === false) {
    header('Location: /index.php?sucesso=0');
} else {
    header('Location: /index.php?sucesso=1');
}
?>

