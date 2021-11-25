<?php
abstract class DBInstance
{
    protected $id;
    protected function idExist($id, $src)
    {
        //check if id exists in
        $exists = false;
        switch ($src) {
            case 'administrator':
                // check id existance in administrator db 
                return $exists;
            case 'product':
                // check id existance in products db 
                return $exists;
            case 'inquiry':
                // check id existance in inquiries db 
                return $exists;
            default:
                return true;
        }
    }
    protected abstract function getID();
}
