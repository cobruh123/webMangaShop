<?php
include "includes/header.php";

if (isset($_GET['id'])) {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$message = mysqli_real_escape_string($link, $_POST['message']);
        $InsertQuerry = "UPDATE comments SET admin_message = '$message' WHERE cid='$_GET[id]'";
		$R = mysqli_query($link, $InsertQuerry);
		if ($R) {
			header("location:" . "comments.php");
		}
	}
	// echo '<pre>' , var_dump($data) , '</pre>';
}
?>

<form method="post" action="">
    <fieldset>
        <legend class="hidden-first">Answer to this comment</legend>
        <label for="cid">Comment ID: </label>
        <input type="text" id="cid" name="cid" value="<?php echo $_GET['id']; ?>" disabled><br><br>
        <label>Message</label>
        <textarea class="ckeditor form-control" name="message"></textarea><br>
        <br>
        <input type="submit" value=" Save " class="btn btn-success">
</form>
<?php include "includes/footer.php"; ?>