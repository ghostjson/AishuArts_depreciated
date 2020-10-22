<?php

namespace App;

class Cart
{
    public $items; 
    public $totalQuantity;
    public $totalPrice;
    //['id'=> ['quantity'=>,'price'=>,'data'=>],......]
    public function __construct($prevCart){
        if($prevCart != null){
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;
        }else{
            $this->items = [];
            $this->totalQuantity = 0;
            $this->totalPrice = 0;
        }
    }

    public function addItem($id, $product){
        $price = (float) str_replace("₹","",$product->price);
        if(array_key_exists($id, $this->items)){
            $productToAdd = $this->items[$id];
            $productToAdd['quantity']++;
        }else{
            $productToAdd = [ 'quantity'=>1 ,'price'=> $price,'data'=>$product ];
        }
        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice + $price;
    }

    public function updateItem($product_id,$quantity){
        if(array_key_exists($product_id, $this->items)){
            $productToUpdate = $this->items[$product_id];
            $productToUpdate['quantity'] = $quantity;
        }
        $this->items[$product_id] = $productToUpdate;
        $total = 0;
        $quantity = 0;
        foreach($this->items as $item){
            $quantity = $quantity + $item['quantity'];
            $total = $total +($item['price'] * $item['quantity']);
        }
        $this->totalPrice =$total;
        $this->totalQuantity = $quantity;
    }

    public function updatePriceAndQuantity(){
        $total = 0;
        $quantity = 0;
        foreach($this->items as $item){
            $quantity = $quantity + $item['quantity'];
            $total = $total + $item['price'];
        }

        $this->totalQuantity = $quantity;
        $this->totalPrice =$total;
    }
}
