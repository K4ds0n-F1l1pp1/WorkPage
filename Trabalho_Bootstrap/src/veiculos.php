<?= include __DIR__ . '/Cria_banco.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Veículos</title>
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
                        <a class="nav-link" href="motoristas.php"
                            >Gerenciar Motoristas</a>
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
    <br>
    <h1>Veículos Cadatrados</h1>
    <section>
        <div class="border border-3 border-dark bg-light" style="border-radius: 16px;">
            <form class="bg-light" action="veiculos.php" method="POST" class="form-control mt-3">
                <div class="container mt-4">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="placa">Placa:</label>
                                <input type="text" id="placa" name="placa" maxlength="7" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="renavam">Renavam:</label>
                                <input type="text" id="renavam" name="renavam" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="modelo">Modelo:</label>
                                <input type="text" id="modelo" name="modelo" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="marca">Marca:</label>
                                <input type="text" id="marca" name="marca" maxlength="20" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="ano">Ano:</label>
                                <input type="number" id="ano" name="ano" maxlength="4" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="cor">Cor:</label>
                                <input type="text" id="cor" name="cor" maxlength="20" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Cadastrar</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <br>
    <div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Renavam</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $stmt = $db->prepare(query: "INSERT INTO veiculos (placa, renavam, modelo, marca, ano, cor) VALUES (?, ?, ?, ?, ?, ?)");
                    $stmt->execute(params: [
                        $_POST['placa'],
                        $_POST['renavam'],
                        $_POST['modelo'],
                        $_POST['marca'],
                        $_POST['ano'],
                        $_POST['cor']
                    ]);
                }

                $veiculos = $db->query('SELECT * FROM veiculos')->fetchAll(PDO::FETCH_ASSOC);

                $linha = 0;
                foreach ($veiculos as $veiculo):
                    $linha++;
                ?>
                <tr>
                    <td><?= $linha ?></td>
                    <td><?= htmlspecialchars($veiculo['placa']) ?></td>
                    <td><?= htmlspecialchars($veiculo['renavam']) ?></td>
                    <td><?= htmlspecialchars($veiculo['modelo']) ?></td>
                    <td><?= htmlspecialchars($veiculo['marca']) ?></td>
                    <td><?= htmlspecialchars($veiculo['ano']) ?></td>
                    <td><?= htmlspecialchars($veiculo['cor']) ?></td>
                    <td>
                        <a href="./Acoes/editar.php?linha=<?= $linha ?>" class="btn btn-outline-success">Editar</a>
                        <a href="./Acoes/excluir.php?linha=<?= $linha ?>" class="btn btn-outline-danger">Deletar</a>
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