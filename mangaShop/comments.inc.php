<?php

function setComments($con) {
	if (isset($_POST['commentSubmit'])) {
		$uid = $_POST['uid'];
		$date = $_POST['date'];
		$message = $_POST['message'];

		$sql = "INSERT INTO comments (uid, date, message) VALUES ('$uid', '$date', '$message')";
		$result = $con->query($sql);
	}
	
}

function getComments($con){
	$sql = "SELECT * FROM comments ORDER BY date DESC ";
	$result = $con->query($sql);
	while ($row = $result->fetch_assoc()) {
		echo "<div class='comment-box'>";
			echo $row['uid']."<br>";
			echo $row['date']."<br>";
			echo nl2br($row['message']);
		echo "</div>";
		if($row['admin_message']) {
			echo "<div class='comment-box'>";
			echo "<h4 class='text-primary'>Answer by Admin to ". $row['uid'] ."</h4><br>";
			echo $row['admin_message']."<br>";
			echo "</div>";
		}

	}
}