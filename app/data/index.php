<?php
    include('./sum_total.php');
    $shoes = json_decode(file_get_contents('shoes.json'));
    session_start();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cart.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <?php foreach ($shoes as $shoes): ?>
                        <div class="card">
                            <div class="top">
                                <img src="../assets/nike.png" class="logo">
                                <p class="title">Our Products</p>
                            </div>
                            <div class="cardbody">
                                <?php $length = count($shoes);
                                for($i=0; $i<$length; $i++): ?>
                                    <div class="shopItem">
                                        <div class="shopItem_Image" style="background-color: <?php echo $shoes[$i]->color ?>">
                                            <img src="<?php echo $shoes[$i]->image?>">
                                        </div>
                                        <p class="shopItem_Name"><?php echo $shoes[$i]->name ?></p>
                                        <p class="shopItem_Des"><?php echo $shoes[$i]->description ?></p>
                                        <div class="shop_bottom">
                                            <p class="shopItem_Price">$<?php echo $shoes[$i]->price ?></p>
                                            <a href="add_to_cart.php?id=<?php echo $shoes[$i]->id ?>" class="shopItem_Button" onclick="../assets/check.png">Add to cart</a>
                                        </div>
                                    </div>
                                <?php endfor;?>
                    
                            </div>

                        </div>
                    <?php endforeach; ?>
                
                
                <div class="card">
                    <div class="top">
                        <img src="../assets/nike.png" class="logo">
                        <p class="title">Your Cart</p>
                        <p class="title2">$<?php echo sum_total(isset($_SESSION['cart'])) ?></p>
                        <?php if(!($_SESSION['cart'])) {?>
                            <p>Your cart is empty</p>
                        <?php }?>
                        <?php if(isset($_SESSION['cart'])) {?>
                            <?php foreach($_SESSION['cart'] as $value){ ?>
                                <div class="cardbody">
                                    <div class="cartItem">
                                        <div class="cartItem_Left">
                                            <div class="cartItem_Image" style="background-color: <?php echo $value->color ?>">
                                                <img src="<?php echo $value->image ?>">
                                            </div>
                                        </div>
                                        <div class="cartItem_Right">
                                            <p class="cartItem_Name"><?php echo $value->name?></p>
                                            <p class="cartItem_Price">$<?php echo $value->price?></p>
                                            
                                            <form class="cartAction" method='post'>
                                                <div class="cartItem_Count">
                                                    <button class="cartItem_CountButton" name="decqty">
                                                        <img src="../assets/minus.png" >
                                                    </button>
                                                    <input readonly="readonly" type="text" name='quantity' class="cartItem_Number" value="<?php echo update_quantity(isset($_SESSION['cart'])) ?>">
                                                    <input type="hidden" name="product">
                                                    <button class="cartItem_CountButton" name="incqty">
                                                        <img src="../assets/plus.png">
                                                    </button>
                                                    
                                                    <a href="add_to_cart.php?remove-item-id=<?php echo $value->id ?>" class="cartItem_Remove"><img src="../assets/trash.png" ></a>
                                                </div>
                                               
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php }?>
                        
                        </div>
                    </div>
                </div>
        </div>
    </body>
</html>