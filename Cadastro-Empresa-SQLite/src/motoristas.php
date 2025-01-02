<?php

$dsnn = 'sqlite:' . __DIR__ . 'motoristas.db';

// Cria os motoristas:
try {
    $pdoMotoristas = new PDO($dsnn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS motoristas(
    CPF CHAR(11) PRIMARY KEY,
    nome CHAR(200) NOT NULL,
    rg CHAR(20) UNIQUE NOT NULL,
    telefone CHAR(20) NOT NULL)");
} catch (PDOException $e) {
    die ("Erro ao procurar banco de dados.". $e->getMessage());
}

// Listar os motoristas:
function listMotoristas($pdo) {
    $statement = $pdo->query("SELECT * FROM motoristas");
    return $statement ? $statement->fetchAll(PDO::FETCH_ASSOC) : [];
}