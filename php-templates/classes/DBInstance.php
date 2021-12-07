<?php
abstract class DBInstance
{
    protected $id;
    public function getID()
    {
        return htmlentities($this->id);
    }
}
