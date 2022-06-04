<?php
include "includes/connect.php";
$admin_email = mysqli_real_escape_string($link, $_POST['email']);
$admin_pass = md5($_POST['password']);
$auth = 'admin_in';

$query = mysqli_query($link, "SELECT * FROM users WHERE email='$admin_email'");
$checkAdmin = mysqli_num_rows($query);

if ($checkAdmin != 0) {
    $arrayu = mysqli_fetch_array($query);
    if ($arrayu['password'] !== $admin_pass && $arrayu['user_type'] !== 'admin') {
        $Error = "Incorrect data...";
		echo($Error);
    } else {
        setcookie("admin_id", $row["id"]);
        setcookie("admin_pass", $admin_pass);
        setcookie("auth", $auth);
        header("location:" . "home.php");
    }
} else {
    $Error = "No account yet";
	echo($Error);
}