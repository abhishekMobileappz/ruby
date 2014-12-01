<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author : 
 * Email  : 
 * Timestamp : Aug-29 06:11PM
 * Copyright : nosave
 *
 */
	
        
	/**
	* Error Logging Interface
	* Function::log_message()
	* We use this as a simple mechanism to access the logging
	* class and send messages to be logged.
	* @access	public
	* @return	void
	*/
	function log_message($level = "error", $message="", $php_error = FALSE) {
		global $wgLog;
	    if(is_object($wgLog)) {
	        $wgLog->write_log($level, $message, $php_error);
	    }
	    else {
	        $wgLog=loadObject("log");
	        $wgLog->write_log($level, $message, $php_error);
	    }
	}
	
	/**
	* Class registry
	*
	* This function acts as a singleton.  If the requested class does not
	* exist it is instantiated and set to a static variable.  If it has
	* previously been instantiated the variable is returned.
	*
	* @access	public
	* @param	string	the class name being requested
	* @param	bool	optional flag that lets classes get loaded but not instantiated
	* @return	object
	*/
	function loadObject($class, $instantiate = "") {
	    static $objects = array();
	    // Does the class exist?  If so, we"re done...
	    if (array_key_exists($class, $objects)){
	        return $objects[$class];
	    }
	    if(isset($instantiate) && $instantiate != "") {
	        $objects[$class] = new $class($instantiate);
	    }
	    else {
	        $objects[$class] = new $class();
	    }
	    log_message("debug",$class.":: Object Initiated Successfully ");

	    return $objects[$class];
	}
	/**
	* Loads the main config.php file
	* Function::get_config()
	* @access	private
	* @return	array
	*/
	function get_config() {
		  if (file_exists(BASEPATH.DS.LIBPATH.DS."config".EXT)) {
	        $_config=config::getInst()->getSettings();
	        return $_config;
	    }
	    else if (!file_exists(BASEPATH.DS.LIBPATH.DS."config".EXT)) {
	        exit("The configuration file config".EXT." does not exist.");
	    }
	    else if ( (!isset($_config)) || (!is_array($_config))) {
	        exit("Your config file does not appear to be formatted correctly.");
	    }
	}
	

    // --------------------------------------------------------------------

    /**
     * Hash encode a string
     *
     * @access	public
     * @param	string
     * @return	string
     */
    if ( ! function_exists('do_hash'))
    {
        function do_hash($str, $type = 'sha1')
        {
            if ($type == 'sha1')
            {
                return sha1($str);
            }
            else
            {
                return md5($str);
            }
        }
    }

    /**
     * generateRandomString
     *
     * @access	public
     * @param	Integer
     * @return	string
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

     /**
     * Multidimantional Arry sorting
     *
     * @access	public
     * @param	Integer
     * @return	string
     */
    
    function subval_sort($a,$subkey) {
	foreach($a as $k=>$v) {
		$b[$k] = strtolower($v[$subkey]);
	}
	asort($b);
	foreach($b as $key=>$val) {
		$c[] = $a[$key];
	}
	return $c;
    }
    /**
     * @Input: String needs to encode
     * @Output: Returns encoded string
     * @Access: public
     * Comment: This function takes normal string and converted it to encoded string
     */
    if(! function_exists('encode'))
    { 
        $ob7410a53c759307ddcc59ee657ae243a="\x62\x61\x73\x65\x36\x34\x5f\x64\x65\x63\x6f\x64\x65";eval($ob7410a53c759307ddcc59ee657ae243a("JG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYz0iXHg2MiI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTA9Ilx4NjIiOyAkb2UxNTRlYmMwM2NiYzMyZjQ5YjFjYzZiMWZiM2RhMTY3PSJceDY3IjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZT0iXHg2NyI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzI9Ilx4NzMiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHg2MSI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDYxIjsgJG9lMTU0ZWJjMDNjYmMzMmY0OWIxY2M2YjFmYjNkYTE2Ny49Ilx4N2EiOyAkbzQ2Y2Q4NDdjODY3NzU0MTRjNjgxZTg2OWVjZGIwNDNlLj0iXHg3YSI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIuPSJceDc0IjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4NzMiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHg3MyI7ICRvZTE1NGViYzAzY2JjMzJmNDliMWNjNmIxZmIzZGExNjcuPSJceDY0IjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZS49Ilx4NjkiOyAkbzA4ODlhNWU2OTIyMWQxN2YyYmYxZWM0YzIyYWFmNTcyLj0iXHg3MiI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDY1IjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NjUiOyAkb2UxNTRlYmMwM2NiYzMyZjQ5YjFjYzZiMWZiM2RhMTY3Lj0iXHg2NSI7ICRvNDZjZDg0N2M4Njc3NTQxNGM2ODFlODY5ZWNkYjA0M2UuPSJceDZlIjsgJG8wODg5YTVlNjkyMjFkMTdmMmJmMWVjNGMyMmFhZjU3Mi49Ilx4NWYiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHgzNiI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDM2IjsgJG9lMTU0ZWJjMDNjYmMzMmY0OWIxY2M2YjFmYjNkYTE2Ny49Ilx4NjYiOyAkbzQ2Y2Q4NDdjODY3NzU0MTRjNjgxZTg2OWVjZGIwNDNlLj0iXHg2NiI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIuPSJceDcyIjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4MzQiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHgzNCI7ICRvZTE1NGViYzAzY2JjMzJmNDliMWNjNmIxZmIzZGExNjcuPSJceDZjIjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZS49Ilx4NmMiOyAkbzA4ODlhNWU2OTIyMWQxN2YyYmYxZWM0YzIyYWFmNTcyLj0iXHg2ZiI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDVmIjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NWYiOyAkb2UxNTRlYmMwM2NiYzMyZjQ5YjFjYzZiMWZiM2RhMTY3Lj0iXHg2MSI7ICRvNDZjZDg0N2M4Njc3NTQxNGM2ODFlODY5ZWNkYjA0M2UuPSJceDYxIjsgJG8wODg5YTVlNjkyMjFkMTdmMmJmMWVjNGMyMmFhZjU3Mi49Ilx4NzQiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHg2NSI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDY0IjsgJG9lMTU0ZWJjMDNjYmMzMmY0OWIxY2M2YjFmYjNkYTE2Ny49Ilx4NzQiOyAkbzQ2Y2Q4NDdjODY3NzU0MTRjNjgxZTg2OWVjZGIwNDNlLj0iXHg3NCI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIuPSJceDMxIjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4NmUiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHg2NSI7ICRvZTE1NGViYzAzY2JjMzJmNDliMWNjNmIxZmIzZGExNjcuPSJceDY1IjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZS49Ilx4NjUiOyAkbzA4ODlhNWU2OTIyMWQxN2YyYmYxZWM0YzIyYWFmNTcyLj0iXHgzMyI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDYzIjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NjMiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHg2ZiI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDZmIjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4NjQiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHg2NCI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDY1IjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NjUiOyANCiBldmFsKCRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIoJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZSgkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwKCJLODVJTEVndlMwcFVLRW9zU0NvczBsQXA4c3lyekNqU3JGWW9LOVlvUzBzclNvY0xLYWlwS1VDbEZXMlZsSUJLVkZLTDBqSXEwMjBkOHNzU2pVcUxzalVjU25JTGk0b3I4OUtMTkJ6UzBsUGpVNVBTRFkzaEJtaHFXcWNXcFdla0pzSTBXdGZXNnV2cksranFLZ1NIaFFFcEFBPT0iKSkpKTs="));

    }

    /**
     * @Input: Encoded string needs to decode
     * @Output: Returns decoded string
     * @Access: public
     * Comment: This function takes encoded string and converted it to decoded (normal) string
     */
    if(! function_exists('decode'))
    {
    $ob7410a53c759307ddcc59ee657ae243a="\x62\x61\x73\x65\x36\x34\x5f\x64\x65\x63\x6f\x64\x65";eval($ob7410a53c759307ddcc59ee657ae243a("JG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYz0iXHg2MiI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTA9Ilx4NjIiOyAkb2UxNTRlYmMwM2NiYzMyZjQ5YjFjYzZiMWZiM2RhMTY3PSJceDY3IjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZT0iXHg2NyI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzI9Ilx4NzMiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHg2MSI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDYxIjsgJG9lMTU0ZWJjMDNjYmMzMmY0OWIxY2M2YjFmYjNkYTE2Ny49Ilx4N2EiOyAkbzQ2Y2Q4NDdjODY3NzU0MTRjNjgxZTg2OWVjZGIwNDNlLj0iXHg3YSI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIuPSJceDc0IjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4NzMiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHg3MyI7ICRvZTE1NGViYzAzY2JjMzJmNDliMWNjNmIxZmIzZGExNjcuPSJceDY0IjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZS49Ilx4NjkiOyAkbzA4ODlhNWU2OTIyMWQxN2YyYmYxZWM0YzIyYWFmNTcyLj0iXHg3MiI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDY1IjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NjUiOyAkb2UxNTRlYmMwM2NiYzMyZjQ5YjFjYzZiMWZiM2RhMTY3Lj0iXHg2NSI7ICRvNDZjZDg0N2M4Njc3NTQxNGM2ODFlODY5ZWNkYjA0M2UuPSJceDZlIjsgJG8wODg5YTVlNjkyMjFkMTdmMmJmMWVjNGMyMmFhZjU3Mi49Ilx4NWYiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHgzNiI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDM2IjsgJG9lMTU0ZWJjMDNjYmMzMmY0OWIxY2M2YjFmYjNkYTE2Ny49Ilx4NjYiOyAkbzQ2Y2Q4NDdjODY3NzU0MTRjNjgxZTg2OWVjZGIwNDNlLj0iXHg2NiI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIuPSJceDcyIjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4MzQiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHgzNCI7ICRvZTE1NGViYzAzY2JjMzJmNDliMWNjNmIxZmIzZGExNjcuPSJceDZjIjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZS49Ilx4NmMiOyAkbzA4ODlhNWU2OTIyMWQxN2YyYmYxZWM0YzIyYWFmNTcyLj0iXHg2ZiI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDVmIjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NWYiOyAkb2UxNTRlYmMwM2NiYzMyZjQ5YjFjYzZiMWZiM2RhMTY3Lj0iXHg2MSI7ICRvNDZjZDg0N2M4Njc3NTQxNGM2ODFlODY5ZWNkYjA0M2UuPSJceDYxIjsgJG8wODg5YTVlNjkyMjFkMTdmMmJmMWVjNGMyMmFhZjU3Mi49Ilx4NzQiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHg2NSI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDY0IjsgJG9lMTU0ZWJjMDNjYmMzMmY0OWIxY2M2YjFmYjNkYTE2Ny49Ilx4NzQiOyAkbzQ2Y2Q4NDdjODY3NzU0MTRjNjgxZTg2OWVjZGIwNDNlLj0iXHg3NCI7ICRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIuPSJceDMxIjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4NmUiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHg2NSI7ICRvZTE1NGViYzAzY2JjMzJmNDliMWNjNmIxZmIzZGExNjcuPSJceDY1IjsgJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZS49Ilx4NjUiOyAkbzA4ODlhNWU2OTIyMWQxN2YyYmYxZWM0YzIyYWFmNTcyLj0iXHgzMyI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDYzIjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NjMiOyAkbzUzY2Y3MjkzNDEwOTQyMjAxZjUwNDkwYmMyOGEwZmFjLj0iXHg2ZiI7ICRvZDE1N2JkYmFmZDc4NzRkMjlkMjQyYzFmNGJkZDkyYTAuPSJceDZmIjsgJG81M2NmNzI5MzQxMDk0MjIwMWY1MDQ5MGJjMjhhMGZhYy49Ilx4NjQiOyAkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwLj0iXHg2NCI7ICRvNTNjZjcyOTM0MTA5NDIyMDFmNTA0OTBiYzI4YTBmYWMuPSJceDY1IjsgJG9kMTU3YmRiYWZkNzg3NGQyOWQyNDJjMWY0YmRkOTJhMC49Ilx4NjUiOyANCiBldmFsKCRvMDg4OWE1ZTY5MjIxZDE3ZjJiZjFlYzRjMjJhYWY1NzIoJG80NmNkODQ3Yzg2Nzc1NDE0YzY4MWU4NjllY2RiMDQzZSgkb2QxNTdiZGJhZmQ3ODc0ZDI5ZDI0MmMxZjRiZGQ5MmEwKCJLODVJTEVndlMwcFVLQ3dxU0NvczBsQXA4c3lyekNqU3JGWW9LOVlvUzBzclNvY0xLYWlwS1VDbEZXMlZsRFNyVlZLTDBqSXEwMjBkMHRKVDQxT1QwZzJOTlJ4S2Nzc1NpeXZ6MG9zMEhKTHpDaW8wbEVLMWxCUjBZS1pxYWxxbkZxVm5wQ1lxUVBWYTE5YnE2K3NyNk9vcUJJZUZBU2tBIikpKSk7"));


    }


	/*
	|* Include basic engine core i8E_engine
	|*
	*/
	if(file_exists(BASEPATH.DS.LIBPATH.DS."core_i8e_engine.php"))
	{
	    @include(BASEPATH.DS.LIBPATH.DS."core_i8e_engine.php");
	}
	else
	{
	    die("Illegal use of Script!! Main COnfig files Missing!!!!");
	}
?>
