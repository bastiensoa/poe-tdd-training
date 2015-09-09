<?php

namespace tests\tp2;

use tp2\Person;
use tp2\Enterprise;
use tp2\HRDepartment;

class HRDepartmentTest extends \PHPUnit_Framework_TestCase
{
    protected $department;
    protected $enterprise;
    protected $person1;
    protected $person2;
    protected $person3;

    public function setUp()
    {
        $this->enterprise =  \Phake::mock('tp2\Enterprise');
        $this->department = new HRDepartment($this->enterprise);

        $this->person1 = new Person('Bastien');
        $this->person2 = new Person('toto');
        $this->person3 = new Person('tutu');

        $this->enterprise->add($this->person1);
        $this->enterprise->add($this->person2);
        $this->enterprise->add($this->person3);
    }

    public function testHire()
    {
        $person = new Person('kirikou');
        $this->department->hire($person);
        \Phake::verify($this->enterprise)->add($person);
    }

    public function testFire()
    {
        $this->department->fire($this->person3);
        \Phake::verify($this->enterprise)->remove($this->person3);
    }

    public function testIsEmployee()
    {
        $this->department->isEmployee($this->person1);
        \Phake::verify($this->enterprise)->employ($this->person1);
    }
}