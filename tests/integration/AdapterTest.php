<?php
namespace dlundgren\OutputInteropPoc;

use dlundgren\OutputInteropPoc\Adapter;
use dlundgren\OutputInteropPoc\Context\Collection;
use dlundgren\OutputInteropPoc\Context\GlobalContext;
use dlundgren\OutputInteropPoc\Context\SearchContext;
use Foil\Foil;
use Illuminate\Events\Dispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use League\Plates\Engine as PlatesEngine;
use PHPUnit\Framework\TestCase;

class AdapterTest
	extends TestCase
{

	public function setUp()
	{
		mkdir(realpath(__DIR__) . '/tpl/cache');
	}

	public function tearDown()
	{
		// wipe out the cache from compilers
		$this->destroy_dir(realpath(__DIR__) . '/tpl/cache');
	}

	/**
	 * @see {http://stackoverflow.com/a/1407420/1281788}
	 */
	function destroy_dir($dir)
	{
		if (!is_dir($dir) || is_link($dir)) {
			return unlink($dir);
		}
		foreach (scandir($dir) as $file) {
			if ($file == '.' || $file == '..') {
				continue;
			}
			if (!$this->destroy_dir($dir . DIRECTORY_SEPARATOR . $file)) {
				chmod($dir . DIRECTORY_SEPARATOR . $file, 0777);
				if (!$this->destroy_dir($dir . DIRECTORY_SEPARATOR . $file)) {
					return false;
				}
			};
		}

		return rmdir($dir);
	}

	public function provideTemplateFactories()
	{
		$ctxt = new Collection();
		$ctxt->add(new SearchContext('SuperDuper-Hopefully-not_in_here-string', ['no_show_var' => 'uh oh']));
		$ctxt->add(new GlobalContext(['myVar' => 'woot']));

		$files = realpath(__DIR__) . '/tpl';

		return [
			[$ctxt, new Adapter\Php\Factory($files)],
			[$ctxt, new Adapter\Twig\Factory(new \Twig_Environment(new \Twig_Loader_Filesystem([$files])))],
			[$ctxt, new Adapter\Smarty\Factory($this->buildSmarty($files))],
			[$ctxt, new Adapter\Blade\Factory($this->buildBlade($files))],
			[$ctxt, new Adapter\Plates\Factory(new PlatesEngine($files))],
			[$ctxt, new Adapter\Foil\Factory(Foil::boot(['folders' => [$files], 'ext' => 'foil.php']))]
		];
	}

	/**
	 * @dataProvider provideTemplateFactories
	 */
	public function testIntegrations($payload, $factory)
	{
		$e = new Engine($factory, $payload);
		try {
			self::assertEquals('woot-kakaw', $e->render('input', ['custom_var' => 'kakaw']));
		}
		catch (\Exception $e) {
			self::fail($e->getMessage());
		}
	}

	private function buildBlade($files)
	{
		$r  = new EngineResolver();
		$fs = new Filesystem();
		$f  = new FileViewFinder($fs, [$files], ['blade.php']);

		$r->register(
			'blade',
			function () use (&$fs, &$f, &$files) {
				return new CompilerEngine(new BladeCompiler($fs, "{$files}/cache"));
			});

		return new Factory($r, $f, new Dispatcher());
	}

	private function buildSmarty($files)
	{
		$smarty = new \Smarty();
		$smarty->setTemplateDir($files);
		$smarty->setCacheDir("{$files}/cache");
		$smarty->setCompileDir("{$files}/cache");

		return $smarty;
	}
}