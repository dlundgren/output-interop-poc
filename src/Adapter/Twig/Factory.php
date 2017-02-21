<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Twig\Factory
 */
namespace dlundgren\OutputInteropPoc\Adapter\Twig;

/**
 * Twig Template Factory
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Twig
 */
class Factory
	implements \Interop\Output\TemplateFactory
{
	/**
	 * @var \Twig_Environment
	 */
	private $twigEnvironment;

	/**
	 * Factory constructor.
	 *
	 * @param \Twig_Environment $twigEnvironment
	 */
	public function __construct(\Twig_Environment $twigEnvironment)
	{
		$this->twigEnvironment = $twigEnvironment;
	}

	/**
	 * {@inheritdocs}
	 */
	public function load($template)
	{
		return new Template($this->twigEnvironment, $template);
	}
}