<?php
//abstraction
abstract class DBInstance
{
    protected $id;
    protected abstract function getID();
}
//inheritance
class Product extends DBInstance
{
    protected $name;
    protected $category;
    protected $price;
    protected $description;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    //overloading
    public function __call($fname, $args)
    {
        switch ($fname) {
            case 'setDetails': //params: price, categ, desc, size
                if ($args[1] < 6 && $args[1] >= 0) {
                    $counter = count($args);
                    // $priceCatString = "Price: $args[0] Categ: " . $args[1];
                    switch ($counter) {
                        case 2:
                            // echo $priceCatString;
                            $this->price = $args[0];
                            $this->category = $args[1];
                            break;
                        case 3:
                            // echo $priceCatString . " Desc: $args[2]";
                            $this->price = $args[0];
                            $this->category = $args[1];
                            $this->description = $args[2];
                            break;
                        default:
                            echo 'admk;n';
                    }
                }
                break;
        }
    }
    function getID()
    {
        return $this->id;
    }
    // function getPrice()
    // {
    // }
    function display()
    {  //overriden  
    }
}
class SleepingEssentials extends Product
{
    function getCategory()
    {
        switch ($this->category) {
            case 0:
                return 'Eye Mask';
            case 1:
                return 'Pillow Case';
            default:
                return 'No Category';
        }
    }
    function display()
    {
        echo
        "ProductID: " . $this->id . "<br/>" .
            "Name: " . $this->name . "<br/>" .
            "Category: " . $this->getCategory() . "<br/>" .
            "Price: P" . $this->price . "<br/>" .
            "Description: " . $this->description . "<br/>";
    }
}
class SleepWear extends Product
{
    private $size;
    function getCategory()
    {
        switch ($this->category) {
            case 2:
                return 'Shorts';
            case 3:
                return 'Pajama';
            case 4:
                return 'Nightdress';
            case 5:
                return 'Loungewear';
            default:
                return 'No Category';
        }
    }
    function setSize($size) //0 = free size, 1 = plus size
    {
        switch ($size) {
            case 0:
                $this->size = "Free Size";
                break;
            case 1:
                $this->size = "Plus Size";
                break;
            default:
                echo 'Error setting size';
        }
    }
    // function getSize()
    // {
    //     return $this->size;
    // }
    //override
    function display()
    {
        echo
        "ProductID: " . $this->id . "<br/>" .
            "Name: " . $this->name . "<br/>" .
            "Category: " . $this->getCategory($this->category) . "<br/>" .
            "Price: P" . $this->price . "<br/>" .
            "Description: " . $this->description . "<br/>" .
            "Size: " . $this->size . "<br/>";
    }
}

$newProduct = new SleepWear('1', "Long Pajama");
$newProduct->setDetails(10, 3, "jgpi ap fawd fnwe fiwe n fwne fadjfiwope fsd ");
$newProduct->setSize(0);
$newProduct->display();

// $newProduct2 = new SleepingEssentials('1', "Long Pajama");