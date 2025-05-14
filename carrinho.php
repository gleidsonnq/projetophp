<?php
session_start();
include('includes/conexao.php');
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
if (isset($_GET['remover'])) {
    $id = (int)$_GET['remover'];
    $_SESSION['carrinho'] = array_filter($_SESSION['carrinho'], fn($i) => $i != $id);
}
$carrinho = $_SESSION['carrinho'];
$ids = implode(',', $carrinho);
$result = empty($carrinho) ? [] : $conn->query("SELECT * FROM produtos WHERE id IN ($ids)");
?>

<?php include('header.php')?>

    <main>  
        <h1>Seu Carrinho</h1>
        <?php if (empty($carrinho)): ?>
            <p>O carrinho está vazio.</p>
        <?php else: ?>
            <ul>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li>
                    <?php echo $row['nome']; ?> - R$ <?php echo $row['preco']; ?>
                    <a href="carrinho.php?remover=<?php echo $row['id']; ?>">Remover</a>
                </li>
            <?php endwhile; ?>
            </ul>
            <a href="finalizar.php">Finalizar Compra</a>
        <?php endif; ?>
    </main>
    
<?php include('footer.php')?>