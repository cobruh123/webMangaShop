<?php
include "includes/header.php";

$email_err = '';

if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['id'])) {
	$data = getById('users', $_GET['id']);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$email = mysqli_real_escape_string($link, $_POST['email']);
		$password = md5(mysqli_real_escape_string($link, $_POST['password']));
		$contact = mysqli_real_escape_string($link, $_POST['contact']);
		$city = mysqli_real_escape_string($link, $_POST['city']);
		$address = mysqli_real_escape_string($link, $_POST['address']);

		$InsertQuerry = "UPDATE users SET name = '$name', email = '$email', password = '$password', contact = '$contact', city = '$city', address = '$address' WHERE id = $_GET[id]";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "users.php");
		}
	}
} else if (isset($_GET['act']) && $_GET['act'] == 'delete' && isset($_GET['id'])) {

	$deletedSQL = 'DELETE FROM users WHERE id = ' . $_GET['id'];

	if ($link->query($deletedSQL) === TRUE) {
		header("location:" . "users.php");
	} else {
		echo "Error deleting record: " . $link->error;
	}
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = mysqli_real_escape_string($link, $_POST['name']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = md5(mysqli_real_escape_string($link, $_POST['password']));
	$contact = mysqli_real_escape_string($link, $_POST['contact']);
	$city = mysqli_real_escape_string($link, $_POST['city']);
	$address = mysqli_real_escape_string($link, $_POST['address']);

	$SQL = "SELECT * FROM users WHERE email = '$email'";
	if (mysqli_num_rows(mysqli_query($link, $SQL))) {
		$email_err = 'User with this email already exist!';
	} else {
		$InsertQuerry = "INSERT INTO users(name, email, password, contact, city, address) VALUES ('$name', '$email', '$password', '$contact', '$city', '$address')";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "users.php");
		}
	}
}


?>

<form method="post" action="" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Users</legend>

		<label>Name</label>
		<input class="form-control" type="text" name="name" value="<?= $data['name'] ?>" /><br>

		<label>Email</label>
		<?php if ($email_err) {
			echo '<br><span class="text-danger">' . $email_err . '</span>';
		} ?>
		<input class="form-control" type="email" name="email" value="<?= $data['email'] ?>" /><br>

		<label>Password</label>
		<input class="form-control" type="password" name="password" value="<?= $data['password'] ?>" /><br>

		<label>Contact</label>
		<input class="form-control" type="text" name="contact" value="<?= $data['contact'] ?>" /><br>

		<label>City</label>
		<input class="form-control" type="text" name="city" value="<?= $data['city'] ?>" /><br>

		<label>Address</label>
		<input class="form-control" type="text" name="address" value="<?= $data['address'] ?>" /><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>