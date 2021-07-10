<?php

if(!function_exists('realToDollar')){
	function realToDollar($value)
	{
		$value = str_replace(['.', ','], ['', '.'], $value);

		return floatval(number_format($value, '2', '.', ''));
	}
}

if(!function_exists('dollarToReal')){
	function dollarToReal($value)
	{
		return number_format($value, '2', ',', '.');
	}
}

// Function: used to create slugs
/*
if (!function_exists("slugify")) {
	function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}
}
*/