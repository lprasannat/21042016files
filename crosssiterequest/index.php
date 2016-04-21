<?php
session_start();
require 'classes/token.php';
if(isset($_POST['quantity'],$_POST['product'],$_POST['token'])){
    $product=$_POST['product'];
    $quantity=$_POST['quantity'];
    if(!empty($product)&&($quantity)){
        if(Token::check($_POST['token'])){
        echo "process order";
        }
    }
}
?>
<html>
    <head>
        <title>Cross Site Request Forgery</title>
    </head>
    <body>
        <form action="" method="post">
            <div class="product">
                <strong>Product</strong>
                <div class="field">
                   Quantity: <input type="text" name="quantity">
                </div>
                <input type="submit" value="Order">
                <input type="hidden" name="product" value="1">
                <input type="hidden" name="token" value="<?php echo Token::generate()?>">
            </div>
        </form>
    </body>
</html>
