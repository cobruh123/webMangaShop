<?php
    session_start();
    date_default_timezone_set('Asia/Almaty');
    include 'connection.php';
    include 'comments.inc.php';
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
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>We sell manga</h1>
                       <p>20% cheaper than official prices.</p>
                       <a href="products.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
           <div class="container">
               <div class="row">
                   <div class="col-xs-4">
                       <div  class="thumbnail">
                           <a href="products.php">
                                <img src="img/manga1.jpg" alt="action">
                           </a>
                           <center>
                                <div class="caption">
                                        <p id="autoResize">Action</p>
                                        <p>Top Action Manga Readers' Choices.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/manga9.jpg" alt="romance">
                           </a>
                           <center>
                                <div class="caption">
                                    <p id="autoResize">Romance</p>
                                    <p>Add love to your life.</p>
                                </div>
                           </center>
                       </div>
                   </div>
                   <div class="col-xs-4">
                       <div class="thumbnail">
                           <a href="products.php">
                               <img src="img/manga10.jpg" alt="horror">
                           </a>
                           <center>
                               <div class="caption">
                                   <p id="autoResize">Horror</p>
                                   <p>Tickle your nerves.</p>
                               </div>
                           </center>
                       </div>
                   </div>
               </div>
           </div>

           <?php
            echo "<form class='form-comment' method='POST' action='".setComments($con)."'>
                <input type='hidden' name='uid' value='Anonymous'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea class='comment-area' name='message' ></textarea><br> 
                <button class='btn btn-primary' type='submit' name='commentSubmit'>Comment</button>
            </form>";

            getComments($con);
            ?>
            <br><br> <br><br><br><br>

           <footer class="footer"> 
               <div class="container">
               <center>
                <button onclick="location.href='admin-panel/index.php'" style="text-align: center;">Admin panel</button>
                   <p>Manga Store </p>
                   <p>Thank for being with us!</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>