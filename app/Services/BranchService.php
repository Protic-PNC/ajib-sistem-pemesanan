<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class BranchService extends BaseService
{
    public function getBranches()
    {
        $response = $this->request()->get('https://sso-ajib-dev.protic.web.id/api/branch');
        $branches = $response->json("data", []);

        return $branches;
    }
}
