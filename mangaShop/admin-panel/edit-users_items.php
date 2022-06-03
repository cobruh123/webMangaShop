<?php
				include "includes/header.php";
				$data=[];

				$act = $_GET['act'];
				if($act == "edit") {
					$id = $_GET['id'];
					$users_items = getById("users_items", $id);
				}
				?>

				<form method="post" action="save.php" enctype='multipart/form-data'>
					<fieldset>
						<legend class="hidden-first">Add New Users_items</legend>
						<input name="cat" type="hidden" value="users_items">
						<input name="id" type="hidden" value="<?=$id?>">
						<input name="act" type="hidden" value="<?=$act?>">
				
							<label>User id</label>
							<input class="form-control" type="text" name="user_id" value="<?=$users_items['user_id']?>" /><br>
							
							<label>Item id</label>
							<input class="form-control" type="text" name="item_id" value="<?=$users_items['item_id']?>" /><br>
							
							<label>Status</label>
							<input class="form-control" type="text" name="status" value="<?=$users_items['status']?>" /><br>
							<br>
					<input type="submit" value=" Save " class="btn btn-success">
					</form>
					<?php include "includes/footer.php";?>
				