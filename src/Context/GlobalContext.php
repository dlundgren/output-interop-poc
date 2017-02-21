<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Context\GlobalContext
 */
namespace dlundgren\OutputInteropPoc\Context;

use Interop\Output\Context;

/**
 * Global context data
 *
 * @package dlundgren\OutputInteropPoc\Context
 */
class GlobalContext
	implements Context
{
	/**
	 * List of data for this context
	 *
	 * @var array
	 */
	private $data;

	/**
	 * @param array $data
	 */
	public function __construct(array $data = [])
	{
		$this->data = $data;
	}

	/**
	 * Always returns true
	 *
	 * {@inheritdoc}
	 */
	public function accepts($template)
	{
		return true;
	}

	/**
	 * {@inheritdoc}
	 */
	public function provide($template)
	{
		return $this->data;
	}
}
