<?php

include __DIR__ . '../db/registros.sqlite';
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$linha = $_GET['linha'] ?? null;

if ($linha) {

    $veiculos = $db->query('SELECT * FROM veiculos')->fetchAll(PDO::FETCH_ASSOC);

    $veiculo = $veiculos[$linha - 1] ?? null;

    if (!$veiculo) {
        die('Veículo não encontrado.');
    }

    $stmt = $db->prepare("DELETE FROM veiculos WHERE id = ?");
    $stmt->execute([$veiculo['id']]);

    header('Location: ../veiculos.php');
    exit();
}
?>
