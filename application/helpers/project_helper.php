<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if (!function_exists('menu_class'))
{
    function menu_class( $list =[] , $active_class="active" ,$var_name = "menu" )
    {
		$CI =& get_instance();
		$menu = $GLOBALS['CI']->load->get_var( $var_name );
		if( $menu ){
			if( is_array($list) ){
				return in_array($menu,$list)?$active_class:'';
			}else{
				return ($menu==$list)?$active_class:'';
			}
		}
		return "";
    }
}
