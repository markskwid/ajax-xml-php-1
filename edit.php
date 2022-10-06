<?php
session_start();

$name = "";
$price = "";
$description = "";
$quantity = "";
$item_id = $_SESSION['item-info'][1];
$image = "";
$chosen_itemID = $_SESSION['item-info'][1];

$xml = new DOMDocument();
if ($_SESSION['item-info'][0] == 'food') {
    $xml->load("./xml/food.xml");
    $item = $xml->getElementsByTagName("food");

    foreach ($item as $get_item) {
        $id = $get_item->getAttribute("id");
        if ($id == $item_id) {
            $name = $get_item->getElementsByTagName("name")->item(0)->nodeValue;
            $description = $get_item->getElementsByTagName("description")->item(0)->nodeValue;
            $price = $get_item->getElementsByTagName("price")->item(0)->nodeValue;
            $quantity = $get_item->getElementsByTagName("quantity")->item(0)->nodeValue;
            $image = $get_item->getElementsByTagName("image")->item(0)->nodeValue;
        }
    }
} else if ($_SESSION['item-info'][0] == 'drinks') {
    $xml->load("./xml/drinks.xml");
    $item = $xml->getElementsByTagName("drink");

    foreach ($item as $get_item) {
        $id = $get_item->getAttribute("id");
        if ($id == $item_id) {
            $name = $get_item->getElementsByTagName("name")->item(0)->nodeValue;
            $description = $get_item->getElementsByTagName("description")->item(0)->nodeValue;
            $price = $get_item->getElementsByTagName("price")->item(0)->nodeValue;
            $quantity = $get_item->getElementsByTagName("quantity")->item(0)->nodeValue;
            $image = $get_item->getElementsByTagName("image")->item(0)->nodeValue;
        }
    }
} else if ($_SESSION['item-info'][0] == 'sweets') {
    $xml->load("./xml/dessert.xml");
    $item = $xml->getElementsByTagName("dessert");

    foreach ($item as $get_item) {
        $id = $get_item->getAttribute("id");
        if ($id == $item_id) {
            $name = $get_item->getElementsByTagName("name")->item(0)->nodeValue;
            $description = $get_item->getElementsByTagName("description")->item(0)->nodeValue;
            $price = $get_item->getElementsByTagName("price")->item(0)->nodeValue;
            $quantity = $get_item->getElementsByTagName("quantity")->item(0)->nodeValue;
            $image = $get_item->getElementsByTagName("image")->item(0)->nodeValue;
        }
    }
}

