<?php

if (!is_dir('db')) {
    mkdir('db');
}

try {
    $db = new PDO('sqlite:db/registros.sqlite'); // Prepara pro banco.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Para erros.

    // Criação das tabelas
    $db->exec( "CREATE TABLE IF NOT EXISTS veiculos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        placa CHAR(7) NOT NULL,
        renavam CHAR(30) DEFAULT NULL,
        modelo CHAR(20) NOT NULL,
        marca CHAR(20) NOT NULL,
        ano INTEGER NOT NULL,
        cor CHAR(20) NOT NULL
    );");

    $db->exec( "CREATE TABLE IF NOT EXISTS motoristas (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nome CHAR(255) NOT NULL,
        rg CHAR(20) NOT NULL,
        cpf CHAR(11) NOT NULL,
        telefone CHAR(20) DEFAULT NULL,
        veiculos_id INTEGER,
        FOREIGN KEY(veiculos_id) REFERENCES veiculos(id)
    );");

    $db->exec( "CREATE TABLE IF NOT EXISTS  eventos(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    data TIMESTAMP CURRENT_TIMESTAMP NOT NULL,
    hora TIME NOT NULL,
    motoristas_id INTEGER,
    veiculos_id INTEGER)");
    
    echo "Banco de dados configurado com sucesso!";
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage());
}