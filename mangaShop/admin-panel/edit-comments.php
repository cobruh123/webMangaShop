<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$comments = getById("comments", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Comments</legend>
						<input name="cat" type="hidden" value="comments">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>Uid</label>
							<input class="form-control" type="text" name="uid" value="<?=$comments['uid']?>" /><br>
							
							<label>Date</label>
							<input class="form-control" type="text" name="date" value="<?=$comments['date']?>" /><br>
							
							<label>Message</label>
							<textarea class="ckeditor form-control" name="message"><?=$comments['message']?></textarea><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				