<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Factory
 */

namespace dlundgren\OutputInteropPoc\Adapter\Php;

/**
 * Factory for generic PHP templates
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Php
 */
class Factory
	implements \Interop\Output\TemplateFactory
{
	/**
	 * @var string
	 */
	private $path;

	/**
	 * Factory constructor.
	 */
	public function __construct($path)
	{
		$this->path = $path;
	}

	/**
	 * {@inheritdoc}
	 */
	public function load($template)
	{
		$file = "{$this->path}/{$template}.php";
		if (file_exists($file)) {
			return new Template($file);
		}

		throw new \InvalidArgumentException("Template was not found: $template");
	}
}