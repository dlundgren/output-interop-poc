<?php
namespace dlundgren\OutputInteropPoc;

use dlundgren\OutputInteropPoc\Context\Collection;
use dlundgren\OutputInteropPoc\Context\GlobalContext;
use Interop\Output\Context;
use Interop\Output\TemplateFactory;

class Engine
	implements \Interop\Output\Engine
{
	/**
	 * @var TemplateFactory
	 */
	private $factory;

	/**
	 * @var Context
	 */
	private $context;

	public function __construct(TemplateFactory $factory, Context $context = null)
	{
		$this->factory = $factory;
		$this->context = $context ?: new Collection();
	}

	public function context()
	{
		return $this->context;
	}

	public function useContext(Context $context)
	{
		$this->context = $context;
	}

	public function templateFactory()
	{
		return $this->factory;
	}

	public function useTemplateFactory(TemplateFactory $templateFactory)
	{
		$this->factory = $templateFactory;
	}

	public function render($template, $data)
	{
		if (is_array($data)) {
			$data = new GlobalContext($data);
		}

		if ((is_object($data) && !($data instanceof Context))) {
			throw new \InvalidArgumentException("Must be an array or \\Interop\\Output\\Context");
		}

		// coalesce the data
		$renderData = new Collection();
		$renderData->add($this->context());
		$renderData->add($data);

		return $this->factory->load($template)->render($renderData);
	}

}