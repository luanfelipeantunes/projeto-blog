<?php 
        session_start();
        

        $email = $_REQUEST['email'];
        $conexao = new mysqli("localhost", "root", "123456", "cadastro");

        $stmt = $conexao->prepare("SELECT nome FROM users WHERE email = ?");
        
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> bind_result($nome);
        $stmt -> fetch();
        $_SESSION['nomeUsuario']=$nome;

        header("Location: feed.php");

    
    ?>