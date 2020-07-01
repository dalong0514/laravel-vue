<?php

class Preferences {
    private $props = [];
    private static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new Preferences();
        }
        return self::$instance;
    }

    public function setProperty(string $key, string $val) {
        $this->props[$key] = $val;
    }

    public function getProperty(string $key): string {
        return $this->props[$key];
    }
}

$pref = Preferences::getInstance();
$pref->setProperty("name", "matt");
unset($pref);   // remove the reference
$pref2 = Preferences::getInstance();
$pref2->setProperty("name", "matt");
echo $pref2->getProperty("name") . "\n"; // demonstrate value is not lost