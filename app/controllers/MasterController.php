<?php 

abstract class MasterController { 

	protected $title;
	protected $metaDesc;
	protected $dbc;


	

	//Force all children to have a build html function
	abstract public function buildHTML();

}