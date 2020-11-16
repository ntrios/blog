<h1>Add User</h1>

<?php
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('email', array('type' => 'email'));
echo $this->Form->end('Save User');
