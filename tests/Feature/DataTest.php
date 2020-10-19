<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;
use App\Models\Services\JsonRpcClient;

class DataTest extends TestCase
{
    /**
     * Create test
     *
     * @return string
     */
    public function testCreate()
    {
        $client = new JsonRpcClient();
        $page_uid = uniqid();
        $data = $client->send('create', ['page_uid' => $page_uid, 'title' => 'test', 'body' => 'test']);
        $this->assertTrue($data['result']['page_uid'] == $page_uid);

        return $page_uid;
    }

    /**
     * getPageById test
     *
     * @param string $page_uid
     * @depends testCreate
     *
     * @return void
     */
    public function testGetPageById(string $page_uid)
    {
        $client = new JsonRpcClient();
        $data = $client->send('getPageById', ['page_uid' => $page_uid]);
        $this->assertTrue($data['result']['title'] == 'test');
    }
}
