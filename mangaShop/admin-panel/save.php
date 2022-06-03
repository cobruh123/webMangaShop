<?php
		include("includes/connect.php");

		$cat = $_POST['cat'];
		$cat_get = $_GET['cat'];
		$act = $_POST['act'];
		$act_get = $_GET['act'];
		$id = $_POST['id'];
		$id_get = $_GET['id'];

		
				if($cat == "comments" || $cat_get == "comments") {
					$cid = addslashes(htmlentities($_POST["cid"], ENT_QUOTES));
$uid = addslashes(htmlentities($_POST["uid"], ENT_QUOTES));
$date = addslashes(htmlentities($_POST["date"], ENT_QUOTES));
$message = addslashes(htmlentities($_POST["message"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `comments` (  `cid` , `uid` , `date` , `message` ) VALUES ( '".$cid."' , '".$uid."' , '".$date."' , '".$message."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `comments` SET  `cid` =  '".$cid."' , `uid` =  '".$uid."' , `date` =  '".$date."' , `message` =  '".$message."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `comments` WHERE id = '".$id_get."' ");
					}
					header("location:"."comments.php");
				}
				
				if($cat == "items" || $cat_get == "items") {
					$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
$price = addslashes(htmlentities($_POST["price"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `items` (  `name` , `price` ) VALUES ( '".$name."' , '".$price."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `items` SET  `name` =  '".$name."' , `price` =  '".$price."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `items` WHERE id = '".$id_get."' ");
					}
					header("location:"."items.php");
				}
				
				if($cat == "users" || $cat_get == "users") {
					$name = addslashes(htmlentities($_POST["name"], ENT_QUOTES));
$email = addslashes(htmlentities($_POST["email"], ENT_QUOTES));
$password = addslashes(htmlentities($_POST["password"], ENT_QUOTES));
$contact = addslashes(htmlentities($_POST["contact"], ENT_QUOTES));
$city = addslashes(htmlentities($_POST["city"], ENT_QUOTES));
$address = addslashes(htmlentities($_POST["address"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `users` (  `name` , `email` , `password` , `contact` , `city` , `address` ) VALUES ( '".$name."' , '".$email."' , '".md5($password)."', '".$contact."' , '".$city."' , '".$address."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `users` SET  `name` =  '".$name."' , `email` =  '".$email."' , `contact` =  '".$contact."' , `city` =  '".$city."' , `address` =  '".$address."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `users` WHERE id = '".$id_get."' ");
					}
					header("location:"."users.php");
				}
				
				if($cat == "users_items" || $cat_get == "users_items") {
					$user_id = addslashes(htmlentities($_POST["user_id"], ENT_QUOTES));
$item_id = addslashes(htmlentities($_POST["item_id"], ENT_QUOTES));
$status = addslashes(htmlentities($_POST["status"], ENT_QUOTES));


				if($act == "add") {
					mysqli_query($link, "INSERT INTO `users_items` (  `user_id` , `item_id` , `status` ) VALUES ( '".$user_id."' , '".$item_id."' , '".$status."' ) ");
				}elseif ($act == "edit") {
					mysqli_query($link, "UPDATE `users_items` SET  `user_id` =  '".$user_id."' , `item_id` =  '".$item_id."' , `status` =  '".$status."'  WHERE `id` = '".$id."' "); 
					}elseif ($act_get == "delete") {
						mysqli_query($link, "DELETE FROM `users_items` WHERE id = '".$id_get."' ");
					}
					header("location:"."users_items.php");
				}
				?>