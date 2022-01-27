<?php

class Api extends SDKMenu
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        // Loading view
        $api = $this->load->view('demo/api', null, true);
        
        $this->loadMainView('API', 'Easy to use API calls', $api);
    }
}
