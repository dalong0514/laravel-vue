<?php
// declare(strict_types=1);  // 显式声明类型检查为严格模式
abstract class Lesson {
    private $duration;
    private $CostStrategy;

    public function __construct(int $duration, CostStrategy $strategy) {
        $this->duration = $duration;
        $this->CostStrategy = $strategy;
    }

    public function cost(): int {
        return $this->CostStrategy->cost($this);
    }

    public function chargeType(): string {
        return $this->CostStrategy->chargeType();
    }

    public function getDuration(): int {
        return $this->duration;
    }

    // more lesson methods...
}

class Lecture extends Lesson {
    // Lecture-specific implementions...
}

class Seminar extends Lesson {
    // Seminar-specific implementions...
}

abstract class CostStrategy {
    abstract public function cost(Lesson $lesson): int;
    abstract public function chargeType(): string;
}

class TimedCostStrategy extends CostStrategy {
    function cost(Lesson $lesson):int {
        return ($lesson->getDuration() * 5);
    }

    function chargeType(): string {
        return "hourly rate";
    }
}

class FixedCostStrategy extends CostStrategy {
    function cost(Lesson $lesson): int {
        return 30;
    }

    function chargeType(): string {
        return "fixed rate";
    }
}


class RegistrationMgr {
    function register(Lesson $lesson) {
        // do something with the lesson

        // now tell someone
        $notifier = Notifier::getNotifier();
        $notifier->inform("new lesson: cost({$lesson->cost()})");
    }
}
abstract class Notifier {
    public static function getNotifier(): Notifier {
        // acquire concrete class according to configuration or other logic
        if (rand(1, 2) === 1) {
            return new MailNotifier();
        } else {
            return new TextNotifier();
        }
    }
}

class MailNotifier extends Notifier {
    public function inform($message) {
        echo "MAIL notification: {$message}\n";
    }
}

class TextNotifier extends Notifier {
    public function inform($message) {
        echo "TEXT notification: {$message}\n";
    }
}

$lessons[] = new Seminar(4, new TimedCostStrategy);
$lessons[] = new Lecture(4, new FixedCostStrategy);

foreach ($lessons as $lesson) {
    print "lesson charge {$lesson->cost()}. \n";
    echo "Charge type: {$lesson->chargeType()}\n";
}

$mrg = new RegistrationMgr();
$mrg->register(new Seminar(4, new TimedCostStrategy));
$mrg->register(new Lecture(4, new FixedCostStrategy));
