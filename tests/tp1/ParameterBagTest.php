<?php

namespace tests\tp1;

use tp1\ParameterBag;

class ParameterBagTest extends \PHPUnit_Framework_TestCase
{
    protected $bag;

    public function setUp()
    {
        $this->bag = new ParameterBag(array('foo' => 'bar', 'baz' => 'zab', 'toto' => 'tata', 'int' => 1234));
    }

    public function testCount()
    {
        $this->assertEquals(4, $this->bag->count());
    }

    public function testGet()
    {
        $this->assertEquals('bar', $this->bag->get('foo'));
    }

    public function testGetInt()
    {
        $this->assertEquals(0 , $this->bag->getInt('foo'));
        $this->assertEquals(1234 , $this->bag->getInt('int'));
        $this->assertEquals(9 , $this->bag->getInt('inconnu', 9));
    }

    public function testSet()
    {
        $this->assertEquals($this->bag->get('toto') , $this->bag->set('toto', 'tutu'));
    }

    public function testHas()
    {

    }

    public function testRemove()
    {

    }

    public function testAll()
    {

    }

    public function testKeys()
    {

    }

    public function testAdd()
    {

    }
}
