<?php
include "includes/header.php";

if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['id'])) {
	$data = getById('users_items', $_GET['id']);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
		$item_id = mysqli_real_escape_string($link, $_POST['item_id']);
		$status = mysqli_real_escape_string($link, $_POST['status']);

		$InsertQuerry = "UPDATE users_items SET user_id = '$user_id', item_id = '$item_id', status = '$status' WHERE id = $_GET[id]";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "users_items.php");
		}
	}
} else if (isset($_GET['act']) && $_GET['act'] == 'delete' && isset($_GET['id'])) {

	$deletedSQL = 'DELETE FROM users_items WHERE id = ' . $_GET['id'];

	if ($link->query($deletedSQL) === TRUE) {
		header("location:" . "users_items.php");
	} else {
		echo "Error deleting record: " . $link->error;
	}
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$user_id = mysqli_real_escape_string($link, $_POST['user_id']);
	$item_id = mysqli_real_escape_string($link, $_POST['item_id']);
	$status = mysqli_real_escape_string($link, $_POST['status']);

	$InsertQuerry = "INSERT INTO users_items(user_id, item_id, status) VALUES ('$user_id', '$item_id', '$status')";
	$R = mysqli_query($link, $InsertQuerry);
	if ($R) {
		header("location:" . "users_items.php");
	}
}

?>

<form method="post" action="" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Users items</legend>

		<label>User id</label>
		<input class="form-control" type="text" name="user_id" value="<?= $data['user_id'] ?>" /><br>

		<label>Item id</label>
		<input class="form-control" type="text" name="item_id" value="<?= $data['item_id'] ?>" /><br>

		<label>Status</label>
		<input class="form-control" type="text" name="status" value="<?= $data['status'] ?>" /><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>