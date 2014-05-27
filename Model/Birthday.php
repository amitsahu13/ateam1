<?php
App::uses('AppModel', 'Model');
/**
 * Birthday Model
 *
 */
class Birthday extends AppModel {

/**
 * Use database config
 *
 * @var string
 */
	public $useDbConfig = 'school';

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'birthday';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ID';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
