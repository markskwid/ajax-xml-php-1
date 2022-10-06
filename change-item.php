<?php
session_start();
if (isset($_POST['add-to-cart'])) {
    $chosen_item = $_SESSION['chosen-item'];
    $xml = new DOMDocument();
    $xml->Load("./xml/cart.xml");
    $cart_items = $xml->getElementsByTagName("item");
    $replace_item = explode("-", $_POST['add-to-cart']);

    $node = $xml->createElement('item');
    $node->setAttribute("id", $chosen_item);
    $node->appendChild($xml->createElement("name", $replace_item[1]));
    $node->appendChild($xml->createElement("category", $replace_item[0]));
    $node->appendChild($xml->createElement("price", $replace_item[2]));
    $id = 0;
    foreach ($cart_items as $get_carts) {
        $id = $get_carts->getAttribute("id");
        if ($id == $chosen_item) {
            $xml->getElementsByTagName("items")->item(0)->replaceChild($node, $get_carts);
            $save = $xml->save("./xml/cart.xml");
            if ($save) {
                header("location: ./cart.php");
            } else {
                echo "failed";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Change</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" height="80" width="80">

                    <button>Log out</button>
                    <a href="./cart.php"><button>My Cart</button></a>
                </div>
            </div>

            <form method="POST">
                <div class="body" id="bodyContainer">

                </div>
            </form>

            <div class="sort">
                <button id="showAll">All</button>
                <button id="showDrinks">Drinks</button>
                <button id="showFood">Food</button>
                <button id="showSweets">Sweets</button>
            </div>
        </div>
    </div>
</body>
<script src="./javascript/home.js"></script>


</html>