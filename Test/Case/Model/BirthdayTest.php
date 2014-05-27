<?php
App::uses('Birthday', 'Model');

/**
 * Birthday Test Case
 *
 */
class BirthdayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.birthday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Birthday = ClassRegistry::init('Birthday');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Birthday);

		parent::tearDown();
	}

}
