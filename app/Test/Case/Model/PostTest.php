<?php
class  PostTest extends CakeTestCase {
	public $fixtures = array( 'app.post');
	public $post = null;

	public function setUp() {
		$this->post = ClassRegistry::init('Post');
	}

	public function testModelExist() {
		$this->assertTrue(is_a($this->post, 'Post'));
	}

	public function testEmptyTitleField() {
		$data = array('Post' => array('title' => null));
		$saved = $this->post->save($data);

		$this->assertFalse($saved);
	}

	public function testEmptyBodyField() {
		$data = array('Post' => array('body' => null));
		$saved = $this->post->save($data);

		$this->assertFalse($saved);
	}
}
