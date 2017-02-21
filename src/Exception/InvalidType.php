<?php

/**
 * @file
 * Contains \dlundgren\OutputInteropPoc\Exception\InvalidType
 */

namespace dlundgren\OutputInteropPoc\Exception;

/**
 * InvalidType Exception
 *
 * @package dlundgren\OutputInteropPoc\Exception
 */
class InvalidType
	extends \TypeError
{
	/**
	 * InvalidType constructor.
	 *
	 * @param string       $argument         The variable
	 * @param int          $argumentPosition The position of the argument
	 * @param array|string $method           The method
	 * @param string       $expectedType     The expected type
	 */
	public function __construct($argument, $argumentPosition, $method, $expectedType)
	{
		parent::__construct(
			sprintf(
				'Argument %d passed to %s must be an instance of %s, %s given',
				$argumentPosition,
				is_array($method) ? join('::', $method) : $method,
				$expectedType,
				is_object($argument) ? get_class($argument) : type($argument)
			));
	}
}