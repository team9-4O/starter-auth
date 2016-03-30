<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

	protected $data = array();   // parameters for view components
	protected $id; // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->data['title'] = "Top Secret Government Site"; // our default title
		$this->errors = array();
		$this->data['pageTitle'] = 'welcome';   // our default page
                $this->data['sessionid'] = session_id();
	}

	/**
	 * Render this page
	 */
	function render()
	{
		$mychoices = array('menudata' => $this->makemenu());
		$this->data['menubar'] = $this->parser->parse('_menubar', $mychoices, true);
		//$this->data['menubar'] = $this->makemenu();
                $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
                 
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}

	// build menu choices depending on the user role
	function makemenu()
	{
		$choices = array();
                $choices[] = array('name' => "Alpha", 'link' => '/alpha');
                if($this->session->userdata('userRole') == NULL){
                    $choices[] = array('name' => "Login", 'link' => '/auth');
                    return $choices;
                }
                if($this->session->userdata('userRole') == 'user'){
                    $choices[] = array('name' => "Beta", 'link' => '/beta');
                    $choices[] = array('name' => "Logout", 'link' => '/auth/logout');
                    return $choices;
                      
                }
                if($this->session->userdata('userRole') == 'admin'){
                    $choices[] = array('name' => "Beta", 'link' => '/beta');
                    $choices[] = array('name' => "Gamma", 'link' => '/gamma');
                    $choices[] = array('name' => "Logout", 'link' => '/auth/logout');
                    return $choices;
                      
                }
                return 'joseph';
		
	}
       
        function restrict($roleNeeded = null){
            $userRole = $this->session->userdata('userRole');
            if ($roleNeeded != null) {
                if (is_array($roleNeeded)) {
                    if (!in_array($userRole, $roleNeeded))
                    {
                        redirect("/");
                        return;
                    }
                } else if ($userRole != $roleNeeded) {
                    redirect("/");
                    return;
                }
            }
        }
}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */