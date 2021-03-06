<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* start config shortcuts ------------ */

    if (!function_exists('config'))
    {
        function config($item_name)
        {   
            $CI = get_instance();
            return $CI->config->item($item_name);
        }
    }

/* done config shortcuts ------------ */


	if (!function_exists('rand_uuid'))
	{
		function rand_uuid($dt = '' )
		{	
			//$CI = get_instance();
			$data = new Uuid();
			if(!$dt){
				$dt = date('Ymd-H:i:s:U');
			}
			return $data->v5($dt);
		}
	}


/* Use of function
	para 1 = set default image ( if images not existed )
	para 2 = set source image ( 1st priority to preview )
	para 3...	= others ( 2nd priority to preview )
	para * ..	= others ( * priority to preview )
*/
	if (!function_exists('get_exists_image'))
	{
		function get_exists_image( $default='', $sourceimg='' )
		{
			$images = array();
			
			if( func_num_args() >= 3 ){
				for ($i=3; $i < func_num_args() ; $i++) { array_push($images, func_get_arg($i)); }
			}

			if( file_exists($sourceimg) AND filetype($sourceimg) == "file" ){
				return $sourceimg;
			}elseif ( count($images) > 0 ) {
				foreach ($images as $key => $value) {
					if( file_exists($value) AND filetype($value) == "file" ){ return $value; }
				}
			}

			return $default;
		}
	}

/*
	use of myunlink( file1 , file2 , ..., ... ... ...  )
	multiple file delete with check existed 
*/
	if (!function_exists('myunlink'))
	{
		function myunlink()
		{
			$list = array();
			for ($i = 0; $i < func_num_args() ; $i++) { 
				if( file_exists(func_get_arg($i)) AND func_get_arg($i) != "" ){
					unlink(func_get_arg($i));
					$list[func_get_arg($i)]=true;
				}else{
					$list[func_get_arg($i)]=false;
				}
			}
			return $list;
		}
	}


if (!function_exists('create_valid_url')){
	function create_valid_url($url){
		if( $url == "" ){
			return $url;
		}else{
			return $url = empty(parse_url($url)['scheme']) ? 'http://' . ltrim($url, '/') : $url;
		}
	}
}


if (!function_exists('get_array_index'))
{
	function get_array_index(&$array, $key, $default = '')
	{
		if( is_array($array) ){
			if(isset($array[$key])){
				return $array[$key];
			}else{
				return $default;
			}
		}else{
			return $default;
		}
	}
}


if (!function_exists('display_all_error'))
{
	function display_all_error( )
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
}


