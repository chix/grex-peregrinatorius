<?php

namespace Website;

class Tool
{
	private static $inheritance;
	private static $fallback;
	public static $defaultLanguage = null;

	/**
	 * returns the default website language (the first from system settings)
	 * default language should match the language property of master document tree
	 * @return string default language ISO 639-1
	 */
	public static function getDefaultLanguage()
	{
		if (self::$defaultLanguage === null) {
			$config = \Pimcore\Config::getSystemConfig();
			self::$defaultLanguage = current(explode(',', $config->general->validLanguages));
		}
		
		return self::$defaultLanguage;
	}

	public static function webalize($path)
	{
		return trim(preg_replace('#-+#', '-', str_replace('.', '-', \Pimcore\File::getValidFilename($path))), '-');
	}

	public static function toCacheKey($text)
	{
		return str_replace('-', '_', self::webalize($text));
	}

	public static function forceInheritanceAndFallbackValues($inherit = true)
	{
		self::$inheritance = \Pimcore\Model\Object\AbstractObject::getGetInheritedValues();
		self::$fallback = \Pimcore\Model\Object\Localizedfield::getGetFallbackValues();
		\Pimcore\Model\Object\AbstractObject::setGetInheritedValues($inherit);
		\Pimcore\Model\Object\Localizedfield::setGetFallbackValues($inherit);
	}

	public static function restorInheritanceAndFallbackValues()
	{
		\Pimcore\Model\Object\AbstractObject::setGetInheritedValues(self::$inheritance);
		\Pimcore\Model\Object\Localizedfield::setGetFallbackValues(self::$fallback);
	}
}
