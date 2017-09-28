<?php
namespace App\Library;
/*******************************************************************************
Version: 1.11 ($Rev: 175 $)
Website: http://sourceforge.net/projects/simplehtmldom/
Author: S.C. Chen <me578022@gmail.com>
Acknowledge: Jose Solorzano (https://sourceforge.net/projects/php-html/)
Contributions by:
    Yousuke Kumakura (Attribute filters)
    Vadim Voituk (Negative indexes supports of "find" method)
    Antcs (Constructor with automatically load contents either text or file/url)
Licensed under The MIT License
Redistributions of files must retain the above copyright notice.
*******************************************************************************/
class Simple_html_func{
	
	// helper functions
	// -----------------------------------------------------------------------------
	// get html dom form file
	function file_get_html() {
	    $dom = new simple_html_dom;
	    $args = func_get_args();
	    $dom->load(call_user_func_array('file_get_contents', $args), true);
	    return $dom;
	}


	// get dom form file (deprecated)
	function file_get_dom() {
	    $dom = new simple_html_dom;
	    $args = func_get_args();
	    $dom->load(call_user_func_array('file_get_contents', $args), true);
	    return $dom;
	}

	// get dom form string (deprecated)
	function str_get_dom($str, $lowercase=true) {
	    $dom = new simple_html_dom;
	    $dom->load($str, $lowercase);
	    return $dom;
	}
}