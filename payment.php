<?php
session_start();
$xml = new DOMDocument();
$xml->Load("./xml/cart.xml");
$item = $xml->getElementsByTagName("item");
$newArray = array();
$total_val = 0;
if (sizeof($item) != 0) {
    foreach ($item as $get_item) {
        $value = $get_item->getElementsByTagName("price")->item(0)->nodeValue;
        $newArray[] = $value;
    }

    $total_val = array_sum($newArray);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Cart</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header-payment">
                <div class="logo">
                    <img src="images/logo.png" height="180" width="180">
                </div>
            </div>

            <form action="./php/cart-function.php" method="POST">
                <div class="body-cart-payment">

                    Your Total Bill: <?= $total_val ?><br>
                    <input type="text" name="payment" placeholder="Enter your payment here">
                    <button type="submit" class="btn-pay" name="submit-pay">Confirm Payment</button><br><br>

                </div>
            </form>
        </div>
    </div>
</body>
<script src="./javascript/cart.js"></script>

</html>