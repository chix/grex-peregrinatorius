<?php

namespace Backend;

class Plugin extends \Pimcore\API\Plugin\AbstractPlugin implements \Pimcore\API\Plugin\PluginInterface 
{

	public static function install()
	{
		// implement your own logic here
		return true;
	}

	public static function uninstall()
	{
		// implement your own logic here
		return true;
	}

	public static function isInstalled()
	{
		// implement your own logic here
		return true;
	}

	public static function getTranslationFile($language)
	{
		return '/Backend/texts/' . $language . '.csv';
	}

}
