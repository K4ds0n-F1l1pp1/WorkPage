<?php

$db = new PDO(dsn: 'sqlite:../db/registros.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$linha = $_GET['linha'] ?? null;

if ($linha) {

    $motoristas = $db->query('SELECT * FROM motoristas')->fetchAll(PDO::FETCH_ASSOC);

    $motora = $motoristas[$linha - 1] ?? null;

    if (!$motora) {
        die('Motorista não encontrado.');
    }

    $stmt = $db->prepare("DELETE FROM motoristas WHERE id = ?");
    $stmt->execute([$motora['id']]);

    header('Location: ../motoristas.php');
    exit();
}
?>