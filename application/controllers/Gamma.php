<?php

/**
 * Secret stuff
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Gamma extends Application {

	function __construct()
	{
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  We could tell you what was here, but...
	//-------------------------------------------------------------

	function index()
	{
		$this->data['pagebody'] = 'gamma';
		$this->render();
	}

}
