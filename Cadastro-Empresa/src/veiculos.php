<?php

$dsn = 'sqlite:veiculos.db';
$dsnn = 'sqlite:motoristas.db';

try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS veiculos(
    placa INTEGER PRIMARY KEY AUTOINCREMENT,
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
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Cria os motoristas:
try {
    $pdo = new PDO($dsnn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS motoristas(
    CPF INTEGER PRIMARY KEY CHAR(11),
    nome CHAR(200) NOT NULL,
    rg CHAR(20) UNIQUE NOT NULL,
    telefone CHAR(20) NOT NULL)");
} catch (PDOException $e) {
    die ("Erro ao procurar banco de dados.". $e->getMessage());
}

// Listar os motoristas:
function listMotoristas($pdo) {
    $statement = $pdo->query("SELECT * FROM motoristas");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
