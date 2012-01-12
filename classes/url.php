<?php defined('SYSPATH') or die('No direct script access.');

class URL extends Kohana_URL {

	/**
	 * Extension of URL::site that adds a third parameter for setting a language key.
	 * The current language (Request::$lang) is used by default.
	 *
	 *     echo URL::site('foo/bar', FALSE, 'fr');  // custom language
	 *     echo URL::site('foo/bar', FALSE, FALSE); // no language
	 *
	 * @param   string  site URI to convert
	 * @param   mixed   protocol string or boolean, add protocol and domain?
	 * @param   mixed   language key to prepend to the URI, or FALSE to not prepend a language
	 * @return  string
	 */
	public static function site($uri = '', $protocol = NULL, $index = TRUE, $lang = TRUE) {
        	// Prepend language to URI if it needs to be prepended or it's not the default
        	if ($lang === TRUE AND (Lang::$default_prepended OR Request::$lang !== Lang::$default)) {
            		// Prepend the current language to the URI
            		$uri = Request::$lang.'/'.ltrim($uri, '/');
        	}
        	elseif (is_string($lang)) {
            		// Prepend a custom language to the URI
            		$uri = $lang.'/'.ltrim($uri, '/');
        	}

        	return parent::site($uri, $protocol, $index);
    	}

}
