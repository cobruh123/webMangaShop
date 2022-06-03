<?php
				include "includes/header.php";
				?>

				<a class="btn btn-primary" href="edit-comments.php?act=add"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Comments</a>

				<h1>Comments</h1>
				<p>This table includes <?php echo counting("comments", "id");?> comments.</p>

				<table id="sorted" class="table table-striped table-bordered">
				<thead>
				<tr>
							<th>Cid</th>
			<th>Uid</th>
			<th>Date</th>
			<th>Message</th>

				<th class="not">Edit</th>
				<th class="not">Delete</th>
				</tr>
				</thead>

				<?php
				$comments = getAll("comments");
				if($comments) foreach ($comments as $commentss):
					?>
					<tr>
		<td><?php echo $commentss['cid']?></td>
		<td><?php echo $commentss['uid']?></td>
		<td><?php echo $commentss['date']?></td>
		<td><?php echo $commentss['message']?></td>


						<td><a href="edit-comments.php?act=edit&id=<?php echo $commentss['id']?>"><i class="glyphicon glyphicon-edit"></i></a></td>
						<td><a href="save.php?act=delete&id=<?php echo $commentss['id']?>&cat=comments" onclick="return navConfirm(this.href);"><i class="glyphicon glyphicon-trash"></i></a></td>
						</tr>
					<?php endforeach; ?>
					</table>
					<?php include "includes/footer.php";?>
				