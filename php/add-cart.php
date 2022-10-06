<?php
$xml = new DOMDocument();
$xml->load("../xml/cart.xml");
$cart = $xml->getElementsByTagName("item");
if (isset($_POST['add-to-cart'])) {
    $added_item = explode("-", $_POST['add-to-cart']);
    $get_id = 0;
    foreach ($cart as $my_items) {
        $get_id = $my_items->getAttribute("id");
    }


    $node = $xml->createElement("item");
    $node->setAttribute("id", $get_id + 1);
    $node->appendChild($xml->createElement("name", trim($added_item[1])));
    $node->appendChild($xml->createElement("category", trim($added_item[0])));
    $node->appendChild($xml->createElement("price", trim($added_item[2])));
    $xml->getElementsByTagName('items')->item(0)->appendChild($node);
    $test = $xml->save('../xml/cart.xml');
}
header('location: ../home.php');
