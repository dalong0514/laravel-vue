<?php
// declare(strict_types=1);  // 显式声明类型检查为严格模式
// use APP\ShopProduct;

interface Chargeable {
    public function getPrice(): float;
}

trait PriceUtilities {
    private $taxrate = 17;
    public function calculateTax(float $price): float {
        return ($this->taxrate / 100) * $price;
    }
}

class ShopProduct implements Chargeable {
    private $title;
    private $producerMainName;
    private $producerFirstName;
    protected $price;
    private $discount = 0;

    use PriceUtilities;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price) {
        $this->title = $title;
        $this->producerMainName = $mainName;
        $this->producerFirstName = $firstName;
        $this->price = $price;
    }

    public function getProducerFirstName() {
        return $this->producerFirstName;
    }

    public function getProducerMainName() {
        return $this->producerMainName;
    }

    public function setDiscount(int $num) {
        $this->discount = $num;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getPrice(): float {
        return ($this->price - $this->discount);
    }

    public function getProducer() {
        return $this->producerFirstName . ' ' 
            . $this->producerMainName;
    }

    public function getSummaryLine() {
        $base = "{$this->title} ({$this->produceMainName}, ";
        $base .= "{$this->producerFirstName} )";
        return $base;
    }
}

class CdProduct extends ShopProduct {
    public $playLength;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength = 0) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->playLength = $playLength;
    }

    public function getPlayLength() {
        return $this->playLength;
    }

    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": playing time - {$this->playLength}";
        return $base;
    }
}

class BookProduct extends ShopProduct {
    public $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages = 0) {
        parent::__construct(
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->numPages = $numPages;
    }

    function getNumberOfPages() {
        return $this->numPages;
    }

    public function getSummaryLine() {
        $base = parent::getSummaryLine();
        $base .= ": page count - {$this->numPages}";
        return $base;
    }

    public function getPrice(): float {
        return $this->price;
    }
}

class ShopProductWriter {
    private $products = [];

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    public function write() {
        $str = "";
        foreach ($this->products as $shopProduct) {
            $str .= "{$shopProduct->getTitle()}: ";
            $str .= $shopProduct->getProducer();
            $str .= " ({$shopProduct->getPrice()})\n";
        }
        print $str;
    }
}

abstract class DomainObject {
    private $group;

    public function __construct() {
        $this->group = static::getGroup();
    }

    public static function create(): DomainObject {
        return new static();
    }

    public static function getGroup(): string {
        return "default";
    }
}

class User extends DomainObject {
    //
}

class Document extends DomainObject {
    public static function getGroup(): string {
        return "document";
    }
}

class SpreadSheet extends Document {
    //
}

class Product {
    public $name;
    public $price;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProcessSale {
    private $callbacks;

    public function registerCallback(callable $callback) {
        if (! is_callable($callback)) {
            throw new Exception("callback not callable");
        } 
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product) {
        print "{$product->name}: processing \n";
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}

$logger = function($product) {
    print "logging({$product->name})\n";
};

$processor = new ProcessSale();
$processor->registerCallback($logger);
$processor->sale(new Product("shoes", 6));
print "\n";
$processor->sale(new Product("coffee", 6));
print "\n";

print_r(User::create());
print_r(SpreadSheet::create());

$product = new ShopProduct('My Antonia', 'Willa', 'Cather', '6.6');
print $product->calculateTax(100) . "\n";
$product1 = new ShopProduct('My Antonia', 'Willa', 'Cather', '8.6');
print "The price is {$product->getPrice()}\n";

$write = new ShopProductWriter();
$write->addProduct($product);
$write->addProduct($product1);
$write->write();

$productCd = new CdProduct(
    'Exile on Coldharbour Lane',
    'The',
    'Alabama 3',
    10.99,
    0,
    60.33
);
print "artist: {$productCd->getProducer()}\n";