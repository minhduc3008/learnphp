<?php

class Employee extends Model
{
    const TABLE = 'employees';

    public function __construct()
    {
        parent::__construct();
        $this->setTable(static::TABLE);
    }
}