<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-users_items.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Users_items</a>

				<h1>Users_items</h1>
				<p>This table includes <?php echo counting("users_items", "id");?> users_items.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>User id</th>
			<th>Item id</th>
			<th>Status</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$users_items = getAll("users_items");
				if($users_items) foreach ($users_items as $users_itemss):
					?>
					<tr>
		<td><?php echo $users_itemss['id']?></td>
		<td><?php echo $users_itemss['user_id']?></td>
		<td><?php echo $users_itemss['item_id']?></td>
		<td><?php echo $users_itemss['status']?></td>


						<td><a href="edit-users_items.php?act=edit&id=<?php echo $users_itemss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $users_itemss['id']?>&cat=users_items" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				