if (!function_exists('remove_accents'))
{
/**
 * Unaccent the input string string. An example string like `???????????????????????`
 * will be translated to `AOeyIOzoBY`. More complete than :
 *   strtr( (string)$str,
 *          "??????????????????????????????????????????????????????????????????????????????????????????????????????????",
 *          "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn" );
 *
 * @param $str input string
 * @param $utf8 if null, function will detect input string encoding
 * @author http://www.evaisse.net/2008/php-translit-remove-accent-unaccent-21001
 * @return string input string without accent
 */
function remove_accents( $str, $utf8=true )
{
    $str = (string)$str;
    if( is_null($utf8) ) {
        if( !function_exists('mb_detect_encoding') ) {
            $utf8 = (strtolower( mb_detect_encoding($str) )=='utf-8');
        } else {
            $length = strlen($str);
            $utf8 = true;
            for ($i=0; $i < $length; $i++) {
                $c = ord($str[$i]);
                if ($c < 0x80) $n = 0; # 0bbbbbbb
                elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
                elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
                elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
                elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
                elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
                else return false; # Does not match any model
                for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
                    if ((++$i == $length)
                        || ((ord($str[$i]) & 0xC0) != 0x80)) {
                        $utf8 = false;
                        break;
                    }

                }
            }
        }

    }

    if(!$utf8)
        $str = utf8_encode($str);

    $transliteration = array(
    '??' => 'I', '??' => 'O','??' => 'O','??' => 'U','??' => 'a','??' => 'a',
    '??' => 'i','??' => 'o','??' => 'o','??' => 'u','??' => 's','??' => 's',
    '??' => 'A','??' => 'A','??' => 'A','??' => 'A','??' => 'A','??' => 'A',
    '??' => 'A','??' => 'A','??' => 'A','??' => 'A','??' => 'C','??' => 'C',
    '??' => 'C','??' => 'C','??' => 'C','??' => 'D','??' => 'D','??' => 'E',
    '??' => 'E','??' => 'E','??' => 'E','??' => 'E','??' => 'E','??' => 'E',
    '??' => 'E','??' => 'E','??' => 'G','??' => 'G','??' => 'G','??' => 'G',
    '??' => 'H','??' => 'H','??' => 'I','??' => 'I','??' => 'I','??' => 'I',
    '??' => 'I','??' => 'I','??' => 'I','??' => 'I','??' => 'I','??' => 'J',
    '??' => 'K','??' => 'K','??' => 'K','??' => 'K','??' => 'K','??' => 'L',
    '??' => 'N','??' => 'N','??' => 'N','??' => 'N','??' => 'N','??' => 'O',
    '??' => 'O','??' => 'O','??' => 'O','??' => 'O','??' => 'O','??' => 'O',
    '??' => 'O','??' => 'R','??' => 'R','??' => 'R','??' => 'S','??' => 'S',
    '??' => 'S','??' => 'S','??' => 'S','??' => 'T','??' => 'T','??' => 'T',
    '??' => 'T','??' => 'U','??' => 'U','??' => 'U','??' => 'U','??' => 'U',
    '??' => 'U','??' => 'U','??' => 'U','??' => 'U','??' => 'W','??' => 'Y',
    '??' => 'Y','??' => 'Y','??' => 'Z','??' => 'Z','??' => 'Z','??' => 'a',
    '??' => 'a','??' => 'a','??' => 'a','??' => 'a','??' => 'a','??' => 'a',
    '??' => 'a','??' => 'c','??' => 'c','??' => 'c','??' => 'c','??' => 'c',
    '??' => 'd','??' => 'd','??' => 'e','??' => 'e','??' => 'e','??' => 'e',
    '??' => 'e','??' => 'e','??' => 'e','??' => 'e','??' => 'e','??' => 'f',
    '??' => 'g','??' => 'g','??' => 'g','??' => 'g','??' => 'h','??' => 'h',
    '??' => 'i','??' => 'i','??' => 'i','??' => 'i','??' => 'i','??' => 'i',
    '??' => 'i','??' => 'i','??' => 'i','??' => 'j','??' => 'k','??' => 'k',
    '??' => 'l','??' => 'l','??' => 'l','??' => 'l','??' => 'l','??' => 'n',
    '??' => 'n','??' => 'n','??' => 'n','??' => 'n','??' => 'n','??' => 'o',
    '??' => 'o','??' => 'o','??' => 'o','??' => 'o','??' => 'o','??' => 'o',
    '??' => 'o','??' => 'r','??' => 'r','??' => 'r','??' => 's','??' => 's',
    '??' => 't','??' => 'u','??' => 'u','??' => 'u','??' => 'u','??' => 'u',
    '??' => 'u','??' => 'u','??' => 'u','??' => 'u','??' => 'w','??' => 'y',
    '??' => 'y','??' => 'y','??' => 'z','??' => 'z','??' => 'z','??' => 'A',
    '??' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A',
    '???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A',
    '???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A',
    '???' => 'A','???' => 'A','???' => 'A','??' => 'B','??' => 'G','??' => 'D',
    '??' => 'E','??' => 'E','???' => 'E','???' => 'E','???' => 'E','???' => 'E',
    '???' => 'E','???' => 'E','???' => 'E','??' => 'Z','??' => 'I','??' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '??' => 'T','??' => 'I','??' => 'I','??' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','??' => 'K','??' => 'L','??' => 'M',
    '??' => 'N','??' => 'K','??' => 'O','??' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','??' => 'P',
    '??' => 'R','???' => 'R','??' => 'S','??' => 'T','??' => 'Y','??' => 'Y',
    '??' => 'Y','???' => 'Y','???' => 'Y','???' => 'Y','???' => 'Y','???' => 'Y',
    '???' => 'Y','???' => 'Y','??' => 'F','??' => 'X','??' => 'P','??' => 'O',
    '??' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','??' => 'a','??' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','??' => 'b','??' => 'g','??' => 'd',
    '??' => 'e','??' => 'e','???' => 'e','???' => 'e','???' => 'e','???' => 'e',
    '???' => 'e','???' => 'e','???' => 'e','??' => 'z','??' => 'i','??' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','??' => 't','??' => 'i',
    '??' => 'i','??' => 'i','??' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','??' => 'k',
    '??' => 'l','??' => 'm','??' => 'n','??' => 'k','??' => 'o','??' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','??' => 'p','??' => 'r','???' => 'r','???' => 'r','??' => 's',
    '??' => 's','??' => 't','??' => 'y','??' => 'y','??' => 'y','??' => 'y',
    '???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y',
    '???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y',
    '???' => 'y','???' => 'y','??' => 'f','??' => 'x','??' => 'p','??' => 'o',
    '??' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','??' => 'A',
    '??' => 'B','??' => 'V','??' => 'G','??' => 'D','??' => 'E','??' => 'E',
    '??' => 'Z','??' => 'Z','??' => 'I','??' => 'I','??' => 'K','??' => 'L',
    '??' => 'M','??' => 'N','??' => 'O','??' => 'P','??' => 'R','??' => 'S',
    '??' => 'T','??' => 'U','??' => 'F','??' => 'K','??' => 'T','??' => 'C',
    '??' => 'S','??' => 'S','??' => 'Y','??' => 'E','??' => 'Y','??' => 'Y',
    '??' => 'A','??' => 'B','??' => 'V','??' => 'G','??' => 'D','??' => 'E',
    '??' => 'E','??' => 'Z','??' => 'Z','??' => 'I','??' => 'I','??' => 'K',
    '??' => 'L','??' => 'M','??' => 'N','??' => 'O','??' => 'P','??' => 'R',
    '??' => 'S','??' => 'T','??' => 'U','??' => 'F','??' => 'K','??' => 'T',
    '??' => 'C','??' => 'S','??' => 'S','??' => 'Y','??' => 'E','??' => 'Y',
    '??' => 'Y','??' => 'd','??' => 'D','??' => 't','??' => 'T','???' => 'a',
    '???' => 'b','???' => 'g','???' => 'd','???' => 'e','???' => 'v','???' => 'z',
    '???' => 't','???' => 'i','???' => 'k','???' => 'l','???' => 'm','???' => 'n',
    '???' => 'o','???' => 'p','???' => 'z','???' => 'r','???' => 's','???' => 't',
    '???' => 'u','???' => 'p','???' => 'k','???' => 'g','???' => 'q','???' => 's',
    '???' => 'c','???' => 't','???' => 'd','???' => 't','???' => 'c','???' => 'k',
    '???' => 'j','???' => 'h'

	,'??' => "'",'??' => '','???' => 'h', '??'=>"'", '???'=>"'", '???'=>"'", '???'=>'u', '???'=>'e', '???'=>'a', '???'=>'i', '???'=>'a', '???'=>'e', '???'=>'i', '???'=>'o', '???'=>'o', '???'=>'e', '??'=>'o', '???'=>'a', '???'=>'a', '??'=>'u', '???'=>'a', '???'=>'a', '???'=>'a', '???'=>'d', '???'=>'H', '???'=>'D', '???'=>'d', '??'=>'s', '??'=>'a', '??'=>'t'
    );
    $str = str_replace( array_keys( $transliteration ),
                        array_values( $transliteration ),
                        $str);
    return $str;
}
//- remove_accents()
}



