<?php

$dsn = 'sqlite:' . __DIR__ . 'veiculos.db';

try {
    $pdoVeiculos = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS veiculos(
    placa CHAR(7) NOT NULL,
    renavam CHAR(30) DEFAULT NULL,
    modelo CHAR(20) NOT NULL,
    marca CHAR(20) NOT NULL,
    ano INTEGER NOT NULL,
    cor CHAR(20) NOT NULL)");
} catch (PDOException $e) {
    die ("Erro ao conectar com o banco de dados." . $e->getMessage());
}

// Listar os veículos:

function listVeiculos($pdo) {
    $statement = $pdo->query("SELECT * FROM veiculos");
    return $statement ? $statement->fetchAll(PDO::FETCH_ASSOC) : [];
}
