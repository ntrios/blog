<h1>Blog - Post</h1>

<h2><?php echo $post['Post']['title'] ?></h2>
<hr /><br />
<p><small><i>Created in: <?php echo $post['Post']['created']; ?></i></small></p>

<p><?php echo $post['Post']['body'] ?></p><br />

<h2>Comments</h2>
<hr /><br />

<table>
	<tr>
		<th>Comments</th>
		<th>User</th>
		<th>Created</th>
	</tr>

	<?php foreach ($post['Comment'] as $comment): ?>
		<tr>
			<td><?php echo $comment['body']; ?></td>
			<td><?php echo $comment['User']['name']; ?></td>
			<td><?php echo $comment['created']; ?></td>
		</tr>
	<?php endforeach;?>
</table>

