<?php
/**
 * BirthdayFixture
 *
 */
class BirthdayFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'birthday';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'FIRST_NAME' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'LAST_NAME' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ID', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'ID' => 1,
			'FIRST_NAME' => 'Lorem ipsum dolor sit amet',
			'LAST_NAME' => 'Lorem ipsum dolor sit amet'
		),
	);

}
