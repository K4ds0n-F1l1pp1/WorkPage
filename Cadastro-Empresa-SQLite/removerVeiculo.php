<?php

$dbPath = __DIR__ . '/database.sqlite';
$PDO = new PDO("sqlite:$dbPath");

// Valida o ID recebido pelo GET
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: /index.php?sucesso=0');
    exit;
}

$id = (int)$_GET['id']; // Converte o ID para inteiro

// Prepara a exclusão do vídeo
$sql = 'DELETE FROM videos WHERE id = ?';
$statement = $PDO->prepare($sql);
$statement->bindValue(1, $id);

// Executa a exclusão e redireciona com base no resultado
if ($statement->execute() === false) {
    header('Location: /index.php?sucesso=0');
} else {
    header('Location: /index.php?sucesso=1');
}