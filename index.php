<?php
session_start();
include('includes/conexao.php');
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    if (!in_array($id, $_SESSION['carrinho'])) {
        $_SESSION['carrinho'][] = $id;
    }
}
$result = $conn->query("SELECT * FROM produtos");
?>
<?php include('header.php')?>
        <main>
            <h1>Produtos</h1>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <?php echo $row['nome']; ?> - R$ <?php echo $row['preco']; ?>
                        <?php echo "<img src="; echo $row['imagem']; echo " />";?>
                        <a href="index.php?add=<?php echo $row['id']; ?>">Comprar</a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <a href="carrinho.php">Ver carrinho</a>
            
        </main>
<?php include('footer.php')?>

