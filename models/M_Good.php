<?
class M_Good {
    protected $name;
    protected $price;
    protected $description;
    public function __construct(string $name,float $price, string $description)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getDescript(){
        return $this->description;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function setPrice(float $price){
        $this->price = $price;
    }
    public function setDescript(string $description){
        $this->description = $description;
    }
    

}