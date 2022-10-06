<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Add</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" height="80" width="80">

                    <a href=""><button>Log out</button></a>
                    <a href="./inventory.php"> <button>
                            Inventory
                        </button></a>
                </div>
            </div>

            <form action="./php/cart-function.php" method="POST" enctype="multipart/form-data">
                <div class="body-cart">
                    <input type="text" name="category" placeholder="Category">
                    <input type="text" name="name" placeholder="Name">
                    <input type="text" name="description" placeholder="Description">
                    <input type="text" name="price" placeholder="Price">
                    <input type="text" name="quantity" placeholder="Quantity">
                    <input type="file" name="image" placeholder="Image">
                    <button type="submit" class="add-sub" name="add-item">Confirm Submit</button>
                </div>
            </form>

        </div>
    </div>
</body>
<script src="./javascript/cart.js"></script>

</html>