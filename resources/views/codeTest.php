<?php

// use APP\ShopProduct;

class ShopProduct {
    public $title = 'default product';
    public $productMainName = 'main name';
    public $productFirstName = 'first name';
    public $price = 0;

    public function getProducer() {
        return $this->productFirstName . ' ' . $this->productMainName;
    }
}

$product = new ShopProduct();
dd($product->title);