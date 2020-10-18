<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Services\JsonRpcClient;

class SiteController extends Controller
{
    protected $client;

    public function __construct(JsonRpcClient $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $data = $this->client->send('getPages', []);

        if (!isset($data['result'])) {
            abort(404);
        }

        return view('pages', ['data' => $data['result']]);
    }

    public function show(Request $request, $page_uid)
    {
        $data = $this->client->send('getPageById', ['page_uid' => $page_uid]);

        if (empty($data['result'])) {
            abort(404);
        }

        return view('page', ['data' => $data['result']]);
    }

    public function create()
    {
        return view('create-form');
    }

    public function store(Request $request)
    {
        $data = $this->client->send('create', $request->all());

        if (isset($data['error'])) {
            return Redirect::back()->withErrors($data['error']);
        }

        return view('page', ['data' => $data['result']]);
    }
}
