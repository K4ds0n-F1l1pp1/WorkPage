<?php
$usuario_correto = "admin_1";
$senha_correta = "Nosdak20";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$mensagem = "Usuário ou senha incorretos.";

if ($username === $usuario_correto && $password === $senha_correta) {
    header("Location: ../index.php");
    exit();
} else {
    echo "<script>alert('$mensagem');</script>";
    header("Location: inicial_page.php?error=true");
    exit();
}
?>
