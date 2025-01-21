<?= include __DIR__ . '/Cria_banco.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">

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
                            >Gerenciar Veículos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./eventos/adicionar.php" tabindex="-1" aria-disabled="true">Adicionar eventos</a>
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
        <form action="motoristas.php" method="POST" class="form-control mt-3 border border-3 border-dark" style="border-radius: 16px;">

            <label class="col-sm-1 col-form-label mt-2" for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" maxlength="155" required><br><br>

            <label class="col-sm-1 col-form-label" for="rg">RG:</label>
            <input type="text" id="rg" name="rg" maxlength="20" required><br><br>

            <label class="col-sm-1 col-form-label" for="cpf">CPF:</label>
            <input type="char" id="cpf" name="cpf" maxlength="11" required><br><br>

            <label class="col-sm-1 col-form-label" for="telefone">Telefone</label>
            <input type="char" id="telefone" name="telefone" maxlength="20"><br><br>

            <button class="btn btn-outline-success" type="submit">Cadastrar</button>
        </form>
    </div>
    <h1>Motoristas Cadastrados</h1>

    <div class="">
        <table class="table mt-3 table-dark" style="width: 100%;">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">RG</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $stmt = $db->prepare(query: "INSERT INTO motoristas (nome, rg, cpf, telefone) VALUES (?,?,?,?)");
                        $stmt->execute(params: [
                            $_POST['nome'],
                            $_POST['rg'],
                            $_POST['cpf'],
                            $_POST['telefone']
                        ]);
                    }

                    $motoristas = $db->query('SELECT * FROM motoristas')->fetchAll(PDO::FETCH_ASSOC);

                    $linha = 0;
                    foreach ($motoristas as $motora):
                        $linha++;
                    ?>
                    <tr>
                        <td><?= $linha ?></td>
                        <td><?= htmlspecialchars($motora['nome']) ?></td>
                        <td><?= htmlspecialchars($motora['rg']) ?></td>
                        <td><?= htmlspecialchars($motora['cpf']) ?></td>
                        <td><?= htmlspecialchars($motora['telefone']) ?></td>
                        <td>
                            <a href="./Acoes/editarMoto.php?linha=<?= $linha ?>" class="btn btn-outline-success">Editar</a>
                            <a href="./Acoes/excluirMoto.php?linha=<?= $linha ?>" class="btn btn-outline-danger">Deletar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer class="border border-3 border-dark mt-3 col-12 mb-0"
        style="border-radius: 16px; color: black; font-size: 18px; text-align: center;">
        <container class="mb-0">
            <div class="m-2 p-2 mb-0">
                <h2>Contato</h2>
                <p>Email: kadson.trafegus@trafegus.com.br</p>
                <p>Telefone: (49) 9 8871-3527</p>
                <p>Endereço: Rua da Liberdade, 34E</p>
            </div>
        </container>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>