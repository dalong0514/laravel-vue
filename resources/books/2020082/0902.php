<?php

abstract class Employee {
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function fire();
}

class Minion extends Employee {
    public function fire()
    {
        echo "{$this->name}: I'll clear my desk\n";
    }
}

class CluedUp extends Employee {
    public function fire() {
        echo "{$this->name}: I'll call my lawyer\n";
    }
}

class NastyBoss {
    private $employees = [];

    public function addEmployee(Employee $employee) {
        $this->employees[] = $employee;
    }

    public function projectFail() {
        if (count($this->employees) >0 ) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

$boss = new NastyBoss();
$boss->addEmployee(new Minion('harry'));
$boss->addEmployee(new CluedUp('bob'));
$boss->addEmployee(new Minion('mary'));
$boss->projectFail();
$boss->projectFail();
$boss->projectFail();