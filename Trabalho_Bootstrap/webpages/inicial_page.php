<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../src/imagens/botao-de-interface-de-seta-de-login-delineado.png" type="image/png">
</head>
<body>
    <div>
        <h1 class="text-center mt-3">Sistema de Gerenciamento de Rotas</h1>
        <img src="../src/imagens/logistica-reversa.png" alt="Logotipo" class="img-fluid mb-5 rounded mx-auto d-block">
        <p class="text-center">Gerencie rotas, motoristas e veículos com mais facilidade.</p>
    </div>
    <div class="border border-3 m-5 border-dark" style="border-radius: 16px;">
        <div class="container mt-5">
            <h2 class="text-center">Login no sistema</h2>
            <form action="valida_login.php" method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuário</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-4">Entrar</button>
            </form>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger mt-3" role="alert">
                    Usuário ou senha inválidos. Tente novamente!
                </div>
            <?php endif; ?>
        </div>

        <p class="text-center mb-3">Ainda não possui cadastro? <a href="cadastro.php">Clique aqui</a> para se cadastrar.</p>
        <p class="text-center">Esqueceu a senha? <a href="cadastro.php">Clique aqui</a> para recuperá-la.</p>
    </div>
</body>
</html>