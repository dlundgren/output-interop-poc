<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Context\SearchContext
 */
namespace dlundgren\OutputInteropPoc\Context;

/**
 * Provides a generic matcher for template data
 *
 * @package dlundgren\OutputInteropPoc\Context
 */
class SearchContext
	implements \Interop\Output\Context
{
	use SearchesForNeedleInHaystack;

	/**
	 * Returns whether or not the needle is in the haystack
	 *
	 * @param string $haystack
	 * @return bool
	 */
	private function match($haystack)
	{
		return stripos($haystack, $this->needle) !== false;
	}
}
