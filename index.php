<?php

header('Content-Type: application/json');

$rota = $_SERVER['REQUEST_URI'];

if ($rota === '/status') {
    echo json_encode(['status' => 'ok']);
    exit;
}

if ($rota === '/entregas_em_transito') {
    $json = file_get_contents(__DIR__ . '/entregas.json');
    echo $json;
    exit;
}

http_response_code(404);
echo json_encode(['erro' => 'Rota não encontrada']);