if (isset($_POST['submit-edit'])) {
    $new_name = $_POST['name'];
    $new_description = $_POST['description'];
    $new_quantity = $_POST['quantity'];
    $new_price = $_POST['price'];
    $new_category = $_POST['category'];
    if ($_SESSION['item-info'][0] == "food") {
        $xml->load("./xml/food.xml");
        $item = $xml->getElementsByTagName("food");
        $node = $xml->createElement('food');
        if ($_FILES['image']['size'] == 0) {
            $node->setAttribute("id", $chosen_itemID);
            $node->appendChild($xml->createElement('name', $new_name));
            $node->appendChild($xml->createElement('description', $new_description));
            $node->appendChild($xml->createElement('price', $new_price));
            $node->appendChild($xml->createElement('quantity', $new_quantity));
            $node->appendChild($xml->createElement("image", $image));
        } else {
            if ($_FILES['image']['error'] == 0) {
                $destination = "./images/" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                $node->setAttribute("id", $chosen_itemID);
                $node->appendChild($xml->createElement('name', $new_name));
                $node->appendChild($xml->createElement('description', $new_description));
                $node->appendChild($xml->createElement('price', $new_price));
                $node->appendChild($xml->createElement('quantity', $new_quantity));
                $node->appendChild($xml->createElement("image", $_FILES['image']['name']));
            }
        }
        $id = 0;
        foreach ($item as $get_item) {
            $id = $get_item->getAttribute("id");
            if ($id == $chosen_itemID) {
                $xml->getElementsByTagName("foods")->item(0)->replaceChild($node, $get_item);
                $save = $xml->save("./xml/food.xml");
                if ($save) {
                    header("location: ./inventory.php");
                } else {
                    echo "failed";
                }
            }
        }
    } else  if ($_SESSION['item-info'][0] == "drinks") {
        $xml->load("./xml/drinks.xml");
        $item = $xml->getElementsByTagName("drink");
        $node = $xml->createElement('drink');
        if ($_FILES['image']['size'] == 0) {
            $node->setAttribute("id", $chosen_itemID);
            $node->appendChild($xml->createElement('name', $new_name));
            $node->appendChild($xml->createElement('description', $new_description));
            $node->appendChild($xml->createElement('price', $new_price));
            $node->appendChild($xml->createElement('quantity', $new_quantity));
            $node->appendChild($xml->createElement("image", $image));
        } else {
            if ($_FILES['image']['error'] == 0) {
                $destination = "./images/" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                $node->setAttribute("id", $chosen_itemID);
                $node->appendChild($xml->createElement('name', $new_name));
                $node->appendChild($xml->createElement('description', $new_description));
                $node->appendChild($xml->createElement('price', $new_price));
                $node->appendChild($xml->createElement('quantity', $new_quantity));
                $node->appendChild($xml->createElement("image", $_FILES['image']['name']));
            }
        }
        $id = 0;
        foreach ($item as $get_item) {
            $id = $get_item->getAttribute("id");
            if ($id == $chosen_itemID) {
                $xml->getElementsByTagName("drinks")->item(0)->replaceChild($node, $get_item);
                $save = $xml->save("./xml/drinks.xml");
                if ($save) {
                    header("location: ./inventory.php");
                } else {
                    echo "failed";
                }
            }
        }
    } else  if ($_SESSION['item-info'][0] == "sweets") {
        $xml->load("./xml/dessert.xml");
        $item = $xml->getElementsByTagName("dessert");
        $node = $xml->createElement('dessert');
        if ($_FILES['image']['size'] == 0) {
            $node->setAttribute("id", $chosen_itemID);
            $node->appendChild($xml->createElement('name', $new_name));
            $node->appendChild($xml->createElement('description', $new_description));
            $node->appendChild($xml->createElement('price', $new_price));
            $node->appendChild($xml->createElement('quantity', $new_quantity));
            $node->appendChild($xml->createElement("image", $image));
        } else {
            if ($_FILES['image']['error'] == 0) {
                $destination = "./images/" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                $node->setAttribute("id", $chosen_itemID);
                $node->appendChild($xml->createElement('name', $new_name));
                $node->appendChild($xml->createElement('description', $new_description));
                $node->appendChild($xml->createElement('price', $new_price));
                $node->appendChild($xml->createElement('quantity', $new_quantity));
                $node->appendChild($xml->createElement("image", $_FILES['image']['name']));
            }
        }
        $id = 0;
        foreach ($item as $get_item) {
            $id = $get_item->getAttribute("id");
            if ($id == $chosen_itemID) {
                $xml->getElementsByTagName("desserts")->item(0)->replaceChild($node, $get_item);
                $save = $xml->save("./xml/dessert.xml");
                if ($save) {
                    header("location: ./inventory.php");
                } else {
                    echo "failed";
                }
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
    <title>Edit</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" height="80" width="80">

                    <a href="./index.php"><button>Log out</button></a>
                    <a href="./inventory.php"> <button>
                            Inventory
                        </button></a>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="body-cart">
                    <input type="text" value="<?= $_SESSION['item-info'][0] ?>" name="category" placeholder="Category" disabled>
                    <input type="text" value="<?= $name ?>" name="name" placeholder="Name">
                    <input type="text" value="<?= $description ?>" name="description" placeholder="Description">
                    <input type="text" value="<?= $price ?>" name="price" placeholder="Price">
                    <input type="text" value="<?= $quantity ?>" name="quantity" placeholder="Quantity">
                    <input type="file" name="image" placeholder="Image">
                    <button type="submit" class="add-sub" name="submit-edit">Confirm Update</button>
                </div>
            </form>

        </div>
    </div>
</body>
<script src="./javascript/cart.js"></script>

</html>