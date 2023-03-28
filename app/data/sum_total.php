<?php


function update_quantity($cart) {
    $quantity= isset($_POST['quantity']) ? $_POST['quantity'] : 1; 
    if(isset($_POST['incqty'])){
        $quantity += 1;
    }
    else if(isset($_POST['decqty'])){
        $quantity -= 1;
    }

    return $quantity;
}

function sum_total($cart)
{
    $sum = 0.00;
    $quantity = update_quantity(isset($_SESSION['cart']));
    foreach($_SESSION['cart'] as $value) {
        $sum +=($quantity * $value->price) ;
    }
    return $sum;
}
