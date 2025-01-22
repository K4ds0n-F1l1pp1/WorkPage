<?= include __DIR__ .'/webpages/joinMotoristasVeiculos.php'; ?>
<?= include __DIR__ . '/src/Cria_banco.php'; ?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shorcut icon" href="img/icone_aba_index.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
    <link rel="shortcut icon" href="./src/imagens/logistica-reversa.png">
    <title>Página inicial</title>
</head>

<body class="text-dark m-5" style="background-color: #7E5EF2;">
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
                            <a class="nav-link" href="https://github.com/K4ds0n-F1l1pp1/WorkPage"
                                target="_blank">Respositório do Site</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./webpages/inicial_page.php" tabindex="-1" aria-disabled="true">Sair</a>
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
    <container class="m-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card border border-3 border-dark" style="border-radius: 16px;">
                        <div class="card-body">
                            <h5 class="card-title">Gerenciar Motoristas</h5>
                            <p class="card-text">Adicionar, editar, excluir Motoristas.</p>
                            <a href="./src/motoristas.php?menu=motoristas" class="btn btn-primary">Ir para Gerenciamento
                                de
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

    <!-- Eventos -->
    <div class="container-fluid">
        <div class="row col-12 m-3 p-2">
            <div class="col-6">
                <div class="row row-1 col-10">
                    <h2 class="col-6" style="color: black;">Eventos Registrados</h2>
                    <img class="col-4" style="width: 24px; height: 24px; margin-right: 8px;" src="./src/imagens/calendario.png"
                    alt="Flaticon">
                </div>
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
        </div>
    </div>
    <div class="container-fluid">
        <table class="table table-striped table-light table-border">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th scope="col">ID</th>
                    <th scope="col">Data</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Motorista</th>
                    <th scope="col">Placa</th>
                </tr>
            </thead>
            <tbody>
            <?php if (count($results) > 0): 
            $linha = 0?>
            <?php foreach ($results as $row): 
                $linha++; ?>
            <tr>
                <td>
                    <input class="form-check-input" type="checkbox">
                </td>
                <td>
                    <?= htmlspecialchars($row['eventos']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['eventos_data']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['eventos_motivo']) ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['motoristas_nome'] ?: 'N/A') ?>
                </td>
                <td>
                    <?= htmlspecialchars($row['veiculos_placa'] ?: 'N/A') ?>
                </td>
                    </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                    <tr>
                        <td colspan="7">Nenhum evento cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <hr style="height:16px;
    background:#000000;
    border:none;">

    <div class="col-3 align-items-center m-3" style="color: black">
        <iframe width="425" height="350"
            src="https://www.openstreetmap.org/export/embed.html?bbox=-92.08231794075603%2C-37.03003006562792%2C-21.59403669075602%2C-0.10033071715210662&amp;layer=mapnik"
            style="border: 1px solid black"></iframe><br /><br>
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
                    <a href="./src/vincularVeiculosTable.php"><button type="submit"
                            class="btn btn-primary align-items-center justify-content-center d-inline">
                            <img src="./src/imagens/sinal-de-adicao.png" alt="Adicionar"
                                style="width: 24px; height: 24px; margin-right: 8px;">
                            Vincular Veículo
                        </button></a>
                </div>
            </div>
            <div class="row row-1 col-10">
                <table class="table table-striped table-borderless">
                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Motorista</th>
                            <th scope="col">Cidade</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (count($results) > 0): 
                    $linha = 0?>
                    <?php foreach ($results as $row): 
                        $linha++; ?>
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox">
                        </td>
                        <td>
                            <?= htmlspecialchars($row['veiculos_modelo'] ?: 'N/A') ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($row['veiculos_placa'] ?: 'N/A') ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($row['motoristas_nome'] ?: 'N/A') ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($row['cidades_nome'] ?: 'N/A') ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                        <?php else: ?>
                    <tr>
                        <td colspan="7">Nenhum evento cadastrado.</td>
                    </tr>
                <?php endif; ?> 
                </table>
            </div>
        </div>
    </container>

    <hr class="mt-3" style="height:16px;
    background:#000000;
    border:none;">
    <div class="bg-light border border-2 border-secondary" style="border-radius: 16px;">
        <div class="mt-4">
            <table class="table table-light table-hover table-borderless">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>ID Motorista</th>
                        <th>Nome</th>
                        <th>RG</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Veículo</th>
                        <th>Placa</th>
                        <th>Renavam</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($results) > 0): 
                        $linha = 0?>
                    <?php foreach ($results as $row): 
                        $linha++; ?>
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox">
                        </td>
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
                        <td>
                            <?= htmlspecialchars($row['veiculos_renavam'] ?: 'N/A') ?>
                        </td>
                        <td>
                            <a href="./src/motoristas/editarTudo.php?id=<?= $row['motoristas_id']?>">
                                <img src="./src/imagens/editar.png" alt="Editar"
                                    style="width: 24px; height: 24px; margin-right: 8px;">
                            </a>
                            <a href="./src/motoristas/excluirTudo.php?id=<?= $row['motoristas_id']?>">
                                <img src="./src/imagens/excluir.png" alt="Excluir"
                                    style="width: 24px; height: 24px; margin-right: 8px;">
                            </a>
                        </td>
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
            <hr style="height:8px;
                background:#000000;
                border:none;">
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1" aria-current="page">Anterior</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Próxima</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="mt-3">
        <a href='./src/link_motorista.php' class="btn btn-success">
        <img src="./src/imagens/sinal-de-adicao.png"
            style="width: 24px; height: 24px; margin-right: 8px;">
        Vincular Motorista</a>
    </div>
    <br>
    <footer class="border border-3 border-dark mt-3 col-12 mb-0"
        style="border-radius: 16px; color: black; font-size: 18px; text-align: center;">
        <div class="m-2">
            <h2>Contato</h2>
            <p>Email: kadson.trafegus@trafegus.com.br</p>
            <p>Telefone: (49) 9 8871-3527</p>
            <p>Endereço: Rua da Liberdade, 34E</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>