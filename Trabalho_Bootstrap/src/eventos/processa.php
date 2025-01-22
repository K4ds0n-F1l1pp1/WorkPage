<?php

$db = new PDO('sqlite:db/registros.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$motoristas = $db->query("SELECT * FROM motoristas")->fetchAll(PDO::FETCH_ASSOC);
$veiculos = $db->query("SELECT * FROM veiculos")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $motoristas_id = $_POST['motoristas_id'];
    $veiculos_id = $_POST['veiculos_id'];

    $stmt = $db->prepare("UPDATE motoristas SET veiculos_id = ? WHERE id = ?");
    $stmt->execute([$veiculos_id, $motoristas_id]);

    header("Location: ../../index.php");
    exit;
}
?>