if (!function_exists('get_first_char'))
{
	function get_first_char($str ,$default= "")
	{
		if( strlen($str) > 0 ){
			return strtolower(substr(remove_accents($str),0,1));
		}
		return $default;
	}
}


if (!function_exists('my_array_count_values'))
{
	function my_array_count_values( &$str )
	{
		ob_start();
		$r = array_count_values($str);
		ob_get_clean();
		return $r;
	}
}

//return no of char writer else false
if (!function_exists('base64_image_save'))
{
    function base64_image_save($path,$data)
    {
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
        return file_put_contents($path, $data);
    }
}


//return no extenstion of image
if (!function_exists('get_base64_image_type'))
{
    function get_base64_image_type( $data )
    {
        //preg_match("/:image\/(.*?);/", $data, $result);
        preg_match("/:image\/[a-zA-Z]*/", $data, $result);
        $ext = count($result)>0?str_replace(":image/","",strtolower($result[0])):"";
        return $ext;
    }
}


/**
 * http://stackoverflow.com/a/2021729
 * Remove anything which isn't a word, whitespace, number
 * or any of the following characters -_~,;[]().
 * If you don't need to handle multi-byte characters
 * you can use preg_replace rather than mb_ereg_replace
 * @param $str
 * @return string
 */
if (!function_exists('sanitizeFileName')){    
    function sanitizeFileName($str) {
        // Basic clean up
        $str = preg_replace("([^\w\s\d\-_~,;\[\]\(\).])", '', $str);
        // Remove any runs of periods
        $str = preg_replace("([\.]{2,})", '', $str);
        return $str;
    }
}


