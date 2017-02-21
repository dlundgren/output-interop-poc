<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Factory
 */

namespace dlundgren\OutputInteropPoc\Adapter\Foil;
use Foil\Foil;

/**
 * Factory for generic PHP templates
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Foil
 */
class Factory
	implements \Interop\Output\TemplateFactory
{
	/**
	 * @var Foil
	 */
	private $foil;

	/**
	 * Factory constructor.
	 */
	public function __construct($foil)
	{
		$this->foil = $foil;
	}

	/**
	 * {@inheritdoc}
	 */
	public function load($template)
	{
		return new Template($this->foil, $template);
	}
}