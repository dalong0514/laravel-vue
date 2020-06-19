<?php
class StaticExample {
    static public $aNum = 0;
    public static function sayHello() {
        self::$aNum++;
        print "hello (". self::$aNum .")\n";
    }
}

print StaticExample::$aNum . "\n";
StaticExample::sayHello();