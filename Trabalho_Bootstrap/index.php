<?= include __DIR__ . "./webpages/join.php"?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" href="img/icone_aba_index.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/estilo_Index.css">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
    <link rel="shortcut icon" href="./src/imagens/logistica-reversa.png">
    <title>Página inicial</title>
</head>

<body class="text-dark m-5" style="  background-color: #92a8d1;">
    <container>

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
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/K4ds0n-F1l1pp1?tab=repositories"
                                target="_blank">Diretório</a>
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

        <container class="m-5">
            <main>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card border border-3 border-dark" style="border-radius: 16px;">
                            <div class="card-body">
                                <h5 class="card-title">Gerenciar Motoristas</h5>
                                <p class="card-text">Adicionar, editar, excluir Motoristas.</p>
                                <a href="./src/motoristas.php" class="btn btn-primary">Ir para Gerenciamento de
                                    Motoristas</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card border border-3 border-dark" style="border-radius: 16px;">
                            <div class="card-body">
                                <h5 class="card-title">Gerenciar Veículos</h5>
                                <p class="card-text">Adicionar, editar, excluir veículos.</p>
                                <a href="./src/veiculos.php" class="btn btn-primary">Ir para Gerenciamento de
                                    Veículos</a>
                            </div>
                        </div>
                    </div>
        </container>
    </container>

    <!-- Eventos -->
    <div class="container-fluid">
        <div class="row col-12 m-3 p-2">
            <div class="col-6">
                <h2 style="color: black;">Eventos Registrados</h2>
            </div>
            <div class="align-items-center col-6">
                <div class="text-end">
                    <a href="./src/eventos/adicionar.php"><button type="submit"
                            class="btn btn-primary align-items-center justify-content-center d-inline">
                            <img src="./src/imagens/adicionar-botao.png" alt="Adicionar"
                                style="width: 24px; height: 24px; margin-right: 8px;">
                            Adicionar Evento
                        </button></a>
                    <a href="./src/eventos/editar.php"><button type="submit"
                            class="btn btn-primary align-items-center justify-content-center m-2 d-inline">
                            <img src="./src/imagens/editar.png" alt="Adicionar"
                                style="width: 24px; height: 24px; margin-right: 8px;">
                            Editar Evento
                        </button></a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="src/imagens/noticia1.jpg" class="card-img-top" alt="Evento">
                <div class="card-body">
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="/imagens/noticia2.jpg" class="card-img-top" alt="Evento">
                <div class="card-body"></div>
            </div>
        </div>
    </div>

    <hr style="height:16px;
    background:#000000;
    border:none;">

    <div class="col-3 align-items-center m-3" style="color: black">
        <iframe width="425" height="350"
            src="https://www.openstreetmap.org/export/embed.html?bbox=-92.08231794075603%2C-37.03003006562792%2C-21.59403669075602%2C-0.10033071715210662&amp;layer=mapnik"
            style="border: 1px solid black"></iframe><br />
        <button class="btn btn-info border border-2 border-dark">
            <small><a style="color: black; text-decoration: none;"
                    href="https://www.openstreetmap.org/#map=5/-19.61/-56.84">Ver mapa ampliado</a></small>
        </button>
    </div>

    <container class="col-6 border border-3 border-dark" style="background-color: beige;">
        <div class="row col-10 m-3 p-2">
            <div class="col-6">
                <h2 style="color: black;">Mapa dos Veículos</h2>
            </div>
            <div class="align-items-center col-6">
                <div class="text-end">
                    <a href="./src/veiculos.php"><button type="submit"
                            class="btn btn-primary align-items-center justify-content-center d-inline">
                            <img src="./src/imagens/adicionar-botao.png" alt="Adicionar"
                                style="width: 24px; height: 24px; margin-right: 8px;">
                            Adicionar Veículo
                        </button></a>
                </div>
            </div>
        </div>
    </container>

    <hr class="mt-3" style="height:16px;
    background:#000000;
    border:none;">
    <div class="border border-4 border-success p-2">
        <table class="table table-striped table-dark border border-success">
            <thead>
                <tr>
                    <th>ID Motorista</th>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Veículo</th>
                    <th>Placa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($results) > 0): ?>
                <?php foreach ($results as $row): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars($row['motoristas_id']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['motoristas_nome']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['motoristas_rg']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['motoristas_cpf']) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['motoristas_telefone'] ?: 'N/A') ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['veiculos_modelo'] ?: 'Sem Veículo') ?>
                    </td>
                    <td>
                        <?= htmlspecialchars($row['veiculos_placa'] ?: 'N/A') ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td colspan="7">Nenhum motorista cadastrado.</td>
                </tr>
                <?php endif; ?>
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