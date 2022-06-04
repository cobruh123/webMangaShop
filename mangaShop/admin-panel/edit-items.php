<?php
ini_set("memory_limit", "1024M");
include "includes/header.php";

if (isset($_GET['act']) && $_GET['act'] == 'edit' && isset($_GET['id'])) {
	$data = getById('items', $_GET['id']);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$savePath = "mangaShop\img";
		if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
			$error_status = 1;
			$error_message = "There was an error uploading the file";
		}
		/* Ensure the file is JPG/PNG */ elseif (($_FILES['image']['type'] != "image/jpg") && ($_FILES['image']['type'] != "image/jpeg") && ($_FILES['image']['type'] != "image/png")) {
			$error_status = 2;
			$error_message = "File uploaded was not a JPG or PNG file.";
		} else {
			/* Ensure the file is less than 10MB */
			$size = filesize($_FILES['image']['tmp_name']);
			if ($size > (10 * 1024 * 1024)) {
				$error_status = 3;
				$error_message = "File uploaded needs to be less than 10MB.";
			} else {
				//Save the image to your specified directory
				$error_status = 0;
				$error_message = '';
				move_uploaded_file($_FILES['image']['tmp_name'], '../img/' . $_FILES['image']['name']);
			}
		}
		$image = $_FILES['image']['name'];
		$price = $_POST['price'];

		$InsertQuerry = "UPDATE items SET name = '$name', price = '$price', image = '$image' WHERE id = '$_GET[id]'";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "items.php");
		}
	}
} else if (isset($_GET['act']) && $_GET['act'] == 'delete' && isset($_GET['id'])) {

	$deletedSQL = 'DELETE FROM items WHERE id = ' . $_GET['id'];

	if ($link->query($deletedSQL) === TRUE) {
		header("location:" . "items.php");
	} else {
		echo "Error deleting record: " . $link->error;
	}
} else if ($_GET['act'] == 'add') {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = mysqli_real_escape_string($link, $_POST['name']);
		$savePath = "mangaShop\img";
		if ($_FILES['image']['error'] != UPLOAD_ERR_OK) {
			$error_status = 1;
			$error_message = "There was an error uploading the file";
		}
		/* Ensure the file is JPG/PNG */ elseif (($_FILES['image']['type'] != "image/jpg") && ($_FILES['image']['type'] != "image/jpeg") && ($_FILES['image']['type'] != "image/png")) {
			$error_status = 2;
			$error_message = "File uploaded was not a JPG or PNG file.";
		} else {
			/* Ensure the file is less than 10MB */
			$size = filesize($_FILES['image']['tmp_name']);
			if ($size > (10 * 1024 * 1024)) {
				$error_status = 3;
				$error_message = "File uploaded needs to be less than 10MB.";
			} else {
				//Save the image to your specified directory
				$error_status = 0;
				$error_message = '';
				move_uploaded_file($_FILES['image']['tmp_name'], '../img/' . $_FILES['image']['name']);
			}
		}
		$image = $_FILES['image']['name'];
		$price = $_POST['price'];

		$InsertQuerry = "INSERT INTO items(name, price, image) VALUES('$name', '$price', '$image')";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "items.php");
		}
	}
}

?>

<form method="post" action="" enctype='multipart/form-data'>
	<fieldset>
		<legend class="hidden-first">Add New Items</legend>

		<div class="my-3">
			<label for='name'>Name</label>
			<input class="form-control" id="name" type="text" name="name" value="<?= $data['name'] ?>" />
		</div><br>

		<div class="mb-3">
			<label for="formFile" class="form-label">Image</label>
			<input class="form-control" name="image" type="file" accept=".png, .jpg, .jpeg" id="formFile">
		</div><br>

		<div class="mb-3">
			<label for="price" class="">Price</label>
			<input class="form-control" id="price" type="text" name="price" value="<?= $data['price'] ?>" />
		</div><br>

		<button type="submit" value="submit" class="btn btn-success">Submit</button>
</form>
<?php include "includes/footer.php"; ?>