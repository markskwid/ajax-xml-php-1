<?php
session_start();
$xml = new DOMDocument();
$xml->Load('../xml/cart.xml');
$item = $xml->getElementsByTagName("item");
if (isset($_POST['remove-item'])) {
    $chosen_item = $_POST['remove-item'];
    foreach ($item as $get_item) {
        $get_id = $get_item->getAttribute("id");

        if ($chosen_item == $get_id) {
            $xml->getElementsByTagName("items")->item(0)->removeChild($get_item);
            $xml->save("../xml/cart.xml");
            header('location: ../cart.php');
            break;
        }
    }
}

if (isset($_POST['edit-item'])) {
    $_SESSION['chosen-item'] = $_POST['edit-item'];
    header("location: ../change-item.php");
}

if (isset($_POST['add-item'])) {
    $category = strtolower($_POST['category']);

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    if ($category == "food") {
        $xml->load("../xml/food.xml");
        $food = $xml->getElementsByTagName('food');


        if ($_FILES['image']['error'] === 0) {
            $destination = "./images/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $id = 0;
            foreach ($food as $get_food) {
                $id = $get_food->getAttribute('id');
            }

            $node = $xml->createElement("food");
            $node->setAttribute("id", $id + 1);
            $node->appendChild($xml->createElement('name', $name));
            $node->appendChild($xml->createElement('description', $description));
            $node->appendChild($xml->createElement('price', $price));
            $node->appendChild($xml->createElement('quantity', $quantity));
            $node->appendChild($xml->createElement('image', $_FILES['image']['name']));

            $xml->getElementsByTagName('foods')->item(0)->appendChild($node);
            $xml->save('../xml/food.xml');
            header('location: ../home.php');
        }
    } else if ($category == "drinks") {
        $xml->load("../xml/drinks.xml");
        $drinks = $xml->getElementsByTagName('drink');

        if ($_FILES['image']['error'] === 0) {
            $destination = "./images/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $id = 0;
            foreach ($food as $get_food) {
                $id = $get_food->getAttribute('id');
            }

            $node = $xml->createElement("drink");
            $node->setAttribute("id", $id + 1);
            $node->appendChild($xml->createElement('name', $name));
            $node->appendChild($xml->createElement('description', $description));
            $node->appendChild($xml->createElement('price', $price));
            $node->appendChild($xml->createElement('quantity', $quantity));
            $node->appendChild($xml->createElement('image', $_FILES['image']['name']));

            $xml->getElementsByTagName('drinks')->item(0)->appendChild($node);
            $xml->save('../xml/drinks.xml');
            header('location: ../home.php');
        }
    } else if ($category == "sweets") {
        $xml->load("../xml/dessert.xml");
        $dessert = $xml->getElementsByTagName('drink');

        if ($_FILES['image']['error'] === 0) {
            $destination = "./images/" . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $id = 0;
            foreach ($food as $get_food) {
                $id = $get_food->getAttribute('id');
            }

            $node = $xml->createElement("dessert");
            $node->setAttribute("id", $id + 1);
            $node->appendChild($xml->createElement('name', $name));
            $node->appendChild($xml->createElement('description', $description));
            $node->appendChild($xml->createElement('price', $price));
            $node->appendChild($xml->createElement('quantity', $quantity));
            $node->appendChild($xml->createElement('image', $_FILES['image']['name']));

            $xml->getElementsByTagName('desserts')->item(0)->appendChild($node);
            $xml->save('../xml/dessert.xml');
            header('location: ../home.php');
        }
    }
}

