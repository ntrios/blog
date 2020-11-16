<?php

class Post extends AppModel
{
    public $name = 'Post';

    public $hasMany = array('Comment');

    public $validate = array(
        'title' => array(
            'rule' => array('minLength', '2'),
            'message' => 'Minimum 2 characters long',
            'required' => true,
        ),
        'body' => array(
            'rule' => array('minLength', '10'),
            'message' => 'Minimum 10 characters long',
            'required' => true,
        ),
        'likes' => array(
            'rule' => 'notBlank',
        ),
        'is_published' => array(
            'rule' => 'notBlank',
            'required' => true,
        ),
    );
}
