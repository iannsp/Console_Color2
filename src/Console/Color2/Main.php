<?php
/**
 * PEAR2\Console\Color2\Main
 *
 * PHP version 5
 *
 * @category  Yourcategory
 * @package   PEAR2_Console_Color2
 * @author    Your Name <handle@php.net>
 * @copyright 2011 Your Name
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @version   SVN: $Id$
 * @link      http://svn.php.net/repository/pear2/PEAR2_Console_Color2
 */

/**
 * Main class for PEAR2_Console_Color2
 *
 * @category  Console
 * @package   PEAR2_Console_Color2
 * @author    Ivo Nascimento <ivo@o8o.com.br>
 * @copyright 2011 Ivo Nascimento
 * @license   http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @link      http://svn.php.net/repository/pear2/PEAR2_Console_Color2
 */

namespace PEAR2\Console\Color2;
class Main
{
	public function __construct(){
	}
	private static function decorateValue($value){
        return "\033[".$value.'m';
	}
	private static function get($value){
		$diff = $value[1];
		if (  filter_var($diff,FILTER_SANITIZE_NUMBER_INT) == $diff )
		{
			$returnvalue = BackgroundMapper::get($value);
		}
		else if ( strtolower($diff) == $diff)
		{
			$returnvalue = ColorMapper::get($value);			
		}
		else
		{
			$returnvalue = StyleMapper::get($value);
		}

		if ($returnvalue !== false)
			return $returnvalue;
		else
			throw New \Exception( "Value {$value} not found" );
	}
	public static function color($name){
				
	}
	private static function getPatterns($string){
		preg_match_all("/(%[a-zA-Z0-7]{1})/", $string, $matches);
		return $matches;
	}
	private static function sanitize($string){
		return str_replace('%%', '% ', $string);
	}
	public static function escape($string){
		return $string;
	}
	public static function convert($string){
		$string = self::sanitize($string);
		$matches = self::getPatterns($string);
		if ( count($matches) ){
			foreach ($matches[0] as $key) {
				$newvalue ="";
				if ( is_array( ($keys=self::get($key)))){
					foreach ($keys as $ikey){
						$newvalue .= self::decorateValue( $ikey ) ; 
					}
				}else
		    	$newvalue = self::decorateValue(
			    	 self::get($key)) ; 
			    $string = str_replace($key, $newvalue, $string);
			}
		}
		return $string;
	}
}
