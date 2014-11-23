<?php
class Msyaryo extends AppModel
{
	//public $useTable = false;
	public  $name = "Msyaryo";
    public  $useTable = 'M_SYARYO';

	public function getAll(){

		$option = array();
		$option['order'] = array('[Msyaryo].[SYARYO_KBN]' => 'ASC');
		$option['fields'] = array( 'SYARYO_KBN','SYARYO_NAME');
		$results = $this->find('list',$option);

		return $results;
	}


}