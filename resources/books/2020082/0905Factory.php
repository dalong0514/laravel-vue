<?php

abstract class ApptEncoder {
    abstract public function encode(): string;
}

class BloggsApptEncoder extends ApptEncoder {
    public function encode(): string
    {
        return "Appointment data encoded in BloggsCal format\n";
    }
}

class MegaApptEncoder extends ApptEncoder {
    public function encode(): string
    {
        return "Appointment data encoded in MegaCal format\n";
    }
}

class CommsManager {
    const BLOGGS = 1;
    const MEGA = 2;
    private $mode;

    public function __construct(int $mode)
    {
        $this->mode = $mode;
    }
     
    public function getApptEncoder(): ApptEncoder {
        switch ($this->mode) {
            case (self::BLOGGS):
                return new BloggsApptEncoder();
            default:
                return new MegaApptEncoder();
        }
        
    }

    public function getHeaderText(): string {
        switch ($this->mode) {
            case (self::BLOGGS):
                return "BloggsCal header\n";
            default:
                return "MegaCal header\n";
        }
        
    }
}

$man = new CommsManager(CommsManager::MEGA);
echo (get_class($man->getApptEncoder())) . "\n";
$man = new CommsManager(CommsManager::BLOGGS);
echo (get_class($man->getApptEncoder())) . "\n";