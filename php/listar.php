<?php
/**
 * listar.php
 * Consulta todos os veículos no banco de dados
 * Retorna JSON com array de objetos veículo
 */

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once "conexao.php";

// Query para buscar todos os veículos, ordenados do mais recente para o mais antigo
$sql = "SELECT * FROM veiculos ORDER BY id DESC";
$result = $conn->query($sql);

// Verifica se houve erro na query
if (!$result) {
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Erro na consulta: " . $conn->error
    ]);
    $conn->close();
    exit;
}

// Monta o array de veículos
$veiculos = [];

while ($row = $result->fetch_assoc()) {
    $veiculos[] = $row;
}

// Retorna o JSON com a lista de veículos
// Se não houver veículos, retorna array vazio []
echo json_encode($veiculos);

// Fecha a conexão
$conn->close();
?>