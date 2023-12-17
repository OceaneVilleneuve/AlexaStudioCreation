<?php
         
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CP_APPBOOK_BaseClass {       

    protected $item = 1;
    
    /** installation functions */
    public function install($networkwide)  {
    	global $wpdb;
     
    	if (function_exists('is_multisite') && is_multisite()) {
    		// check if it is a network activation - if so, run the activation function for each blog id
    		if ($networkwide) {
    	                $old_blog = $wpdb->blogid;
    			// Get all blog ids
    			$blogids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    			foreach ($blogids as $blog_id) {
    				switch_to_blog($blog_id);
    				$this->_install();
    			}
    			switch_to_blog($old_blog);
    			return;
    		}	
    	} 
    	$this->_install();	
    }    
    
    function get_param($key)
    {
        if (isset($_GET[$key]) && $_GET[$key] != '')
            return $this->sanitize($_GET[$key]);
        else if (isset($_POST[$key]) && $_POST[$key] != '')
            return $this->sanitize($_POST[$key]);
        else 
            return '';
    }
    
    function is_administrator()
    {
        return current_user_can('manage_options');
    }
    
    public function get_site_url($admin = false)
    {
        $blog = get_current_blog_id();
        if( $admin ) 
            $url = get_admin_url( $blog );	
        else 
            $url = get_home_url( $blog );	
        
        //$url = parse_url($url);
        return rtrim($url,"/")."/";
    }        
    
    function get_FULL_site_url($admin = false)
    {
        $blog = get_current_blog_id();
        if( $admin ) 
            $url = get_admin_url( $blog );	
        else 
            $url = get_home_url( $blog );	
        
        $url = parse_url($url);
        if ( isset( $url["path"] ) ) {
            $url = rtrim($url["path"],"/");
        } else {
            $url = "/";
        }
        $pos = strpos($url, "://");
        if ($pos === false)
            $url = 'http://'.esc_url($_SERVER["HTTP_HOST"]).$url;
        return $url;
    }
    
    function cleanJSON ($str)
    {
        $str = str_replace('&qquot;','"',$str);
        $str = str_replace('	',' ',$str);
        $str = str_replace("\n",'\n',$str);
        $str = str_replace("\r",'',$str);      
        return $str;        
    }
    
    function sanitize ( $v )
	{ 
        if (is_array($v))
        {
            for ($iv=0; $iv<count($v); $iv++)
                $v[$iv] = $this->sanitize($v[$iv]);
        }
        else
        {
		    $allowed_tags = wp_kses_allowed_html( 'post' );
            if (isset($allowed_tags["script"])) unset($allowed_tags["sript"]);
            if (isset($allowed_tags["iframe"])) unset($allowed_tags["iframe"]);            
		    $v = wp_kses($v, $allowed_tags);
        }
		return $this->clean_sanitize($v);
	} 
    
    
    function clean_sanitize ( $str )
	{
        if (is_array($str))
        {
            for ($iv=0; $iv<count($str); $iv++)
                $str[$iv] = $this->clean_sanitize($str[$iv]);
            return $str;
        }
        else
        {
            if ( is_object( $str ) ) {
                return '';
            }
            $str = (string) $str; 
            $filtered = wp_check_invalid_utf8( $str );    
            return trim($filtered);
        }		
	} 
    
    
    function sanitizeTableName ( $v )
	{ 
        $v = $this->sanitize($v);
        $v = str_replace('"', '', $v);
        $v = str_replace("'", "", $v);
        $v = str_replace('`', '', $v);
        $v = str_replace(' ', '', $v);        
		return $v;
	} 
        
    
    public function recursive_implode($glue, array $array, $include_keys = false, $trim_all = true)
    {
    	$glued_string = '';
    
    	// Recursively iterates array and adds key/value to glued string
    	array_walk_recursive($array, function($value, $key) use ($glue, $include_keys, &$glued_string)
    	{
    		$include_keys and $glued_string .= $key.$glue;
    		$glued_string .= $value.$glue;
    	});
    
    	// Removes last $glue from string
    	strlen($glue) > 0 and $glued_string = substr($glued_string, 0, -strlen($glue));
    
    	// Trim ALL whitespace
    	$trim_all and $glued_string = preg_replace("/(\s)/ixsm", '', $glued_string);
    
    	return (string) $glued_string;
    }        
        
    
    public function add_field_verify ($table, $field, $type = "text") 
    {
        global $wpdb;
        $results = $wpdb->get_results("SHOW columns FROM `".$table."` where field='".$field."'");    
        if (!count($results))
        {               
            $wpdb->query( "ALTER TABLE  `".$this->sanitizeTableName($table)."` ADD `".$this->sanitizeTableName($field)."` ".$this->sanitizeTableName($type) );
        }
    }    
    
    function verify_nonce ($nonce, $action)
    {
        $verify_nonce = wp_verify_nonce( $nonce, $action);
        if (!$verify_nonce)
        {
            echo 'Error: Action cannot be authenticated (nonce failed). Please contact our support service if this problem persists.';
            exit;
        } 
    } 
    
    

    public $option_buffered_item = false;
    public $option_buffered_id = -1;

    public function get_option ($field, $default_value = '')
    {   
        global $wpdb;        
        if ($this->option_buffered_id == $this->item)
            $value = (property_exists($this->option_buffered_item, $field) && isset($this->option_buffered_item->$field) ? @$this->option_buffered_item->$field : '');
        else
        {  
           $myrows = $wpdb->get_results( "SELECT * FROM ".$wpdb->prefix.$this->table_items." WHERE id=".$this->item );
           if (count($myrows))
           {
               $value = @$myrows[0]->$field;           
               $this->option_buffered_item = @$myrows[0];
               $this->option_buffered_id  = $this->item;
           }
           else
               $value =  $default_value;
        }
        if ($value == '' && is_object($this->option_buffered_item) && $this->option_buffered_item->form_structure == '')
            $value = $default_value;
            
        $value = apply_filters( 'cpappb_get_option', $value, $field, $this->item );    
        
        return $value;
    }
    
    public function get_option_not_empty($field, $default_value = '')
    {
        $value = $this->get_option($field, $default_value);
        return ($value ? $value : $default_value);
    }
    
       
} // end class

?>