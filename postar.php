<?php 

    date_default_timezone_set('America/Sao_Paulo');
    $conteudo = $_REQUEST['newPost'];
    $data = date("Y-m-d");
    $titulo = $_REQUEST['titulo'];

    $conexao = new mysqli('localhost', 'root', '123456', 'cadastro');

    $createPost = $conexao->prepare("INSERT INTO postagens (titulo, conteudo, data) VALUES (?,?,?)");
    $createPost -> bind_param("sss", $titulo, $conteudo, $data);
    $createPost->execute();

    if($createPost->error){
        echo "<p>Houve um erro na inserção dos dados</p>";
    }else{
        header("Location: feed.php");
    }
?>