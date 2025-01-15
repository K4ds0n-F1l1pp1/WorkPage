<?php

$db = new PDO('sqlite:src/db/registros.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "
    SELECT 
        motoristas.id AS motoristas_id, 
        motoristas.nome AS motoristas_nome, 
        motoristas.rg AS motoristas_rg, 
        motoristas.cpf AS motoristas_cpf, 
        motoristas.telefone AS motoristas_telefone, 
        veiculos.modelo AS veiculos_modelo,  
        veiculos.placa AS veiculos_placa 
    FROM 
        motoristas
    LEFT JOIN 
        veiculos 
    ON 
        motoristas.veiculos_id = veiculos.id
";
$results = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>