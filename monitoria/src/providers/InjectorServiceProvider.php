<?php
namespace IFPE\Monitoria\providers;

use function DI\create;
use function DI\get;
use DI\ContainerBuilder;
use Middlewares\RequestHandler;
use Psr\Http\Server\MiddlewareInterface;

class InjectorServiceProvider
{

    private $container;

    private $path = __DIR__ . "/../../config";

    function __construct()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(false);
        $containerBuilder->useAnnotations(false);
        $containerBuilder->addDefinitions(include $this->path . "/di.php");

        /**
         *
         * @noinspection PhpUnhandledExceptionInspection
         */
        $this->container = $containerBuilder->build();
    }

    public function build(): MiddlewareInterface
    {
        return new RequestHandler($this->container);
    }
}

