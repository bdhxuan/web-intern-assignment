<?php
    session_start();
    require("cart.php");
    require("sum_total.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $cart = new Cart($id);
        $cart->storeProduct();
        header("Location: index.php");
        exit();
    }

    if(isset($_GET['remove-item-id'])){
        $id = $_GET['remove-item-id'];
        $cart = new Cart($id);
        $cart->removeItem();
        header("Location: index.php");
        exit();
    }
       