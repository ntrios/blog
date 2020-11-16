<?php

class Comment extends AppModel {
		public $name = 'Comment';

		public $belongsTo = array(
			'User' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			),
			'Post' => array(
				'className' => 'Post',
				'foreignKey' => 'post_id'
			),
		);

		public $validate = array(
				'user_id' => array(
						'rule' => 'notBlank',
						'required' => true,
				),
				'post_id' => array(
						'rule' => 'notBlank',
						'required' => true,
				),
				'body' => array(
					'rule' => array('minLength', '4'),
					'message' => 'Minimum 4 characters long',
			)
		);
}

