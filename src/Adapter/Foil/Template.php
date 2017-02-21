<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Template
 */

namespace dlundgren\OutputInteropPoc\Adapter\Foil;
use Foil\Foil;
use Interop\Output\Context;

/**
 * Simple PHP template renderer
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Foil
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
	 * @var Foil
	 */
	private $foil;

	public function __construct($foil, $template)
	{
		$this->foil = $foil;
		$this->template   = $template;
	}

	public function render(Context $context)
	{
		return $this->foil->engine()->render($this->template, $context->provide($this->template));
	}
}