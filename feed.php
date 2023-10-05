<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <!--Iniciando uma session para usar o nome do usuário em qualquer lugar do sistema-->
    <?php session_start();?>

    <!--Pegando o nome usado na session após vim de "verifica-nome.php"-->
    <h1>Bem vindo(a), <?php echo $_SESSION['nomeUsuario']; ?></h1>

    <main>
        <form action="postar.php" method="get">
            <input type="text" name="titulo" id="titulo" placeholder="Título da postagem" required><br><br><br>
            <textarea name="newPost" id="newPost" cols="40" rows="6" placeholder="No que você está pensando?" required></textarea>
            <button type="submit" id="postar">Postar</button>
        </form>

        <hr>

        <?php
        //Conectando ao banco de dados
        $conexao = new mysqli('localhost', 'root', '123456', 'cadastro');
        //Realizando a busca dentro do banco de dados
        $resultado = $conexao->query("SELECT * FROM postagens");
        //Checando erros ao buscar os dados
        if (!$resultado) {
            echo "Erro na busca";
        } elseif ($resultado->num_rows > 0) {
            //Busca os dados e coloca na váriavel $linha
            while ($linha = $resultado->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h3>" . $linha['titulo'] . "</h3>";
                echo "<p>" . $linha['conteudo'] . "</p>";
                //Colocando a data formatada como d/m/Y
                echo "<p id=dataPost>". date("d/m/Y", strtotime($linha['data'])) ."</p>";

                echo "</div>";
                echo "<input type='text' id='comentario' placeholder='Comentar'>" ;
                echo "<button class='material-symbols-outlined' id='send' onclick='comentar.php'>send</button>";
            }
        }
        ?>
        <div>
            <button onclick="javascript: window.location.href = 'index.html' " class="material-symbols-outlined" id='voltar'>arrow_back</button>
        </div>



    </main>

</body>

</html>