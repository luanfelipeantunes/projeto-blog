<?php 

$nome = $_REQUEST['nome'];
$sobrenome = $_REQUEST['sobrenome'];
$email = $_REQUEST['email'];
$senha = $_REQUEST['senha'];

//Conectando ao banco de dados
$conexao = new mysqli('localhost', 'root', '123456', 'cadastro');

//Verifica se o e-mail já existe na base
$stmt = $conexao->prepare("SELECT * FROM users WHERE email=?");
$stmt -> bind_param('s', $email);
$stmt -> execute();

$resultado = $stmt->get_result();

if($resultado->num_rows > 0){
   return "existe";
}

//Se não existe, adicionar ao banco as informações

$insere = $conexao->prepare("INSERT INTO users(nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
$insere->bind_param('ssss', $nome, $sobrenome, $email, $senha);
$insere->execute();

if($insere->error){
    echo "Erro ao inserir dados";
}else{
    header("Location: verifica-nome.php?email=$email");
}



?>