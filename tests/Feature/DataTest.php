<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;
use App\Models\Services\JsonRpcClient;

class DataTest extends TestCase
{
    public function testCreate()
    {
        $client = new JsonRpcClient();
        $page_uid = uniqid();
        $data = $client->send('create', ['page_uid' => $page_uid, 'title' => 'test', 'body' => 'test']);
        $this->assertTrue($data['result']['page_uid'] == $page_uid);
    }
}
