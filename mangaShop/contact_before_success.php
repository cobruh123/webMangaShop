<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }else{
        $user_id=$_GET['id'];
        $confirm_query="update users_items set status='Confirmed' where user_id=$user_id";
        $confirm_query_result=mysqli_query($con,$confirm_query) or die(mysqli_error($con));
        
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
            ?>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1><b>Your credentials</b></h1>
                        <form method="post" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                            </div> 
                            <div class="form-group">
                                <input type="tel" class="form-control" name="number" placeholder="Phone number" required="true" pattern=".{6,}">
                            </div>
                            <div class="form-group">
                               <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your suggestions "></textarea>
                            </div>
                            
                            <div class="form-group">
                                <a href="success.php?id=<?php echo $user_id?>" type="submit" class="btn btn-primary">Buy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
