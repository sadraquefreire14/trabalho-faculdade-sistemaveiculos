-- ============================================
-- Script SQL para criar o banco de dados
-- e a tabela de veículos
-- ============================================

-- Cria o banco de dados (se não existir)
CREATE DATABASE IF NOT EXISTS concessionaria 
    CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci;

-- Seleciona o banco de dados
USE concessionaria;

-- Cria a tabela de veículos
CREATE TABLE IF NOT EXISTS veiculos (
    id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificador único do veículo',
    placa VARCHAR(10) NOT NULL COMMENT 'Placa do veículo',
    marca VARCHAR(50) NOT NULL COMMENT 'Marca do veículo',
    modelo VARCHAR(50) NOT NULL COMMENT 'Modelo do veículo',
    ano_fabricacao INT NOT NULL COMMENT 'Ano de fabricação',
    ano_modelo INT NOT NULL COMMENT 'Ano do modelo',
    cor VARCHAR(30) NOT NULL COMMENT 'Cor do veículo',
    combustivel VARCHAR(30) NOT NULL COMMENT 'Tipo de combustível',
    quilometragem INT NOT NULL COMMENT 'Quilometragem atual',
    chassi VARCHAR(50) NOT NULL COMMENT 'Número do chassi',
    renavam VARCHAR(50) NOT NULL COMMENT 'Número do Renavam',
    data_cadastro DATE NOT NULL COMMENT 'Data do cadastro no sistema',
    observacoes TEXT NOT NULL COMMENT 'Observações sobre o veículo',

    -- Índices para melhorar performance em consultas frequentes
    INDEX idx_placa (placa),
    INDEX idx_marca (marca),
    INDEX idx_ano_fab (ano_fabricacao)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Comando para verificar a estrutura criada
-- DESCRIBE veiculos;

-- Exemplo de inserção de dados de teste (opcional):
-- INSERT INTO veiculos (placa, marca, modelo, ano_fabricacao, ano_modelo, cor, combustivel, quilometragem, chassi, renavam, data_cadastro, observacoes) 
-- VALUES ('ABC-1234', 'Toyota', 'Corolla', 2023, 2024, 'Prata', 'Flex', 15000, '9BWZZZ377VT004251', '12345678901', '2024-01-15', 'Veículo em excelente estado, único dono');
