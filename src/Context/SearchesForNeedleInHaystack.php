<?php

namespace dlundgren\OutputInteropPoc\Context;

use dlundgren\OutputInteropPoc\Exception\InvalidType;

trait SearchesForNeedleInHaystack
{
	/**
	 * @var string
	 */
	private $needle;

	/**
	 * @var array
	 */
	private $data;

	/**
	 * Generic constructor for needle
	 *
	 * @param string $needle
	 * @param array  $data
	 */
	public function __construct($needle, array $data = [])
	{
		$this->needle = $needle;
		$this->data   = $data;
	}

	/**
	 * {@inheritdoc}
	 */
	public function accepts($template)
	{
		if (is_string($template)) {
			return $this->match($template);
		}

		throw new InvalidType($template, 1, [static::class, 'accept'], 'string');
	}

	/**
	 * {@inheritdoc}
	 */
	public function provide($template)
	{
		return $this->match($template)
			? $this->data
			: [];
	}

	/**
	 * Default implementation of match
	 *
	 * @param string $haystack The haystack to search
	 * @return bool
	 */
	private function match($haystack)
	{
		return false;
	}
}