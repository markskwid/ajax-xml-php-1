<?php
session_start();
$xml = new DOMDocument();

if (isset($_POST['remove-item'])) {
    $item_data = explode("-", $_POST['remove-item']);
    $item_category = $item_data[0];
    $item_id = $item_data[1];

    if ($item_category == "food") {
        $xml->Load('../xml/food.xml');
        $item = $xml->getElementsByTagName("food");

        foreach ($item as $get_item) {
            $get_id = $get_item->getAttribute("id");

            if ($item_id == $get_id) {
                $xml->getElementsByTagName("foods")->item(0)->removeChild($get_item);
                $xml->save("../xml/food.xml");
                header('location: ../inventory.php');
                break;
            }
        }
    } else if ($item_category == "drinks") {
        $xml->Load('../xml/drinks.xml');
        $item = $xml->getElementsByTagName("drink");

        foreach ($item as $get_item) {
            $get_id = $get_item->getAttribute("id");

            if ($item_id == $get_id) {
                $xml->getElementsByTagName("drinks")->item(0)->removeChild($get_item);
                $xml->save("../xml/drinks.xml");
                header('location: ../inventory.php');
                break;
            }
        }
    } else if ($item_category == "sweets") {
        $xml->Load('../xml/dessert.xml');
        $item = $xml->getElementsByTagName("dessert");

        foreach ($item as $get_item) {
            $get_id = $get_item->getAttribute("id");

            if ($item_id == $get_id) {
                $xml->getElementsByTagName("desserts")->item(0)->removeChild($get_item);
                $xml->save("../xml/dessert.xml");
                header('location: ../inventory.php');
                break;
            }
        }
    }
}

if (isset($_POST['edit-item'])) {
    $item_data = explode("-", $_POST['edit-item']);
    $item_category = $item_data[0];
    $item_id = $item_data[1];
    $_SESSION['item-info'] = $item_data;
    header("location: ../edit.php");
}

if (isset($_POST['submit-edit'])) {
    $new_name = $_POST['name'];
    $new_desc = $_POST['description'];
    $new_qty = $_POST['quantity'];
    $new_price = $_POST['price'];
}
