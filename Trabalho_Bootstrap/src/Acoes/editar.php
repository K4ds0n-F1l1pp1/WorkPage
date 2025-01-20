<?php

$db = new SQLite3('dados.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $stmt = $db->prepare("UPDATE veiculos SET placa = :placa, renavam = :renavam, modelo = :modelo, marca = :marca, 
        ano = :ano, cor = cor WHERE id = :id");
    $stmt->bindValue(':nome', $placa, SQLITE3_TEXT);
    $stmt->bindValue(':idade', $renavam, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $modelo, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $marca, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $ano, SQLITE3_INTEGER);
    $stmt->bindValue(':id', $cor, SQLITE3_INTEGER);
    $stmt->execute();
}

$result = $db->query("SELECT * FROM veiculos");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Motoristas</title>
</head>

<body class="text-dark m-5" style="  background-color: #92a8d1;">
    <section>

        <header class="form-control">
            <h1>Sistema de Gerenciamento de Rotas</h1>
        </header>
        <br>
        <nav class="rounded navbar navbar-dark border border-3 border-light"
            style="background-color:black; border-radius: 16px;">
            <div class="container-fluid">
                <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" href="texto.html">Sobre a empresa</a>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="veiculos.php"
                                target="_blank">Gerenciar Veículos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="src/inicial_page.php" tabindex="-1" aria-disabled="true">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>

            <form class="d-flex m-3 col-4">
                <input class="form-control me-2" type="search" placeholder="Pesquisar dados" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
        </nav>
        <br>
    </section>
    <div>
<body>
    <h1>Tabela Editável com SQLite</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($linha = $result->fetchArray(SQLITE3_ASSOC)): ?>
                <tr>
                    <form method="POST">
                        <td>
                            <?= htmlspecialchars($linha['id']) ?>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($veiculos['id']) ?>">
                        </td>
                        <td>
                            <input type="text" name="placa" value="<?= htmlspecialchars($veiculos['placa']) ?>" required>
                        </td>
                        <td>
                            <input type="text" name="renavam" value="<?= htmlspecialchars($veiculos['renavam']) ?>" required>
                        </td>
                        <td>
                            <button type="submit" name="edit">Salvar</button>
                        </td>
                    </form>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>