<?php
class PostFixture extends CakeTestFixture
{
    public $useDbConfig = 'test';

    public $fields = array(
        'id' => array(
            'type' => 'integer',
            'key' => 'primary',
        ),
        'title' => array(
            'type' => 'string',
            'length' => 50,
            'null' => false,
        ),
        'body' => array(
            'type' => 'text',
            'null' => false,
        ),
        'likes' => array(
            'type' => 'integer',
            'default' => 0,
            'null' => false,
        ),
        'is_published' => array(
            'type' => 'tinyinteger',
            'default' => 0,
            'null' => false,
        ),
        'created' => 'datetime',
        'modified' => 'datetime',
    );

    public $import = array('Post', 'records' => false);

    public function init()
    {
        $this->records = array(
            array(
                'id' => 1,
                'title' => 'First Test Post',
                'body' => 'This is the first test post.',
                'is_published' => 0,
                'created' => date('Y-m-d h:i:s'),
                'modified' => date('Y-m-d h:i:s'),
            ),
        );

        parent::init();
    }
}
