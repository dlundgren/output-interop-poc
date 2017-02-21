<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Php\Template
 */

namespace dlundgren\OutputInteropPoc\Adapter\Plates;

use Interop\Output\Context;
use League\Plates\Engine;

/**
 * Simple PHP template renderer
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Plates
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
	 * @var Engine
	 */
	private $engine;

	public function __construct($engine, $template)
	{
		$this->engine   = $engine;
		$this->template = $template;
	}

	public function render(Context $context)
	{
		return $this->engine->render($this->template, $context->provide($this->template));
	}
}