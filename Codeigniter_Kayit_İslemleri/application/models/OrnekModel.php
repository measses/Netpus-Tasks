<?php
defined('NP_INITIALIZE') or exit('403 Forbidden');

class OrnekModel extends NP_Model
{



	public function __construct()
	{
		parent::__construct();
		$this->setTableName("ornek");

	}


}
