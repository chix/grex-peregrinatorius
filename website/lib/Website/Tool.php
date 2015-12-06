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

	/**
	 * @param mixed $image image asset or hotspot image
	 * @param string $thumbnail image thumbnail pipeline name
	 * @param array $additionalOptions additional options (see pimcore document image editable documentation)
	 * @param mixed $fallbackImage image asset or image asset ID or image asset path
	 * @return string HTML image element like the document image editable
	 */
	public static function image($image, $thumbnail, $fallbackImage = null, $additionalOptions = array())
	{
		$html = null;
		$imageTag = new \Pimcore\Model\Document\Tag\Image();
		if ($image instanceof \Pimcore\Model\Document\Tag\Image && $image->getImage()) {
			$imageTag = $image;
		} elseif ($image instanceof \Pimcore\Model\Asset\Image) {
			$imageTag->setImage($image);
		} elseif ($image instanceof \Pimcore\Model\Object\Data\Hotspotimage && $image->getImage()) {
			$html = $image->getThumbnail($thumbnail)->getHTML($additionalOptions);
		} elseif ($fallbackImage instanceof \Pimcore\Model\Asset\Image) {
			$imageTag->setImage($fallbackImage);
		} elseif ($fallbackImage) {
			$image = \Pimcore\Model\Asset\Image::getById($fallbackImage);
			if (!$image) $image = \Pimcore\Model\Asset\Image::getByPath($fallbackImage);
			if ($image) $imageTag->setImage($image);
		}

		if (!$html) {
			$additionalOptions['thumbnail'] = $thumbnail;
			$imageTag->setOptions($additionalOptions);
			$html = $imageTag->frontend();
		}

		return $html;
	}
}
