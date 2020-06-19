<?php
// declare(strict_types=1);  // 显式声明类型检查为严格模式
// use APP\ShopProduct;

class ShopProduct {
    public $numPages;
    public $playLength;
    public $title = 'default product';
    public $producerMainName = 'main name';
    public $producerFirstName = 'first name';
    public $price = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages = 0,
        int $playLength = 0) {
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
        $this->numPages = $numPages;
        $this->playLength = $playLength;
    }

    public function getProducer() {
        return $this->producerFirstName . ' ' . $this->producerMainName;
    }

    public function getSummaryLine() {
        $base = "{$this->title} ({$this->produceMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }
}

class CdProduct extends ShopProduct {
    public function getPlayLength() {
        return $this->playLength;
    }

    public function getSummaryLine() {
        $base = "{$this->title} ({$this->produceMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
}

class BookProduct extends ShopProduct {
    function getNumberOfPages() {
        return $this->numPages;
    }

    public function getSummaryLine() {
        $base = "{$this->title} ({$this->produceMainName}, ";
        $base .= "{$this->producerFirstName} )";
        $base .= ": page count - {$this->numPages}";
        return $base;
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

// $product = new ShopProduct('My Antonia', 'Willa', 'Cather', '6.6');
// $write = new ShopProductWriter();
// $write->write($product);

$product2 = new CdProduct(
    'Exile on Coldharbour Lane',
    'The',
    'Alabama 3',
    10.99,
    0,
    60.33
);
print "artist: {$product2->getProducer()}";