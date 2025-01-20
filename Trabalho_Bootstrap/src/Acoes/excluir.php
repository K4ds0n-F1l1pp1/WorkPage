<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $pdo = new PDO('sqlite:' . __DIR__ . '/db/database.sqlite');

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE tabela SET nome = ?, idade = ? WHERE id = ?");
    $stmt->bind_param("sii", $nome, $idade, $id);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}