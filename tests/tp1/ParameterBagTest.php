<?php

namespace tests\tp1;

use tp1\ParameterBag;

class ParameterBagTest extends \PHPUnit_Framework_TestCase
{
    protected $bag;

    public function setUp()
    {
        $this->bag = new ParameterBag(array('foo' => 'bar', 'baz' => 'zab', 'toto' => 'tata', 'int' => '1234'));
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
        $this->assertEquals(0, $this->bag->getInt('foo'));
        $this->assertEquals(1234, $this->bag->getInt('int'));
        $this->assertEquals(9, $this->bag->getInt('inconnu', 9));
    }

    public function testSet()
    {
        $this->bag->set('toto', 'tutu');
        $this->assertEquals('tutu', $this->bag->get('toto'));
    }

    public function testHas()
    {
        $this->assertTrue($this->bag->has('foo'));
    }

    public function testRemove()
    {
        $this->bag->remove('foo');
        $this->assertFalse($this->bag->has('foo'));
    }

    public function testAll()
    {
        $this->assertEquals(array('foo' => 'bar',
                                  'baz' => 'zab',
                                  'toto' => 'tata',
                                  'int' => '1234'
                                  ), 
                            $this->bag->all());
    }

    public function testKeys()
    {
        $this->assertEquals(array('foo',
                                  'baz',
                                  'toto',
                                  'int'
                                  ),
                            $this->bag->keys());
    }

    public function testAdd()
    {
        $this->bag->add(array('test' => 'unitaire'));
        $this->bag->add(array('baz' => 'boz'));
        $this->assertTrue($this->bag->has('test'));
        $this->assertEquals('boz', $this->bag->get('baz'));
    }
}
