<?php
require 'connection.php';
session_start();

$sql = 'SELECT * FROM users_items WHERE status = "Added to cart" AND user_id = ' . $_SESSION['id'];
$exeSQL = mysqli_query($con, $sql);
$arr = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);

$addedItems = [];

foreach ($arr as $value) {
    $sql = 'SELECT * FROM items WHERE id = ' . $value['item_id'];
    $exeSQL = mysqli_query($con, $sql);
    $arr = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);
    if (isset($arr)) {
        $addedItems[] = $arr;
    }
}

$sql = 'SELECT * FROM users_items WHERE status = "Confirmed" AND user_id = ' . $_SESSION['id'];
$exeSQL = mysqli_query($con, $sql);
$arr = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);

$confirmedItems = [];

foreach ($arr as $value) {
    $sql = 'SELECT * FROM items WHERE id = ' . $value['item_id'];
    $exeSQL = mysqli_query($con, $sql);
    $arr = mysqli_fetch_all($exeSQL, MYSQLI_ASSOC);
    if (isset($arr)) {
        $confirmedItems[] = $arr;
    }
}

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
        ?><br>
        <div class="container profile">
            <div class="profile-head p-lg-4">
                <h1 class="display-4">Profile</h1>
            </div><hr>
            <div>
                <h4><a href="settings.php"><span class="glyphicon glyphicon-cog"></span>Settings</a></h4>
            </div><hr>
            <div class="row">
                <div class="col-lg-12 profile-item">
                    <h3 class="text-primary">Added to card:</h3>
                    <div class="row">
                        <?php
                        if (count($addedItems)) {
                            foreach ($addedItems as $outerArr) {
                                foreach ($outerArr as $value) {
                                    echo '<div class="col-lg-4 col-md-3 col-sm-6" style="height: 700px; margin-bottom: 25px;">
                                    <div class="thumbnail">
                                        <a href="cart.php">
                                        <img src="img/' . $value['image'] . '" alt="' . $value['name'] . '">
                                        </a>
                                        <div class="caption">
                                        <h3>' . $value['name'] . '</h3>
                                        <p class=text-success>Price: USD. ' . $value['price'] . '</p>
                                        <p><a href="contact_before_success.php?id=' . $value['id'] . '" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        </div>
                                    </div>
                                    </div>';
                                }
                            }
                        } else {
                            echo '<h4 class=text-danger>No items yet</h4>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 profile-item">
                        <h3 class="text-success">Confirmed:</h3>
                        <div class="row">
                            <?php
                            if (count($confirmedItems)) {
                                foreach ($confirmedItems as $outerArr) {
                                    foreach ($outerArr as $value) {
                                        echo '<div class=col-lg-4 col-md-3 col-sm-6>
                                    <div class="thumbnail">
                                        <a href="cart.php">
                                        <img src="img/' . $value['image'] . '" alt="' . $value['name'] . '">
                                        </a>
                                        <div class="caption">
                                        <h3>' . $value['name'] . '</h3>
                                        <p class=text-success>Price: USD. ' . $value['price'] . '</p>
                                        <p><a href="contact_before_success.php?id=' . $value['id'] . '" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        </div>
                                    </div>
                                </div>';
                                    }
                                }
                            } else {
                                echo '<h4>No items yet</h4>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br><br><br><br><br><br>
            <footer class="footer">
                <div class="container">
                    <center>
                        <p>Manga Store</p>
                        <p>Thank for being with us!</p>
                    </center>
                </div>
            </footer>
        </div>
</body>

</html>