<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Adapter\Smarty\Template
 */

namespace dlundgren\OutputInteropPoc\Adapter\Smarty;

use Interop\Output\Context;
use Smarty;

/**
 * The Template object for rendering from Smarty
 *
 * @package dlundgren\OutputInteropPoc\Adapter\Smarty
 */
class Template
	implements \Interop\Output\Template
{
	/**
	 * The Smarty instance
	 *
	 * @var Smarty
	 */
	private $smarty;

	/**
	 * The template file
	 *
	 * @var string
	 */
	private $template;

	/**
	 * Template constructor.
	 *
	 * @param Smarty $smarty
	 * @param        $template
	 */
	public function __construct(Smarty $smarty, $template)
	{
		$this->smarty   = $smarty;
		$this->template = $template;
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
		$this->smarty->assign($context->provide($this->template));

		return $this->smarty->fetch($this->template . ".tpl");
	}
}