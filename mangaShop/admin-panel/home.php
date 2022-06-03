<?php
		include "includes/header.php";
		?>
		<table class="table table-striped">
		<tr>
		<th class="not">Table</th>
		<th class="not">Entries</th>
		</tr>
		
				<tr>
					<td><a href="comments.php">Comments</a></td>
					<td><?=counting("comments", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="items.php">Items</a></td>
					<td><?=counting("items", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="users.php">Users</a></td>
					<td><?=counting("users", "id")?></td>
				</tr>
				
				<tr>
					<td><a href="users_items.php">Users_items</a></td>
					<td><?=counting("users_items", "id")?></td>
				</tr>

				

				</table>
			<?php include "includes/footer.php";?>
			