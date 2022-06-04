<?php
include "includes/header.php";

if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['id'])) {
	$data = qSELECT('SELECT * FROM comments WHERE cid = ' . $_GET['id']);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$uid = mysqli_real_escape_string($link, $_POST['uid']);
		$date = mysqli_real_escape_string($link, $_POST['date']);
		$message = mysqli_real_escape_string($link, $_POST['message']);

		$InsertQuerry = "UPDATE comments set uid = '$uid', date = '$date', message = '$message' WHERE cid = '$_GET[id]'";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "comments.php");
		}
	}
	// echo '<pre>' , var_dump($data) , '</pre>';
} else if (isset($_GET['act']) && $_GET['act'] == 'delete' && isset($_GET['id'])) {

	$deletedSQL = 'DELETE FROM comments WHERE cid = ' . $_GET['id'];

	if ($link->query($deletedSQL) === TRUE) {
		header("location:" . "comments.php");
	} else {
		echo "Error deleting record: " . $link->error;
	}
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$uid = mysqli_real_escape_string($link, $_POST['uid']);
	$date = mysqli_real_escape_string($link, $_POST['date']);
	$message = mysqli_real_escape_string($link, $_POST['message']);

	$InsertQuerry = "INSERT INTO comments(uid, date, message) VALUES ('$uid', '$date', '$message')";
	$R = mysqli_query($link, $InsertQuerry);
	if ($R) {
		header("location:" . "comments.php");
	}
}

?>

<form method="post" action="">
	<fieldset>
		<legend class="hidden-first">Add New Comments</legend>

		<label>Uid</label>
		<input class="form-control" type="text" name="uid" value="<?= $data[0]['uid'] ?>" /><br>

		<label>Date</label>
		<input class="form-control" type="text" name="date" value="<?= $data[0]['date'] ?>" /><br>

		<label>Message</label>
		<textarea class="ckeditor form-control" name="message"><?= $data[0]['message'] ?></textarea><br>
		<br>
		<input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>