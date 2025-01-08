<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    try {
        $pdo = new PDO('sqlite:' . __DIR__ . '/db/database.sqlite');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryCheck = $pdo->prepare('SELECT * FROM veiculos WHERE id = :id');
        $queryCheck->bindValue(':id', $id, PDO::PARAM_INT);
        $queryCheck->execute();

        if ($queryCheck->fetch()) {

            $queryDelete = $pdo->prepare('DELETE FROM veiculos WHERE id = :id');
            $queryDelete->bindValue(':id', $id, PDO::PARAM_INT);
            $queryDelete->execute();

            $countRows = $pdo->query('SELECT COUNT(*) FROM drivers')->fetchColumn();
            if ($countRows == 0) {
                $pdo->exec("DELETE FROM sqlite_sequence WHERE name = 'veiculos'");
            }

            header('Location: veiculos.php');
            exit();

        } else {
            echo "<p style='color: red;'>Registro com ID $id não encontrado.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erro ao acessar o banco de dados: " . $e->getMessage() . "</p>";
    }
}