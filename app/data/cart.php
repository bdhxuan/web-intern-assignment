<?php

class Cart {
    private $product = [];

    public function __construct($id){
        $shoes = json_decode(file_get_contents('shoes.json'));

        foreach ($shoes as $shoes) {
            $length = count($shoes);
            for($i=0; $i<$length; $i++) {
                if($shoes[$i]->id == $id){
                    $this->product = $shoes[$i];
                }
            }
        }
       

    }

    public function storeProduct(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'][] = $this->product;
        }else{
            $ids = [];
            foreach($_SESSION['cart'] as $key => $value) {
                array_push($ids, $value->id);   
            }
            if(!in_array($this->product->id, $ids)){
                $_SESSION['cart'][] = $this->product;
            }
        }
    }

    public function removeItem() {
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $value){
                if($value->id == $this->product->id){
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
}