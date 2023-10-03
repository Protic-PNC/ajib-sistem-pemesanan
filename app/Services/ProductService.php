<?php

namespace App\Services;

class ProductService extends BaseService
{
    public function getProducts(int $branch_id = null)
    {
        $params = [];
        if (!is_null($branch_id)) $params["branch"] = $branch_id;

        $response = $this->request()->get(
            'https://sso-ajib-dev.protic.web.id/api/product',
            $params
        );
        $products = $response->json("data", []);

        return $products;
    }

    public function getProductById(int $branch_id, int $id): array | null
    {
        $response = $this->request()->get('https://sso-ajib-dev.protic.web.id/api/product', [
            "branch" => $branch_id,
            "id" => $id
        ]);
        $products = $response->json("data.0");

        return $products;
    }
}
