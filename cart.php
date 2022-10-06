<?php
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
$page = "./cart.php";
if ($total_val > 0) {
    $page = "./payment.php";
} else {
    $page = "./cart.php";
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
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" height="80" width="80">

                    <a href="./index.php"><button>Log out</button></a>
                    <a href="./home.php"> <button>
                            Home
                        </button></a>
                </div>
            </div>

            <form action="./php/cart-function.php" method="POST">
                <div class="body-cart">
                    <table id="myTable">

                    </table>
                </div>


            </form>

            <div class="sort-cart">
                <a href="<?= $page ?>"><button>Check Out: ₱<?= $total_val ?></button></a>
            </div>
        </div>
    </div>
</body>
<script src="./javascript/cart.js"></script>

</html>