<?php

class Model
{
    protected $db;
    protected $query;
    public function __construct ()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=baitap1", 'root', '');
    }

    public function query($sql)
    {
        $this->query = $this->db->query($sql);
    }

    public function getAll()
    {
        $data = [];

        while ($row = $this->query->fetchObject()) {
            $data[] = $row;
        }
        return $data;   
}
    public function get()
        {
            return $this->query->fetchObject();
        }
}