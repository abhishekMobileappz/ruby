<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @api
 * @package services\core\my_model\
 * @source 5  
 * @author Arnold Sameroff
 * @email ast@mobileappz.in 
 * @timestamp March/21/2014 10:01AM
 * @copyright nosave
 * @class my_model
 * @version 1.0
 * This Class Added to extend or overload core Model class
 */

class my_model
{
	public $_post = array();
	public $_get = array();
	public $_db = array();
	public $_method="";
	/**
	* @method __construct
	* @see private constructor to protect beign inherited
	* @access private
	* @return void
	*/
	public function __construct()
	{
		/// -- Create Database Connection instance --
		$this->_db=env::getInst();
		/// -- Check for request TYPE GET or POST --
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			foreach ($_POST as $key => $value) {
				array_push($this->_post, $key, $value);
				$this->_method="POST";
			}
		}
		/// -- Check for request TYPE GET or POST --
		if($_SERVER["REQUEST_METHOD"]=="GET")
		{
			foreach ($_GET as $key => $value) {
				array_push($this->_get, $key, $value);
				$this->_method="GET";
			}
		}
	}
	/**
	* @method post
	* @see Public function to to get POST variable with KEY
	* @access public
	* @return response value or FALSE
	*/
	public function post($key='')
	{
		if(empty($key) && is_array($this->_post)) {
			return $this->_post;
		}
		
		if(array_key_exists($key,$this->_post)) {
			return $this->_post[$key];
		} else {
			return 0;
		}	
	}
	
	/**
	* @method get
	* @see Public function to to get POST variable with KEY
	* @access public
	* @return response value or FALSE
	*/
	public function get($key='')
	{
		if(empty($key)) {
			return $this->_get;
		}
		
		if(array_key_exists($key,$this->_get)){
			return $this->_get[$key];
		} else {
			return 0;
		}	
	}
	
}
?>
