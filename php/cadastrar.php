<?php
/**
 * cadastrar.php
 * Recebe dados JSON do front-end e insere no banco de dados
 * Retorna JSON com status da operação
 */

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once "conexao.php";

// Recebe os dados JSON enviados pelo JavaScript
$json = file_get_contents("php://input");
$data = json_decode($json, true);

// Verifica se o JSON foi recebido corretamente
if (!$data) {
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Dados não recebidos ou formato inválido."
    ]);
    exit;
}

// Lista de campos obrigatórios conforme a especificação
$camposObrigatorios = [
    'placa', 'marca', 'modelo', 'ano_fabricacao', 'ano_modelo',
    'cor', 'combustivel', 'quilometragem', 'chassi', 'renavam',
    'data_cadastro', 'observacoes'
];

// Valida se todos os campos obrigatórios estão presentes
foreach ($camposObrigatorios as $campo) {
    if (!isset($data[$campo]) || trim($data[$campo]) === '') {
        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Campo obrigatório não preenchido: " . $campo
        ]);
        exit;
    }
}

// Prepara a query SQL com prepared statement (segurança contra SQL Injection)
$stmt = $conn->prepare("INSERT INTO veiculos 
    (placa, marca, modelo, ano_fabricacao, ano_modelo, cor, combustivel, 
     quilometragem, chassi, renavam, data_cadastro, observacoes) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Define os tipos dos parâmetros: s = string, i = integer
$tipos = "sssiiississs"; 
// placa(s), marca(s), modelo(s), ano_fab(i), ano_mod(i), cor(s), combustivel(s), 
// quilometragem(i), chassi(s), renavam(s), data_cadastro(s), observacoes(s)

$stmt->bind_param($tipos, 
    $data['placa'],
    $data['marca'],
    $data['modelo'],
    $data['ano_fabricacao'],
    $data['ano_modelo'],
    $data['cor'],
    $data['combustivel'],
    $data['quilometragem'],
    $data['chassi'],
    $data['renavam'],
    $data['data_cadastro'],
    $data['observacoes']
);

// Executa a inserção
if ($stmt->execute()) {
    echo json_encode([
        "sucesso" => true,
        "mensagem" => "Veículo cadastrado com sucesso! ID: " . $stmt->insert_id
    ]);
} else {
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Erro ao cadastrar veículo: " . $stmt->error
    ]);
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>