<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Abhishek Shrivastava<abhishek@mobileappz.in>
 * @copyright (c) 2014, Mobileappz Team
 */

class imageUpload{
    public $_response = array();
    
    public function __construct(){
        
    }
    
    /**
     * @method imageUpload()
     */
    
    function imageUploadFunction(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $byte = base64_decode($imageByte);
            $profilePath = dirname(dirname(__FILE__))."/images/"; //Profile upload path
            $ext = ".png"; //Profile Image file extension
            
            if(!is_dir($profilePath)){
                mkdir($profilePath,0777);
            }
            
            chdir($profilePath);
            
        }
    }
}