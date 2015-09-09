<?php

namespace tp2;

use tp2\Person;

class Enterprise
{
    protected $enterprise = array();

    public function add(Person $person)
    {
        $this->enterprise[] = $person;
    }

    public function remove(Person $personToRemove)
    {
        foreach ($this->enterprise as $key => $value) {
            if($personToRemove === $value)
            {
                unset($this->enterprise[$key]);
                break;
            }
        }
    }

    /**
     * @return boolean
     */
    public function employ(Person $person)
    {
        return in_array($person, $this->enterprise);
    }
}