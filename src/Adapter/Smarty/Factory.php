<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Smarty\Factory
 */
namespace dlundgren\OutputInteropPoc\Adapter\Smarty;

/**
 * Class Factory
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Smarty
 */
class Factory
	implements \Interop\Output\TemplateFactory
{
	/**
	 * @var \Smarty
	 */
	private $smarty;

	/**
	 * Factory constructor.
	 *
	 * @param \Smarty $smarty
	 */
	public function __construct(\Smarty $smarty)
	{
		$this->smarty = $smarty;
	}

	/**
	 * {@inheritdocs}
	 */
	public function load($template)
	{
		return new Template($this->smarty, $template);
	}
}