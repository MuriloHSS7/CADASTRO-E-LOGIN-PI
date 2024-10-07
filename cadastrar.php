<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastro";

    // Conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if($conn->connect_error){
        die("Falha na conexão: " . $con->connect_error);
    }

    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha =  password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Insere os dados da tabela usuários
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if($conn->query($sql)=== TRUE){
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>