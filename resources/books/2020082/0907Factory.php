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

abstract class CommsManager {
    abstract public function getHeaderText(): string;
    abstract public function getApptEncoder(): ApptEncoder;
    abstract public function getTtdEncoder(): getTtdEncoder;
    abstract public function getContactEncoder(): getContactEncoder;
    abstract public function getFooterText(): string;
}

class BloggsCommsManager extends CommsManager {
    
    public function getHeaderText(): string {
        return "BloggsCal header\n";
    }

    public function getApptEncoder(): ApptEncoder {
        return new BloggsApptEncoder();
    }

    public function getTtdEncoder(): TtEncoder {
        return new BloggsTtdEncoder();
    }

    public function getContactEncoder(): ContactEncoder {
        return new BloggsContactEncoder();
    }

    public function getFooterText(): string {
        return "BloggsCal footer\n";
    }
}

$mgr = new BloggsCommsManager();
echo $mgr->getHeaderText();
echo $mgr->getApptEncoder()->encode();
echo $mgr->getFooterText();