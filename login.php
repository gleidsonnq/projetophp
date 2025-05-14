<?php include('header.php')?>

    <main class="login">
        <p>Faça seu Login</p>
        <form method="POST">
            <input type="text" name="usuario" placeholder="insira o Usuário" required><br>
            <input type="password" name="senha" placeholder="insira a Senha" required><br>
            <button type="submit">Entrar</button>
        </form>

    </main>

<?php include('footer.php')?>

<?php
session_start();
include('includes/conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: cadastro_produto.php");
        exit;
    } else {
        echo "<p>Login inválido.</p>";
    }
}
?>