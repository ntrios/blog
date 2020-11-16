<h1>Add Post</h1>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '6'));
echo $this->Form->input('is_published', array(
		'type' => 'checkbox',
		'label'=>'Publish',
		'value' => 1
	));
echo $this->Form->end('Save Post');
