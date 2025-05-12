<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Dados</title>
        <!estilização da página>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>
    </head>
    <body>
         <header>
            <h1>Carrinho</h1>
            <nav aria-label="Breadcrumb" class="breadcrumb">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="carrinho.php">Carrinho</a></li>
                </ul>
            </nav>
        </header>
        <h2>Cadastro de Dados</h2>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone"><br>
            <button type="submit" name="submit">Cadastrar</button>
        </form>

        <h2>Dados Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Verifica se o formulário foi submetido
                    if (isset($_POST['submit'])) {
                        $nome = htmlspecialchars($_POST['nome']);
                        $email = htmlspecialchars($_POST['email']);
                        $telefone = htmlspecialchars($_POST['telefone']);
                        // Verifica se todos os campos foram preenchidos
                        if (!empty($nome) && !empty($email)) {
                            // Abre ou cria o arquivo para escrita
                            $file = fopen('dados.txt', 'a');
                            // Escreve os dados no arquivo
                            fwrite($file, "$nome;$email;$telefone\n");
                            // Fecha o arquivo
                            fclose($file);
                        }
                    }
                    // Função para ler e exibir os dados do arquivo
                    function exibirDados() {
                        $file = fopen('dados.txt', 'r');
                        if ($file) {
                            while (($line = fgets($file)) !== false) {
                                $dados = explode(';', trim($line));
                                echo "<tr>";
                                echo "<td>{$dados[0]}</td>";
                                echo "<td>{$dados[1]}</td>";
                                echo "<td>{$dados[2]}</td>";
                                echo "<td><form method='post'><input type='hidden' name='line'
                                value='{$line}'><button type='submit'
                                name='delete'>Apagar</button></form></td>";
                                echo "</tr>";
                            }
                            fclose($file);
                        }
                    }
                    // Verifica se há ação de apagar
                    if (isset($_POST['delete'])) {
                        $line_to_delete = $_POST['line'];
                        $file = file('dados.txt');
                        $fileToDelete = fopen('dados.txt', 'w');
                        foreach($file as $line){
                            if(trim($line) != trim($line_to_delete)){
                                fwrite($fileToDelete, $line);
                            }
                        }
                        fclose($fileToDelete);
                    }
                    // Chama a função para exibir os dados
                    exibirDados();
                ?>
            </tbody>
        </table>
    </body>
</html>