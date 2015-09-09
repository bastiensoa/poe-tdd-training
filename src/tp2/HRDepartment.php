<?php

namespace tp2;

use tp2\Person;
use tp2\Enterprise;

class HRDepartment
{
    protected $entreprise;

    public function __construct(Enterprise $entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @throws \tp2\Exception\AlreadyEmployedException When the given person is already an employee
     */
    public function hire(Person $person)
    {
        $this->entreprise->add($person);
    }

    /**
     * @throws \tp2\Exception\NoEmployedException When the given person is not an employee
     */
    public function fire(Person $person)
    {
        $this->entreprise->remove($person);
    }

    /**
     * @return boolean
     */
    public function isEmployee(Person $person)
    {
        $this->entreprise->employ($person);
    }
}