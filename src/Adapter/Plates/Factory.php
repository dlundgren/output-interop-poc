<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Factory
 */

namespace dlundgren\OutputInteropPoc\Adapter\Plates;

/**
 * Factory for generic PHP templates
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Plates
 */
class Factory
	implements \Interop\Output\TemplateFactory
{
	/**
	 * @var string
	 */
	private $engine;

	/**
	 * Factory constructor.
	 */
	public function __construct($engine)
	{
		$this->engine = $engine;
	}

	/**
	 * {@inheritdoc}
	 */
	public function load($template)
	{
		return new Template($this->engine, $template);
	}
}