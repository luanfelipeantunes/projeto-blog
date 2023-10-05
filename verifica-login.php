<?php 

    $email = $_REQUEST['loginEmail'];
    $senha = $_REQUEST['loginSenha'];

    $conexao = new mysqli("localhost", "root", "123456", "cadastro");

    $stmt = $conexao -> prepare("SELECT * FROM users WHERE email = ? and senha = ?");
    $stmt->bind_param('ss', $email, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();



    if($resultado->num_rows > 0){
        header("Location: verifica-nome.php?email=$email");
    }else{
        header("Location: index.html");
    }

?>