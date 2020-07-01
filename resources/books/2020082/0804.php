<?php
// declare(strict_types=1);  // 显式声明类型检查为严格模式

// listing 0801

abstract class Lesson {
    protected $duration;
    const FIXED= 1;
    const TIMED = 2;
    private $costtype;

    public function __construct(int $duration, int $costtype = 1) {
        $this->duration = $duration;
        $this->costtype = $costtype;
    }

    public function cost(): int {
        switch ($this->costtype) {
            case self::TIMED:
                return (5 * $this->duration);
                break;
            case self::FIXED:
                return 30;
                break;
            default:
                $this->costtype = self::FIXED;
                return 30;
        }
    }

    public function chargeType(): string {
        switch ($this->costtype) {
            case self::TIMED:
                return "hourly rate";
                break;
            case self::FIXED:
                return "fixed rate";
                break;
            default:
                $this->costtype = self::FIXED;
                return "fixed rate";
        }
    }

    // more lesson methods...
}

class Lecture extends Lesson {
    // Lecture-specific implementions...
}

class Seminar extends Lesson {
    // Seminar-specific implementions...
}

$lecture = new Lecture(5, Lesson::FIXED);
echo "{$lecture->cost()}({$lecture->chargeType()})\n";

$seminar = new Seminar(3, Seminar::TIMED);
echo "{$seminar->cost()}({$seminar->chargeType()})\n";