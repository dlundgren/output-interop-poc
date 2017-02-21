<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Template
 */

namespace dlundgren\OutputInteropPoc\Adapter\Blade;
use Illuminate\View\Factory;
use Interop\Output\Context;

/**
 * Simple PHP template renderer
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Blade
 */
class Template
{
	/**
	 * The template to render
	 *
	 * @var string
	 */
	private $template;

	/**
	 * @var Factory
	 */
	private $blade;

	public function __construct($blade, $template)
	{
		$this->blade = $blade;
		$this->template   = $template;
	}

	public function render(Context $context)
	{
		return $this->blade->make($this->template, $context->provide($this->template));
	}
}