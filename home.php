<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Home</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" height="80" width="80">

                    <a href="./index.php"><button>Log out</button></a>
                    <a href="./cart.php"><button>My Cart</button></a>
                    <a href="./inventory.php"><button>Inventory</button></a>
                </div>
            </div>

            <form action="./php/add-cart.php" method="POST">
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