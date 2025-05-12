<!DOCTYPE html>
<html lang="pt-BR"> 
<head> 
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
</head>
<body>   
    <header>
        <h1>Dr Tec</h1>
        <nav aria-label="Breadcrumb" class="breadcrumb">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="carrinho.php">Carrinho</a></li>
                </ul>
        </nav>
    </header>
    <main>
        <p>Insira seu Login</p>
        <input type="text"placeholder="Usuario"required>
        <input type="password"placeholder="Senha"required>
        <button type="submit">Login</button>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required> <br><br>
        <p>Insira sua senha</p>
        <input type="PASSWORD" id="senha" name="senha" placeholder="Digite sua senha" required> <br><br>      
        <p>Enviar</p>
        <input type="submit" value="Enviar">
        <p>Limpar</p>
        <input type="reset" value="Limpar">

      
    </main>
</body> 
</html>

<?php
