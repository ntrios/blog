<?php

class User extends AppModel {
		public $name = 'User';

		public $hasMany = array('Comment');

		public $validate = array(
				'name' => array(
						'rule' => 'notBlank',
						'required' => true,
				),
				'email' => array(
						'rule' => array(
								'notBlank',
								'email',
								'isUnique',
						),
						'required' => true,
				),
		);
}
