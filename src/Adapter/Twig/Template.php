<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Twig\Template
 */

namespace dlundgren\OutputInteropPoc\Adapter\Twig;
use Interop\Output\Context;

/**
 * The Template object for rendering from Twig
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Twig
 */
class Template
	implements \Interop\Output\Template
{
	/**
	 * The Twig instance
	 *
	 * @var \Twig_Environment
	 */
	private $twigEnvironment;

	/**
	 * The Template file
	 *
	 * @var string
	 */
	private $template;

	/**
	 * Template constructor.
	 *
	 * @param \Twig_Environment $twigEnvironment
	 * @param string            $template
	 */
	public function __construct(\Twig_Environment $twigEnvironment, $template)
	{
		$this->twigEnvironment = $twigEnvironment;
		$this->template        = $template;
	}

	/**
	 * {@inheritdoc}
	 */
	public function file()
	{
		return $this->template;
	}

	/**
	 * {@inheritdoc}
	 */
	public function render(Context $context)
	{
		return $this->twigEnvironment->resolveTemplate($this->template . '.twig')->render($context->provide($this->template));
	}
}