<?php
include_once 'DBInstance.php';

class Product extends DBInstance
{
    protected $name;
    protected $category;
    protected $price;
    protected $description;
    protected $img;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    function setDetails($args)
    {
        // print_r($args);
        if ($args[2] <= 6 && $args[2] >= 0) {
            // echo $priceCatString . " Desc: $args[2]";
            $this->price = $args[0];
            $this->img = $args[1];
            $this->category = $args[2];
            $this->description = $args[3];
        }
    }
    //overriden  
    function getCategory()
    {
        switch ($this->category) {
            case 0:
                return 'Others';
            default:
                return 'No Category';
        }
    }
    function getName()
    {
        return htmlentities($this->name);
    }
    function getImg()
    {
        return htmlentities($this->img);
    }
    function getPrice()
    {
        return htmlentities($this->price);
    }
    function getDescription()
    {
        return nl2br(htmlentities($this->description));
    }
    function productDisplayStr($index)
    {
        return '
            <div class="h-100">  
        <div class="card mb-5 h-100">
            <img class="card-img-top" src="' . $this->img . '" alt="' . $index . ' ' . $this->name . '" />
            <div class="card-body p-4 text-center">
                <h5 class="fw-bolder" style="color:#d8c47f;">' . $this->name . '</h5>
                ₱ ' . $this->price . '
            </div>
            <!-- Product actions-->
             <div class="text-center p-4 pt-0">
                <button class="btn btn-outline-dark mt-auto px-4" id="product_view_' . $index . '"> View Product </button>
            </div>  
        </div>
        </div> ';
    }
}

class SleepingEssential extends Product
{
    function getCategory()
    {
        switch ($this->category) {
            case 1:
                return 'Eye Mask';
            case 2:
                return 'Pillow Case';
            default:
                return 'No Category';
        }
    }
}

class SleepWear extends Product
{
    private $size;
    function getCategory()
    {
        switch ($this->category) {
            case 3:
                return 'Shorts';
            case 4:
                return 'Pajama';
            case 5:
                return 'Nightdress';
            case 6:
                return 'Loungewear';
            default:
                return 'No Category';
        }
    }
    //0 = free size, 1 = plus size, 2 = one size, 
    //3 = Free Size, Plus Size, 4 = free size, one size,
    //5 = plus size, one size, 6 = free size, plus size, one size
    function setSize($size)
    {
        switch ($size) {
            case 0:
                $this->size = "Free Size";
                break;
            case 1:
                $this->size = "Plus Size";
                break;
            case 2:
                $this->size = "One Size";
                break;
            case 3:
                $this->size = "Free Size, Plus Size";
                break;
            case 4:
                $this->size = "Free Size, One Size";
                break;
            case 5:
                $this->size = "Plus Size, One Size";
                break;
            case 6:
                $this->size = "Free Size, Plus Size, One Size";
                break;
            default:
                echo 'Error setting size';
        }
    }
    function getSize()
    {
        return $this->size;
    }
}
