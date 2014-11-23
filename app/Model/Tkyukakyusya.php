<?php
class Tkyukakyusya extends AppModel
{
	//public $useTable = false;
	public  $name = "Tkyukakyusya";
    public  $useTable = 'T_KYUKAKYUSYA';

//    var $primaryKey = 'AREA_CD';
//    var $useDbConfig = 'default';
// public $displayField = 'AREA_MEI';
    public $validate = array(
    		't1' => array(
    				'rule' => 'notEmpty',
    				'required' => true,
    				'message' => '発時刻1は必ず入力して下さい',

    		),
    		't2' => array(
    				'rule' => 'notEmpty',
    				'required' => true,
    				'message' => '発時刻2は必ず入力して下さい',

    		),
  //  		'email' => array(
   // 				'rule'=> 'email',
   // 				'required' => true,
   // 				'message' => '｢メールアドレス｣は正しく入力して下さい',
    //		),

    );

	public function getAll(){

		$results = $this->find('all');

		return $results;
	}

	public function getRecord(){

		$option = array();
		$option['recursive'] = 2;
		$option['joins'][] = array(
				'type' => 'LEFT',   //LEFT, INNER, OUTER
				'table' => 'T_KYUKAKYUSYA_M',
				'alias' => 'km',
				'fields'=>'*',
				'conditions' => '[Tkyukakyusya].[KYUKAKYUSYA_NO]=[km].[KYUKAKYUSYA_NO]',
		);
		$option['joins'][] = array(
				'type' => 'LEFT',   //LEFT, INNER, OUTER
				'table' => 'M_CHIIKI',
				'alias' => 'ch',
				'fields'=>'*',
				'conditions' => '[ch].[CHIIKI_CD]=[km].[AREA_CD]',
		);
		$option['joins'][] = array(
				'type' => 'LEFT',   //LEFT, INNER, OUTER
				'table' => 'M_SYARYO',
				'alias' => 'ms',
				'fields'=>'*',
				'conditions' => '[Tkyukakyusya].[SYARYO_KBN]=[ms].[SYARYO_KBN]',
		);
		$option['limit'] = 10;
		$option['fields'] = '*,km.SAGYO_KBN,km.SAGYO_DT_FROM,km.SAGYO_DT_TO,km.UPDATE_DT,km.SAGYOCHI_POSTAL_NO,km.SAGYOCHI_SHOSAI_1,km.SAGYOCHI_SHOSAI_2,ch.CHIIKI_MEI,ms.SYARYO_NAME';
		$option['order'] = array('[Tkyukakyusya].[UPDATE_DT]' => 'desc');
	//	$option['conditions'] = array('Post.isPrivate' => 1);
		$results = $this->find('all',$option );

		return $results;
	}

	public function saveRecord($data){
		try {
			$this->begin();

				$this->save($data);

				App::import('Model','TkyukakyusyaM');

			//	$TkyukakyusyaM->save($data);
			$this->commit();
		} catch (Exception $ex) {
			$this->rollback();
		}
	}

}