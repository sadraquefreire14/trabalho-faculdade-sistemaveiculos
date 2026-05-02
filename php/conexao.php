<?php
/**
 * Arquivo de conexão com o banco de dados MySQL
 * 
 * IMPORTANTE: Altere as credenciais abaixo conforme sua configuração local
 */

$host = "localhost";      // Servidor do banco de dados
$user = "root";           // Usuário do MySQL
$pass = "";               // Senha do MySQL (deixe vazio se não tiver senha no XAMPP)
$db   = "concessionaria"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die(json_encode([
        "sucesso" => false,
        "mensagem" => "Erro na conexão com o banco de dados: " . $conn->connect_error
    ]));
}

// Define o charset para UTF-8 (suporte a acentos)
$conn->set_charset("utf8");

// Descomente a linha abaixo para debug
// echo "Conexão estabelecida com sucesso!";
?>