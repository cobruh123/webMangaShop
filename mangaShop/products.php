<?php
require 'connection.php';
session_start();
require 'check_if_added.php';

$sql = 'SELECT * FROM items';
$exeSQL = mysqli_query($con, $sql);
$arr = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/MangaStoreLogo.png" />
    <title>Manga Store</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>
        <?php
        require 'header.php';
        ?>
        <div class="container">
            <div class="jumbotron">
                <h1>Welcome to our Manga Store!</h1>
                <p>We have the best manga special for you. The best products, at the best prices, only with us!</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                foreach ($arr as $value) {
                    echo '<div class="col-lg-4 col-md-5 col-sm-6" style="height: 700px; margin-bottom: 25px;">
                    <div class="thumbnail">
                        <a href="cart.php">
                            <img src="img/' . $value['image'] . '" alt="' . $value['name'] . '">
                        </a>
                            <div class="caption">
                                <h3>' . $value['name'] . '</h3>
                                <p>Price: USD. ' . $value['price'] . '</p>';
                    if (!isset($_SESSION['email'])) {
                        echo '<a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>';
                    } else {
                        if (check_if_added_to_cart($value['id'])) {
                            echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                        } else {
                            echo '<p><a href="contact_before_success.php?id=' . $value['id'] . '" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <a href="cart_add.php?id=' . $value['id'] . '" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>';
                        }
                    }
                    echo '
                            </div>
                    </div>
                </div>';
                }
                ?>

            </div>
        </div>
        <br><br><br><br><br><br><br><br>
        <footer class="footer">
            <div class="container">
                <center>
                    <p>Manga Store </p>
                    <p>Thank for being with us!</p>
                </center>
            </div>
        </footer>
    </div>
</body>

</html>