<?php

use PHPUnit\Framework\TestCase;

class EntregasTest extends TestCase
{
    public function testStatusRoute()
    {
        $response = file_get_contents('http://localhost:8000/status');
        $this->assertStringContainsString('ok', $response);
    }

    public function testEntregasRoute()
    {
        $response = file_get_contents('http://localhost:8000/entregas_em_transito');
        $data = json_decode($response, true);
        $this->assertIsArray($data);
        $this->assertGreaterThanOrEqual(2, count($data));
    }
}