if (isset($_POST['submit-pay'])) {
    $payment = $_POST['payment'];

    $xml = new DOMDocument();
    $xml->Load("../xml/cart.xml");
    $item = $xml->getElementsByTagName("item");
    $newArray = array();
    $total_val = 0;
    foreach ($item as $get_item) {
        $value = $get_item->getElementsByTagName("price")->item(0)->nodeValue;
        $newArray[] = $value;
    }

    $total_val = array_sum($newArray);

    if ($payment >= $total_val) {
        $xml = new DOMDocument();
        $xml->Load("../xml/cart.xml");
        $item = $xml->getElementsByTagName("item");
        foreach ($item as $get_item) {
            $item_id = $get_item->getAttribute("id");
            $item_name = $get_item->getElementsByTagName("name")->item(0)->nodeValue;
            $item_category  = $get_item->getElementsByTagName("category")->item(0)->nodeValue;
            if (strtolower($item_category) == "food") {
                $xml->Load("../xml/food.xml");
                $inv_item = $xml->getElementsByTagName("food");
                foreach ($inv_item as $get_inv_item) {
                    $inv_item_name = $get_inv_item->getElementsByTagName("name")->item(0)->nodeValue;
                    if ($item_name == $inv_item_name) {
                        $name = $get_inv_item->getElementsByTagName("name")->item(0)->nodeValue;
                        $price = $get_inv_item->getElementsByTagName("price")->item(0)->nodeValue;
                        $quantity = $get_inv_item->getElementsByTagName("quantity")->item(0)->nodeValue;
                        $image = $get_inv_item->getElementsByTagName("image")->item(0)->nodeValue;
                        $description = $get_inv_item->getElementsByTagName("description")->item(0)->nodeValue;
                        $my_item_id = $get_inv_item->getAttribute("id");

                        $new_quantity = $quantity - 1;
                        $node = $xml->createElement("food");
                        $node->setAttribute("id", $my_item_id);
                        $node->appendChild($xml->createElement("name", $name));
                        $node->appendChild($xml->createElement("description", $description));
                        $node->appendChild($xml->createElement("quantity", $new_quantity));
                        $node->appendChild($xml->createElement("price", $price));
                        $node->appendChild($xml->createElement("image", $image));

                        foreach ($inv_item as $x) {
                            $my_id = $x->getAttribute("id");
                            if ($my_item_id == $my_id) {
                                $xml->getElementsByTagName("foods")->item(0)->replaceChild($node, $x);
                                $xml->save("../xml/food.xml");
                                break;
                            }
                        }
                    }
                }
            } else if (strtolower($item_category) == "drinks") {
                $xml->Load("../xml/drinks.xml");
                $inv_item = $xml->getElementsByTagName("drink");
                foreach ($inv_item as $get_inv_item) {
                    $inv_item_name = $get_inv_item->getElementsByTagName("name")->item(0)->nodeValue;
                    if ($item_name == $inv_item_name) {
                        $name = $get_inv_item->getElementsByTagName("name")->item(0)->nodeValue;
                        $price = $get_inv_item->getElementsByTagName("price")->item(0)->nodeValue;
                        $quantity = $get_inv_item->getElementsByTagName("quantity")->item(0)->nodeValue;
                        $image = $get_inv_item->getElementsByTagName("image")->item(0)->nodeValue;
                        $description = $get_inv_item->getElementsByTagName("description")->item(0)->nodeValue;
                        $my_item_id = $get_inv_item->getAttribute("id");

                        $new_quantity = $quantity - 1;
                        $node = $xml->createElement("drink");
                        $node->setAttribute("id", $my_item_id);
                        $node->appendChild($xml->createElement("name", $name));
                        $node->appendChild($xml->createElement("description", $description));
                        $node->appendChild($xml->createElement("quantity", $new_quantity));
                        $node->appendChild($xml->createElement("price", $price));
                        $node->appendChild($xml->createElement("image", $image));

                        foreach ($inv_item as $x) {
                            $my_id = $x->getAttribute("id");
                            if ($my_item_id == $my_id) {
                                $xml->getElementsByTagName("drinks")->item(0)->replaceChild($node, $x);
                                $xml->save("../xml/drinks.xml");
                                break;
                            }
                        }
                    }
                }
            } else if (strtolower($item_category) == "sweets") {
                $xml->Load("../xml/dessert.xml");
                $inv_item = $xml->getElementsByTagName("dessert");
                foreach ($inv_item as $get_inv_item) {
                    $inv_item_name = $get_inv_item->getElementsByTagName("name")->item(0)->nodeValue;
                    if ($item_name == $inv_item_name) {
                        $name = $get_inv_item->getElementsByTagName("name")->item(0)->nodeValue;
                        $price = $get_inv_item->getElementsByTagName("price")->item(0)->nodeValue;
                        $quantity = $get_inv_item->getElementsByTagName("quantity")->item(0)->nodeValue;
                        $image = $get_inv_item->getElementsByTagName("image")->item(0)->nodeValue;
                        $description = $get_inv_item->getElementsByTagName("description")->item(0)->nodeValue;
                        $my_item_id = $get_inv_item->getAttribute("id");

                        $new_quantity = $quantity - 1;
                        $node = $xml->createElement("dessert");
                        $node->setAttribute("id", $my_item_id);
                        $node->appendChild($xml->createElement("name", $name));
                        $node->appendChild($xml->createElement("description", $description));
                        $node->appendChild($xml->createElement("quantity", $new_quantity));
                        $node->appendChild($xml->createElement("price", $price));
                        $node->appendChild($xml->createElement("image", $image));

                        foreach ($inv_item as $x) {
                            $my_id = $x->getAttribute("id");
                            if ($my_item_id == $my_id) {
                                $xml->getElementsByTagName("desserts")->item(0)->replaceChild($node, $x);
                                $xml->save("../xml/dessert.xml");
                                break;
                            }
                        }
                    }
                }
            }
        }

        $xml_cart = simplexml_load_file('../xml/cart.xml');
        $get_items = $xml_cart->xpath("//item[@id]");
        foreach ($get_items as $items) {
            unset($items[0]);
        }
        $dom = new DOMDocument('1.0');
        $dom->loadXML($xml_cart->asXML());
        $dom->save('../xml/cart.xml');
        header("location: ../out.php");
    } else {
        $_SESSION['status'] = "Not enough money";
        header("location: ../payment.php");
    }
} else {
    $_SESSION['status']  = "";
}
