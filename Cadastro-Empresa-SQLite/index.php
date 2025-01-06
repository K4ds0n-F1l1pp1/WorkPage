<?php include __DIR__ . 'init.php'; ?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="imagens/caminhao-de-padaria.png">
    <title>Página Inicial</title>
</head>
<body>
    <header class="header">
        <container class="nome"> Olá, seja bem vindo!</container>
        <h1>Gerenciamento de Veículos e Motoristas</h1>
        <nav>
            <a href="src/veiculos.php">Gerenciar Veículos</a>
            <a href="src/drivers.php">Gerenciar Motoristas</a>
            <a href="reports.php">Reports</a>
        </nav>
    </header>

    <main class="main">
        <p>Utilize os comandos para gerenciar Veículos e Motoristas e dar Reports.</p><br>
    </main>

    <footer class="footer">
        <p>&copy; Gerenciador de Riscos e Rotas - 2025</p>
    </footer>
</body>
</html>