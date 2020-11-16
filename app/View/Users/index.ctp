<h1>Blog Users</h1>

<p><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></p>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td>
                <?php echo $this->Html->link($user['User']['name'], array('action' => 'view', $user['User']['id'])); ?>
            </td>
            <td>
				<?php
					echo $this->Html->link(
						'Edit', array('action' => 'edit', $user['User']['id']));
					?>

                <?php echo $this->Form->postLink(
					'Delete',
					array('action' => 'delete', $user['User']['id']),
					array('confirm' => 'Are you sure?'));
				?>
            </td>
            <td><?php echo $user['User']['created']; ?></td>
        </tr>
    <?php endforeach;?>

</table>
