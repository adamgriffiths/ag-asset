<?php
/**
* Asset Library
*
* @package Asset
* @category Libraries
* @author Adam Griffiths
* @link http://adamgriffiths.co.uk
* @version 1.0.0
* @copyright Adam Griffiths 2010
*
* AG_Asset provides a simple interface for loading assets (css, images, scripts).
*/

class AG_Asset
{
	
	var $CI;
	var $config;
	var $css_path;
	var $image_path;
	var $script_path;
	
	var $return_path = FALSE;
	
	
	/** 
	 * Library Constructor
	 *
	 * @access private
	 * @param string
	 */
	function __construct($config)
	{
		
		log_message('debug', "AG_Asset Library Loaded");
		
		$this->CI =& get_instance();
		$this->config = $config;
		
		$this->CI->load->helper('url');
	}
	
	
	/**
	* @author Adam Griffiths
	* @param bool
	*
	* Sets whether or not to return just the path – not the full HTMLified stuff :)
	*/
	function return_path($path = FALSE)
	{
		$this->return_path = $path;
	}
	
	
	/**
	* @author Adam Griffiths
	* @return string
	*
	* Preloads CSS files based on the config file.
	*/
	function preload_css()
	{
		$css = NULL;
		
		foreach($this->config['preload_css'] as $array)
		{
			$css .= $this->load_css($array['name'], @$array['subfolder'], @$array['media'], @$array['title']);
		}
		
		return $css;
	}
	
	
	/**
	* @author Adam Griffiths
	* @return string
	*
	* Preloads script files based on the config file.
	*/
	function preload_scripts()
	{
		$scripts = NULL;
		
		foreach($this->config['preload_scripts'] as $array)
		{
			$scripts .= $this->load_script($array['name'], $array['subfolder']);
		}
		
		return $scripts;
	}
	
	
	/**
	* @author Adam Griffiths
	* @param string
	* @param string
	* @param string
	*
	* Loads in a CSS file.
	*/
	function load_css($css, $subfolder = NULL, $media = 'screen', $title = NULL)
	{
		
		if($subfolder === NULL)
		{
			$this->css_path = base_url() . $this->config['assets_route'] . "/" . $this->config['css_route'] . "/";
		}
		else
		{
			$this->css_path = base_url() . $this->config['assets_route'] . "/" . $this->config['css_route'] . "/" . $subfolder . "/";
		}
	
		if($this->return_path === TRUE)
		{
			return $this->css_path;
		}
		
		if($title === NULL)
		{
			return '<link rel="stylesheet" type="text/css" href="' . $this->css_path . $css . '" media="' . $media . '" />' . "\n";
		}
		else
		{
			return '<link rel="stylesheet" type="text/css" href="' . $this->css_path . $css . '" media="' . $media . '" title="' . $title . '" />' . "\n";
		}
	}
	
	
	/**
	* @author Adam Griffiths
	* @param string
	* @param string
	* @param string
	*
	* Loads in an image.
	*/
	function load_image($image, $alt = NULL, $subfolder = NULL, $style = NULL)
	{
		
		if($subfolder === NULL)
		{
			$this->image_path = base_url() . $this->config['assets_route'] . "/" . $this->config['images_route'] . "/";
		}
		else
		{
			$this->image_path = base_url() . $this->config['assets_route'] . "/" . $this->config['images_route'] . "/" . $subfolder . "/";
		}	
		
		if($this->return_path === TRUE)
		{
			return $this->image_path;
		}
	
		if($style === NULL)
		{
			return '<img alt="' . $alt . '" src="' . $this->image_path . $image . '" />' . "\n";
		}
		
		return '<img alt="' . $alt . '" src="' . $this->image_path . $image . '" ' . $style['type'] . '="' . $style['value'] .  '" />' . "\n";
	
	}
	
	
	/**
	* @author Adam Griffiths
	* @param string
	* @param string
	*
	* Loads in an javascript file.
	*/
	function load_script($script, $subfolder = NULL)
	{
		
		if($subfolder === NULL)
		{
			$this->script_path = base_url() . $this->config['assets_route'] . "/" . $this->config['scripts_route'] . "/";
		}
		else
		{
			$this->script_path = base_url() . $this->config['assets_route'] . "/" . $this->config['scripts_route'] . "/" . $subfolder . "/";
		}
		
		if($this->return_path === TRUE)
		{
			return $this->script_path;
		}
			
		return '<script type="text/javascript" src="' . $this->script_path . $script . '"></script>' . "\n";
	}	
	
}
