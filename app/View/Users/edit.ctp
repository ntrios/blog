<h1>Edit User</h1>

<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Save Post');
