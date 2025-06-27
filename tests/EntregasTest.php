<?php
use PHPUnit\Framework\TestCase;

class EntregasTest extends TestCase
{
    protected function setUp(): void
    {
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $_SERVER['HTTP_HOST'] = 'localhost:8000';
    }

    private function callApiEndpoint(string $path): array
    {
        $_SERVER['REQUEST_URI'] = $path;
        $_SERVER['REQUEST_METHOD'] = 'GET';
        
        ob_start();
        include __DIR__ . '/../index.php';
        $output = ob_get_clean();
        
        return json_decode($output, true);
    }

    public function testStatusRoute()
    {
        $response = $this->callApiEndpoint('/status');
        $this->assertEquals(['status' => 'ok'], $response);
    }

    public function testEntregasRoute()
    {
        $response = $this->callApiEndpoint('/entregas_em_transito');
        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(10, count($response));
        
        // Verifica a estrutura do primeiro item
        $this->assertArrayHasKey('id_entrega', $response[0]);
        $this->assertArrayHasKey('codigo_rastreio_publico', $response[0]);
    }
}