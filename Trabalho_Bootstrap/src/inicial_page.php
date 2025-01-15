<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de login</title>
</head>

<body>
    <h1>Seja bem vindo</h1>

    <container>
        <form action="valida_login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br><br>

            <button class="btn btn-outline-success">Entrar</button>
        </form>
        <p>Ainda não possui uma conta? <a href="cadastro.php">Crie agora</a></p>
    </container>
</body>

</html>