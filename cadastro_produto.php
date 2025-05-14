<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
include('includes/conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem'];
    $stmt = $conn->prepare("INSERT INTO produtos (nome, preco, imagem) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $nome, $preco, $imagem);
    $stmt->execute();
}
?>

<?php include('header.php')?>

    <main>
        <h1>Cadastro de Produtos</h1>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome do produto" required><br>
            <input type="number" step="0.01" name="preco" placeholder="Preço" required><br>
            <input type="text" name="imagem" placeholder="Caminho da imagem"><br>
            <button type="submit">Cadastrar</button>
        </form>

     </main>

<?php include('footer.php')?>