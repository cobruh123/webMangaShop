<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-items.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Items</a>

				<h1>Items</h1>
				<p>This table includes <?php echo counting("items", "id");?> items.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Id</th>
			<th>Name</th>
			<th>Price</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$items = getAll("items");
				if($items) foreach ($items as $itemss):
					?>
					<tr>
		<td><?php echo $itemss['id']?></td>
		<td><?php echo $itemss['name']?></td>
		<td><?php echo $itemss['price']?></td>


						<td><a href="edit-items.php?act=edit&id=<?php echo $itemss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $itemss['id']?>&cat=items" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				