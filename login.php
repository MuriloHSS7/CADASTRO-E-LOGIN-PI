<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastro";

    // Conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca o usuário no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email='email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        // Verifica a senha
        if(password_verify($senha, $row['senha'])){
            $_SESSION['nome'] = $row['nome'];
            echo "Bem-vindo ao sistema, " . $_session['nome'] . "!";
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $conn->close();
?>