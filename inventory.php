<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Inventory</title>
</head>

<body>
    <div class="main">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <img src="images/logo.png" height="80" width="80">

                    <a href=""><button>Log out</button></a>
                    <a href="./home.php"> <button>Home</button></a>
                    <a href="./add.php"> <button>
                            Add
                        </button></a>
                </div>
            </div>

            <form action="./php/item-function.php" method="POST">
                <div class="body-cart">
                    <table id="myTable">

                    </table>
                </div>
            </form>

        </div>
    </div>
</body>
<script src="./javascript/inventory.js"></script>

</html>