<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ccpayment extends MX_Controller{
    
    /**
     * @method void constructor Description
     * @author Abhishek Shrivastava<abhishek@mobileappz.in>
     * @copyright (c) 2014, Abhishek  Shrivastava
     */
    
    function __construct() {
        parent::__construct();
        
        //Load helpers
        $this->load->helper('url');
        
        //
    }
    
    function index(){
        $this->load->view('paymentView');
    }
}