<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author : Abhishek Shrivastava
 * Email  : abhishek@mobileappz.in
 * Timestamp : Sep-19 10:11AM
 * Copyright : CTS team
 *
 */
	
 	final class config
	{
	    /// -- Hold Static class object --
	    private static $ref;
	    /// -- Hold Static private class members variables --
	    private $_config=array();
	    /**
	    * @method __construct
	    * @see private constructor to protect beign inherited
	    * @access private
	    * @return void
	    */
	    private function __construct()
	    {
	        /*
	        |--------------------------------------------------------------------------
	        | Web Site URL
	        |--------------------------------------------------------------------------
	        | Get url of web site with domain name and folder address
	        */
	        $this->_config['siteUrl'] = $_SERVER["REQUEST_URI"];
	        /*
	        |--------------------------------------------------------------------------
	        | API KEYS
	        |--------------------------------------------------------------------------
	        | GOOGLE PUSH API KEY
	        */							 
	        $this->_config['API_KEY'] = "AIzaSyAJ4JV3wDLbpqQi31L_pnCfiEHUjPmqBUU";
	        /*
	        |--------------------------------------------------------------------------
	        | API PUSH URL
	        |--------------------------------------------------------------------------
	        | GOOGLE PUSH API PUSH URL
	        */
	        $this->_config['AND_PUSH_URL']="https://android.googleapis.com/gcm/send";
	        /*
	        |--------------------------------------------------------------------------
	        | Sql Host Server Name
	        |--------------------------------------------------------------------------
	        |
	        | Name of server which you are trying to connect Ex. (www.chatsupport.co.uk)
	        | Please do not allow this use access to "%" to mantain security
	        |
	        */
                //        $this->_config["SQL_HOST_NAME"] = "server.worldvision.com";
                $this->_config["SQL_HOST_NAME"] ="110.4.42.41";
	        /*
	        |--------------------------------------------------------------------------
	        | Sql User Name to Database Server
	        |--------------------------------------------------------------------------
	        |
	        | Name of User which you are trying to connect with server Ex. (www.chatsupport.co.uk)
	        | Please do not allow this use access to "%" to this user to mantain security
	        |
	        */
	         $this->_config['SQL_USER_NAME'] ="worldvis_cts1";
                //   $this->_config[SQL_USER_NAME'] = "worldvis_cts1";
	        /*
	        |--------------------------------------------------------------------------
	        | Sql User Password to Database Server
	        |--------------------------------------------------------------------------
	        |
	        | Name of User Password which you are trying to connect with server Ex. (www.chatsupport.co.uk)
	        | Please do not allow this use access to "%" to this user to mantain security
	        |
	        */
	        $this->_config['SQL_PASSWORD']="calTrade_12345";
          // $this->_config['SQL_PASSWORD'] = "calTrade_12345";
	        /*
	        |--------------------------------------------------------------------------
	        | Sql Database Name
	        |--------------------------------------------------------------------------
	        |
	        | Name of Data-base which you are trying to connect with server Ex. (www.chatsupport.co.uk)
	        | Please Make sure that only local user have permission to access this DB
	        |
	        */
	        $this->_config['SQL_DB']="worldvis_cts";
  // $this->_config['SQL_DB'] = "worldvis_cts";
	        /*
	        |--------------------------------------------------------------------------
	        | Error Logging Directory Path
	        |--------------------------------------------------------------------------
	        |
	        | Leave this BLANK unless you would like to set something other than the default
	        | system/logs/ folder.  Use a full server path with trailing slash.
	        |
	        */
	        $this->_config['log_path'] = '';
	        /*
	        |--------------------------------------------------------------------------
	        | Error Logging Threshold
	        |--------------------------------------------------------------------------
	        | If you have enabled error logging, you can set an error threshold to
	        | determine what gets logged. Threshold options are:
	        | You can enable error logging by setting a threshold over zero. The
	        | threshold determines what gets logged. Threshold options are:
	        |
	        |	0 = Disables logging, Error logging TURNED OFF
	        |	1 = Error Messages (including PHP errors)
	        |	2 = Debug Messages
	        |	3 = Informational Messages
	        |	4 = All Messages
	        | For a live site you'll usually only enable Errors (1) to be logged otherwise
	        | your log files will fill up very fast.
	        */
	        $this->_config['log_threshold'] = 3;
	        /*
	        |--------------------------------------------------------------------------
	        | Date Format for Logs
	        |--------------------------------------------------------------------------
	        | Each item that is logged has an associated date. You can use PHP date
	        | codes to set your own date formatting
	        */
	        $this->_config['log_date_format']= 'D M j G:i:s T Y';
	        
	         $this->_config['facebook'] = 'https://facebook.com/onegoalasia';
                $this->_config['twitter'] = 'https://twitter.com/onegoalasia';
                $this->_config['google_plus'] = 'https://plus.google.com/u/0/112213934021460093600';
                $this->_config['phone'] = '123.456.0987';
                $this->_config['url_privacy'] = 'http://'.$_SERVER['SERVER_NAME'].'/~worldvision/CTS/index.php/page/terms';
                $this->_config['terms_url'] = 'http://'.$_SERVER['SERVER_NAME'].'/~worldvision/CTS/index.php/page/prv_policy';
                $this->_config['emailto'] = 'mailto:online@onegoal.asia';
                $this->_config['email'] = 'online@onegoal.asia';
                 /*
	        |--------------------------------------------------------------------------
	        | Strat point of week
	        |--------------------------------------------------------------------------
	        | Each goal of user will be associated with the range of week. You can use day
	        | codes to set your strat point of week
	        */
                $this->_config['week_start']= 'Wednesday';
                
                 /*
	        |--------------------------------------------------------------------------
	        | End point of week
	        |--------------------------------------------------------------------------
	        | Each goal of user will be associated with the range of week. 
	        | You must use next day of week_start day 
	        | This will set the 7 days complete week
	        | codes to set your strat point of week.
	        */
                $this->_config['week_end'] = 'Tuesday';
	    }
	    
	    /**
	    *Config::getInst()
	    *@Param Void
	    *@RETURN Static Object of Class
	    */
	    final public static function getInst()
	    {
	      if(!is_object(config::$ref)){
	          config::$ref=new config();
	      }
	      return config::$ref;
	    }
	    
	    /**
	    *Config::getConfig Array()
	    *@Param Void
	    *@RETURN Array of Settings
	    */
	    final public function getSettings()
	    {
	        return $this->_config;
	    }
	
	    /**
	    *config::getKeyValue Array()
	    *@Param key STRING
	    *@RETURN Array of Settings
	    */
	    final public function getKeyValue($key)
	    {
	        if(array_key_exists($key,$this->_config))
	        {
	          return $this->_config[$key];
	        }
	    }
          
	}///  -- Class:config ENDS --
?>
