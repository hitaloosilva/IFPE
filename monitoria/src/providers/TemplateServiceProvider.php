<?php
namespace IFPE\Monitoria\providers;

use function DI\create;
use function DI\get;
use DI\ContainerBuilder;
use Middlewares\Utils\RequestHandler;
use Psr\Http\Server\MiddlewareInterface;

class TemplateServiceProvider
{

    private $container;

    private $path = __DIR__ . "/../../config";

    function __construct()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(false);
        $containerBuilder->useAnnotations(false);
        $containerBuilder->addDefinitions(include $this->path . "/di.php");

        adjustPath();
        /**
         *
         * @noinspection PhpUnhandledExceptionInspection
         */
        $this->container = $containerBuilder->build();
    }

    private function adjustPath(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/no-framework/public", "", $uri);
        $_SERVER['REQUEST_URI'] = $uri;
    }

    public function build(): MiddlewareInterface
    {
        return new RequestHandler($this->container);
    }
}

