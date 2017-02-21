<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Factory
 */

namespace dlundgren\OutputInteropPoc\Adapter\Blade;

/**
 * Factory for generic PHP templates
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Blade
 */
class Factory
	implements \Interop\Output\TemplateFactory
{
	/**
	 * @var \Illuminate\View\Factory
	 */
	private $blade;

	/**
	 * Factory constructor.
	 */
	public function __construct($blade)
	{
		$this->blade = $blade;
	}

	/**
	 * {@inheritdoc}
	 */
	public function load($template)
	{
		return new Template($this->blade, $template);
	}
}