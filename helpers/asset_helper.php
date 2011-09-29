<?php

/**
 * load_ag_asset function.
 * 
 * Function to make sure the ag_asset lib is loaded.
 * 
 * @access public
 * @return void
 */
function load_ag_asset()
{
	$CI =& get_instance();
	$CI->load->library('ag_asset');
}

load_ag_asset();

if(!function_exists('css')) {
	/**
	 * css function.
	 * 
	 * @access public
	 * @param mixed $filename
	 * @param mixed $subfolder (default: null)
	 * @param string $media (default: 'screen')
	 * @param mixed $echo (default: TRUE)
	 * @return void
	 */
	function css($filename, $subfolder = null, $media = 'screen', $echo = TRUE)
	{
		$CI =& get_instance();
		if($echo)
		{
			echo $CI->ag_asset->load_css($filename, $subfolder, $media);
		}
		else
		{
			return $CI->ag_asset->load_css($filename, $subfolder, $media);
		}
	}
}

if(!function_exists('js')) {
	/**
	 * js function.
	 * 
	 * @access public
	 * @param mixed $filename
	 * @param mixed $subfolder (default: null)
	 * @param mixed $echo (default: TRUE)
	 * @return void
	 */
	function js($filename, $subfolder = null, $echo = TRUE)
	{
		$CI =& get_instance();
		if($echo)
		{
			echo $CI->ag_asset->load_script($filename, $subfolder);
		}
		else
		{
			return $CI->ag_asset->load_script($filename, $subfolder);
		}
	}
}

if(!function_exists('img')) {
	/**
	 * img function.
	 * 
	 * @access public
	 * @param mixed $filename
	 * @param mixed $subfolder (default: null)
	 * @param array $style (default: array())
	 * @param mixed $echo (default: TRUE)
	 * @return void
	 */
	function img($filename, $subfolder = null, $style = array(), $echo = TRUE)
	{
		$CI =& get_instance();
		if($echo)
		{
			echo $CI->ag_asset->load_image($filename, $subfolder, $style);
		}
		else
		{
			return $CI->ag_asset->load_image($filename, $subfolder, $style);
		}
	}
}

if(!function_exists('asset_path')) {
	/**
	 * asset_path function.
	 * 
	 * @access public
	 * @param mixed $echo (default: TRUE)
	 * @return void
	 */
	function asset_path($echo = TRUE)
	{
		$CI =& get_instance();
		if($echo)
		{
			echo $CI->ag_asset->return_path(FALSE);
		}
		else
		{
			return $CI->ag_asset->return_path(FALSE);
		}
	}
}
