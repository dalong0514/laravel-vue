<?php
// declare(strict_types=1);  // 显式声明类型检查为严格模式
// use APP\ShopProduct;

class ShopProduct {
    public $title = 'default product';
    public $productMainName = 'main name';
    public $productFirstName = 'first name';
    public $price = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price) {
        $this->title = $title;
        $this->productMainName = $mainName;
        $this->productFirstName = $firstName;
        $this->price = $price;
    }

    public function getProducer() {
        return $this->productFirstName . ' ' . $this->productMainName;
    }
}

class ShopProductWriter {
    public function write(ShopProduct $shopProduct) {
        $str = $shopProduct->title . ': '
            . $shopProduct->getProducer()
            . '(' . $shopProduct->price . ")\n";
        print $str;
    }
}

$product = new ShopProduct('My Antonia', 'Willa', 'Cather', '6.6');
$write = new ShopProductWriter();
$write->write($product);