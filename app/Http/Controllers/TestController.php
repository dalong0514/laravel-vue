<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\ShopProduct;
use APP\Box;

class TestController extends Controller
{
    public function codeTest() {
        // $product = new ShopProduct();
        //return $product->getProducer();
        $box = new Box([
            'cat',
            'toy',
            'torch'
        ]);
        dd($box);
    }
}