//file download and view direct 
if (!function_exists('force_download_file')){
    function force_download_file($file_name, $source_file, $is_download = false)
    {
        $CI = get_instance();
        $CI->load->helper("file");
        $CI->load->helper("download");
        if( file_exists($source_file) ){
            $mime = get_mime_by_extension($source_file);
            $size = filesize($source_file);
            if( $is_download ){ //download
                force_download($file_name , file_get_contents($source_file),$mime);
            }else{ // view direct file
                if($mime==""){ $mime = 'application/octet-stream'; }
                header("Content-Type: $mime");
                header("Content-Disposition: filename=$file_name");
                echo file_get_contents($source_file);
            }
            return true;
        }else{
            return false;
        }
    }
}


if (!function_exists('unlink_cheack_file'))
{
    function unlink_cheack_file($file_name,$path)
    {
        $exits=file_exists($path.$file_name);
        if($exits==1)
        {
            $unlink=unlink($path.$file_name);            
            $status=1;
        }
        else
        {
            $status=2;
        }
        return $status;

    }
}

if (!function_exists('Add_log'))
{
    function Add_log($action) {
    $ci =& get_instance();
     $user_data=array();
     $user_data['user_name']=$ci->session->userdata('username');
     $user_data['user_id']=$ci->session->userdata('userid');
     $user_data['time']=date("l jS \of F Y h:i:s A");
     $ip = $ci->input->ip_address();
     //print_r($user_data);
     $string=$action." By Username=".$ci->session->userdata("username")."/ Admin Role : ".$ci->session->userdata("role_name")."/ User_Id=".$ci->session->userdata("userid")."/ Time=".$user_data['time']."/ IP=".$ip;
     $string.=" ".Agent();
     log_message('error',$string);
     return $string;
    }
}

if (!function_exists('Agent'))
{
    function Agent(){
        $ci =& get_instance();
        $ci->load->library('user_agent');

            if ($ci->agent->is_browser())
            {
                    $agent = $ci->agent->browser().' '.$ci->agent->version();
            }
            elseif ($ci->agent->is_robot())
            {
                    $agent = $ci->agent->robot();
            }
            elseif ($ci->agent->is_mobile())
            {
                    $agent = $ci->agent->mobile();
            }
            else
            {
                    $agent = 'Unidentified User Agent';
            }

            $stroe="Browser : ";
            $stroe.=$agent;
            $stroe.=" System : ";
            $stroe.= $ci->agent->platform();
            return $stroe;
    }
}