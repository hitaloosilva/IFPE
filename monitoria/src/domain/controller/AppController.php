<?php
namespace IFPE\Monitoria\domain\controller;

use Relay\Relay;
use IFPE\Monitoria\providers\RouteServiceProvider;
use IFPE\Monitoria\providers\InjectorServiceProvider;
use Zend\Diactoros\ServerRequestFactory;
use Zend\Diactoros\Response\SapiEmitter;

class AppController
{

    private static $instance = null;

    protected $twig;

    private $middlewareQueue = null;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $loader = new \Twig_Loader_Filesystem('../templates/');
        $twig = new \Twig_Environment($loader);
        $this->twig = $twig;

        $this->loadProviders();
    }

    function loadProviders()
    {
        $this->middlewareQueue = array();

        $routeProvider = new RouteServiceProvider();
        $diProvider = new InjectorServiceProvider();

        $this->middlewareQueue[] = $routeProvider->build();
        $this->middlewareQueue[] = $diProvider->build();
    }

    function index()
    {
        session_start();

//         // Recupera o login
//         $login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
//         // Recupera a senha, a criptografando em MD5
//         $senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

//         // Usuário não forneceu a senha ou o login

//         if ($login) {
//             header("Location: teste.php");
//         } else {
//             echo $this->render('home.html', array(
//                 'title' => 'Hello world!'
//             ));
//         }
        $requestHandler = new Relay($this->middlewareQueue);
        $response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

        $emitter = new SapiEmitter();
        /**
         *
         * @noinspection PhpVoidFunctionResultUsedInspection
         */

        $emitter->emit($response);
    }

    function render($page, $param)
    {
        return $this->twig->render($page, $param);
    }
}

