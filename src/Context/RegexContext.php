<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Context\GlobalContext
 */
namespace dlundgren\OutputInteropPoc\Context;

/**
 * Provides a regex pattern matcher for template data
 *
 * @package dlundgren\OutputInteropPoc\Context
 */
class RegexContext
	implements \Interop\Output\Context
{
	use SearchesForNeedleInHaystack;

	/**
	 * Performs the Regex matching
	 *
	 * @param string $haystack The haystack to perform the regex on
	 * @return bool
	 */
	private function match($haystack)
	{
		return preg_match($this->needle, $haystack) === 1;
	}
}
