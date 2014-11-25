<?php
App::uses('AppModel', 'Model');
/**
 * TJuchuKihon Model
 *
 * @property MHojin $MHojin
 * @property  $
 */
class TJuchuKihon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 't_juchu_kihon';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'UKETSUKE_NO';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'UKETSUKE_NO' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'UKETSUKE_DT' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'UKETSUKE_SOSHIKI_CD' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'JUCHU_STS_CD' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'MHojin' => array(
			'className' => 'MHojin',
			'foreignKey' => 'HOJIN_CD',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
