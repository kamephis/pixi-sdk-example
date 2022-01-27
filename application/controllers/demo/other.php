<?php

class Other extends SDKMenu
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function faq()
    {
        // Loading view
        $faq = $this->load->view('demo/faq', null, true);
        
        $htmlTop = "<!-- page specific plugin styles -->
		<link rel='stylesheet' href='".base_url()."assets/pixi/css/jquery-ui.custom.min.css' />";
        
        $htmlBottom = "<!-- page specific plugin scripts -->
		<script src='".base_url()."assets/pixi/js/jquery-ui.custom.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.ui.touch-punch.min.js'></script>
		<script src='".base_url()."assets/pixi/js/jquery.slimscroll.min.js'></script>";
        
        $this->loadMainView('FAQ', 'frequently asked questions using tabs and accordions', $faq, $htmlTop, $htmlBottom);
    }
    
    public function error404()
    {
        // Loading view
        $error = $this->load->view('demo/error404', null, true);
        
        $this->loadMainView('', '', $error);
    }
    
    public function error500()
    {
        // Loading view
        $error = $this->load->view('demo/error500', null, true);
        
        $this->loadMainView('', '', $error);
    }
    
    public function grid()
    {
        // Loading view
        $grid = $this->load->view('demo/grid', null, true);
        
        $htmlTop = "<!-- inline styles related to this page -->
		<style>
			/* styling the grid page's grid elements */
            .center {
            	text-align: center;
            }
            .center [class*=\"col-\"] {
            	margin-top: 2px;
            	margin-bottom: 2px;
            	padding-top: 4px;
            	padding-bottom: 4px;
            
            	position: relative;
            	text-overflow: ellipsis;
            }
            .center [class*=\"col-\"]  span{
              position: relative;
              z-index: 2;
            	
              display: inline-block;
              overflow: hidden;
              text-overflow: ellipsis;
              white-space: nowrap;
            
              width: 100%;
            }
            .center [class*=\"col-\"]:before {
            	display: block;
            	content: \"\";
            	
            	position: absolute;
            	top: 0;
            	bottom: 0;
            	left: 2px;
            	right: 2px;
            	z-index: 1;
            	
            	border: 1px solid #DDD;
            	
            }
            
            .center [class*=\"col-\"]:hover:before {
            	background-color: #FCE6A6;
            	border-color: #EFD27A;
            }
		</style>";
        
        $this->loadMainView('Grid', 'bootstrap grid sizing', $grid, $htmlTop);
    }
    
    public function blank()
    {
        // Loading view
        $blank = $this->load->view('demo/blank', null, true);
        
        $this->loadMainView('', '', $blank);
    }
}
