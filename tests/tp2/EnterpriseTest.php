<?php

namespace tests\tp2;

use tp2\Enterprise;
use tp2\Person;

class EnterpriseTest extends \PHPUnit_Framework_TestCase
{
    protected $person1;
    protected $person2;
    protected $person3;
    protected $enterprise;

    public function setUp()
    {
        $this->enterprise = new Enterprise();
        $this->person1 = new Person('Bastien');
        $this->person2 = new Person('toto');
        $this->person3 = new Person('tutu');

        $this->enterprise->add($this->person1);
        $this->enterprise->add($this->person2);
        $this->enterprise->add($this->person3);
    }

    public function testAdd()
    {
        $person4 = new Person('titi');
        $this->enterprise->add($person4);
        $this->assertTrue($this->enterprise->employ($person4));
    }

    public function testRemove()
    {
        $this->enterprise->remove($this->person1);
        $this->assertFalse($this->enterprise->employ($this->person1));
    }

    public function testEmploy()
    {
        $this->assertTrue($this->enterprise->employ($this->person3));
    }
}