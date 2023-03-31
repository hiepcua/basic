<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getActiveProduct($company);

    public function getForSearchInventory($productType, $codeOrName);
}
