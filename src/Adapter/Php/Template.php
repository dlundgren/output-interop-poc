<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Template
 */

namespace dlundgren\OutputInteropPoc\Adapter\Php;
use Interop\Output\Context;

/**
 * Simple PHP template renderer
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Php
 */
class Template
{
	/**
	 * The template to render
	 *
	 * @var string
	 */
	private $template;

	public function __construct($template)
	{
		$this->template   = $template;
		$this->stack      = new \SplQueue();
	}

	public function render(Context $context)
	{
		extract($context->provide($this->template));
		ob_start();

		include $this->template;

		return ob_get_clean();
	}
}