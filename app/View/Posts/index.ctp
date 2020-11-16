<h1>Blog - Posts</h1>

<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Likes</th>
		<th>Published</th>
		<th>Actions</th>
        <th>Created</th>
    </tr>

    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?php echo $post['Post']['id']; ?></td>

			<td>
                <?php echo $this->Html->link(
					$post['Post']['title'],
					array('action' => 'view', $post['Post']['id']));
				?>
            </td>

			<td><?php echo $post['Post']['likes']; ?></td>

			<td><?php echo $post['Post']['is_published']; ?></td>

			<td>
				<?php echo $this->Html->link(
					'Edit', array('action' => 'edit', $post['Post']['id']));
				?>

                <?php echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $post['Post']['id']),
					array('confirm' => 'Are you sure?'));
				?>
            </td>

			<td><?php echo $post['Post']['created']; ?></td>
        </tr>
    <?php endforeach;?>
</table>
