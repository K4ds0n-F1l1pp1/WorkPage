<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    try {
        $dbPath = __DIR__ . '/database.sqlite';
        
        $queryCheck = $pdo->prepare('SELECT * FROM drivers WHERE id = :id');
        $queryCheck->bindValue(':id', $id, PDO::PARAM_INT);
        $queryCheck->execute();

        if ($queryCheck->rowCount() > 0) {
            $queryDelete = $pdo->prepare('DELETE FROM drivers WHERE id = :id');
            $queryDelete->bindValue(':id', $id, PDO::PARAM_INT);
            $queryDelete->execute();

        } else {
            echo "<p style='color: red;'>Registro com ID $id não encontrado.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erro ao acessar o banco de dados: " . $e->getMessage() . "</p>";
    }
    }
?>
