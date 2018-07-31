<?php
namespace IFPE\Monitoria\providers;

use function DI\create;
use function DI\get;
use Psr\Http\Server\MiddlewareInterface;
use function FastRoute\simpleDispatcher;
use Middlewares\FastRoute;

class RouteServiceProvider
{

    private $dispatcher;

    private $path = __DIR__ . "/../../config";

    function __construct()
    {
        $this->adjustPath();
        $this->dispatcher = simpleDispatcher(include $this->path."/routes.php");
    }

    private function adjustPath(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/monitoria/public", "", $uri);
        $uri = str_replace("/monitoria/", "", $uri);
        $_SERVER['REQUEST_URI'] = $uri;
    }

    public function build(): MiddlewareInterface
    {
        return new FastRoute($this->dispatcher);
    }
}

