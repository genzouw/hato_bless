<?php
class MChiiki extends AppModel
{
	//public $useTable = false;
//	public  $name = "Tkyukakyusya";
    public  $useTable = 'M_CHIIKI';
//    var $primaryKey = 'AREA_CD';
//    var $useDbConfig = 'default';
// public $displayField = 'AREA_MEI';

	public function getArea(){
//	echo "aaa";
		$results = $this->find( 'list', array('fields' => array( 'CHIIKI_CD', 'CHIIKI_MEI') ) );


		return $results;
	}
}