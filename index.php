<?php
header('Content-Type: application/json');

// Extrai o path da URL de forma segura
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
$parsed_url = parse_url($request_uri);
$path = $parsed_url['path'] ?? '/';

if (php_sapi_name() === 'cli') {
    $_SERVER['REQUEST_URI'] = $_SERVER['REQUEST_URI'] ?? '/';
}

// Rotas da API
if ($path === '/status') {
    echo json_encode(['status' => 'ok']);
    exit;
}

if ($path === '/entregas_em_transito') {
    $json_file = __DIR__ . '/entregas.json';
    
    if (!file_exists($json_file)) {
        http_response_code(500);
        echo json_encode(['erro' => 'Arquivo de dados não encontrado']);
        exit;
    }
    
    $json_content = file_get_contents($json_file);
    if ($json_content === false) {
        http_response_code(500);
        echo json_encode(['erro' => 'Erro ao ler arquivo de dados']);
        exit;
    }
    
    echo $json_content;
    exit;
}