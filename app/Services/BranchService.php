<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class BranchService
{
    private string $token;

    public function __construct()
    {
        $this->token = env("BEARER_TOKEN");
        if (is_null($this->token)) {
            throw new Exception("Missing 'BEARER_TOKEN'");
        }
    }

    public function request()
    {
        return Http::withToken($this->token);
    }

    public function getBranches()
    {
        $response = $this->request()->get('https://sso-ajib-dev.protic.web.id/api/branch');
        $branches = $response->json("data", []);

        return $branches;
    }
}
